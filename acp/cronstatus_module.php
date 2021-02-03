<?php
/**
 *
 * @package       Cron Status
 * @copyright (c) 2014 - 2018 Igor Lavrov and John Peskens
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace boardtools\cronstatus\acp;

class cronstatus_module
{
	public $u_action;
	public $page_title;
	public $tpl_name;

	/** @var cronstatus_helper */
	protected $helper;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\event\dispatcher_interface */
	protected $phpbb_dispatcher;

	public function main($id, $mode)
	{
		/** @var \phpbb\config\config $config */
		/** @var \phpbb\request\request_interface $request */
		/** @var \phpbb\extension\manager $phpbb_extension_manager */
		global $config, $user, $template, $request, $phpbb_root_path, $phpEx, $phpbb_extension_manager, $phpbb_container, $phpbb_dispatcher;

		$this->helper = new cronstatus_helper();
		$this->config = $config;
		$this->user = $user;
		$this->template = $template;
		$this->request = $request;
		$this->phpbb_dispatcher = $phpbb_dispatcher;

		$this->page_title = $user->lang['ACP_CRON_STATUS_TITLE'];
		$this->tpl_name = 'acp_cronstatus';
		$user->add_lang_ext('boardtools/cronstatus', 'cronstatus');

		list($sk_config, $sd_config) = explode("|", $config['cronstatus_default_sort']);

		$sk = $request->variable('sk', $sk_config);
		$sd = $request->variable('sd', $sd_config);

		if ($sk != $sk_config || $sd != $sd_config)
		{
			$config->set("cronstatus_default_sort", $sk . "|" . $sd);
		}

		$template->assign_var('FONTAWESOME_NEEDED', version_compare($config['version'], '3.2.0', '<'));

		$action = $request->variable('action', '');
		switch ($action)
		{
			case 'details':
				$this->show_details($phpbb_extension_manager, $phpbb_root_path);

				if ($request->is_ajax())
				{
					$template->assign_vars(array(
						'IS_AJAX' => true,
					));
				}
				else
				{
					$template->assign_vars(array(
						'U_BACK' => $this->u_action,
					));
				}

				$this->tpl_name = 'acp_ext_details';
			break;

			default:
				$view_table = $request->variable('table', false);
				$cron_type = $request->variable('cron_type', '');

				if (!($request->is_ajax()) && $cron_type)
				{
					$url = append_sid($phpbb_root_path . 'cron.' . $phpEx, 'cron_type=' . $cron_type);
					$template->assign_var('RUN_CRON_TASK', '<img src="' . $url . '" width="1" height="1" alt="" />');
					meta_refresh(60, $this->u_action . '&amp;sk=' . $sk . '&amp;sd=' . $sd);
				}

				$this->show_tasks($phpbb_container, $sk, $sd, $cron_type);
				$cron_url = append_sid($phpbb_root_path . 'cron.' . $phpEx, false, false); // This is used in JavaScript (no &amp;).

				$template->assign_vars(array(
					'U_ACTION'   => $this->u_action,
					'U_NAME'     => $sk,
					'U_SORT'     => $sd,
					'CRON_URL'   => addslashes($cron_url),
					'VIEW_TABLE' => $view_table,
				));
		}
	}

	/**
	 * Assigns template parameters for details page
	 *
	 * @param \phpbb\extension\manager $phpbb_extension_manager Extension manager object
	 * @param string                   $phpbb_root_path         Path to phpBB root directory
	 */
	public function show_details(\phpbb\extension\manager $phpbb_extension_manager, $phpbb_root_path)
	{
		$this->user->add_lang(array('install', 'acp/extensions', 'migrator'));
		$ext_name = 'boardtools/cronstatus';

		if (version_compare($this->config['version'], '3.2.0-dev', '>='))
		{
			/** @var \phpbb\extension\metadata_manager $md_manager */
			$md_manager = $phpbb_extension_manager->create_extension_metadata_manager($ext_name);

			if (version_compare($this->config['version'], '3.2.0', '>'))
			{
				$metadata = $md_manager->get_metadata('all');
				$this->helper->output_metadata_to_template($metadata, $this->template);
			}
			else
			{
				$md_manager->output_template_data($this->template);
			}
		}
		else
		{
			$md_manager = new \phpbb\extension\metadata_manager($ext_name, $this->config, $phpbb_extension_manager, $this->template, $this->user, $phpbb_root_path);
			try
			{
				$md_manager->get_metadata('all');
			}
			catch (\phpbb\extension\exception $e)
			{
				trigger_error($e, E_USER_WARNING);
			}

			$md_manager->output_template_data();
		}

		try
		{
			$updates_available = $phpbb_extension_manager->version_check($md_manager, $this->request->variable('versioncheck_force', false), false, $this->config['extension_force_unstable'] ? 'unstable' : null);

			$this->template->assign_vars(array(
				'S_UP_TO_DATE'   => empty($updates_available),
				'S_VERSIONCHECK' => true,
				'UP_TO_DATE_MSG' => $this->user->lang(empty($updates_available) ? 'UP_TO_DATE' : 'NOT_UP_TO_DATE', $md_manager->get_metadata('display-name')),
			));

			foreach ($updates_available as $branch => $version_data)
			{
				$this->template->assign_block_vars('updates_available', $version_data);
			}
		}
		catch (\RuntimeException $e)
		{
			$this->template->assign_vars(array(
				'S_VERSIONCHECK_STATUS'    => $e->getCode(),
				'VERSIONCHECK_FAIL_REASON' => ($e->getMessage() !== $this->user->lang('VERSIONCHECK_FAIL')) ? $e->getMessage() : '',
			));
		}
	}

	/**
	 * Assigns template parameters for available Cron tasks
	 *
	 * @param object $phpbb_container phpBB container object
	 * @param string $sk              Sort key
	 * @param string $sd              Sort direction
	 * @param string $cron_type       Name of Cron task for execution
	 */
	public function show_tasks($phpbb_container, $sk, $sd, $cron_type)
	{
		$task_array = array();
		$tasks = $phpbb_container->get('cron.manager')->get_tasks();

		// Fall back on the previous method for phpBB <3.1.9
		$cronlock = '';
		$rows = $phpbb_container->get('boardtools.cronstatus.listener')->get_cron_tasks($cronlock);

		if ($this->config['cronstatus_latest_task'])
		{
			$cronlock = $this->config['cronstatus_latest_task'];
		}

		if (!sizeof($tasks) || !is_array($rows))
		{
			return;
		}

		/** @var \phpbb\cron\task\task $task */
		foreach ($tasks as $task)
		{
			$this->handle_task($rows, $task, $cronlock, $task_array);
		}
		unset($tasks, $rows);

		$task_array = $this->helper->array_sort($task_array, $sk, (($sd == 'a') ? SORT_ASC : SORT_DESC));

		foreach ($task_array as $row)
		{
			$this->template->assign_block_vars($row['task_sort'], array(
				'DISPLAY_NAME'  => $row['display_name'],
				'TASK_DATE'     => $row['task_date_print'],
				'NEW_DATE'      => $row['new_date_print'],
				'TASK_OK'       => $row['task_ok'],
				'LOCKED'        => $row['locked'],
				'CRON_TASK_RUN' => ($this->request->is_ajax()) ? '' : (($row['display_name'] != $cron_type) ? '<a href="' . $this->u_action . '&amp;cron_type=' . $row['display_name'] . '&amp;sk=' . $sk . '&amp;sd=' . $sd . '" class="cron_run_link">' . $this->user->lang['CRON_TASK_RUN'] . '</a>' : '<span class="cron_running_update">' . $this->user->lang['CRON_TASK_RUNNING'] . '</span>'),
			));
		}
	}

	/**
	 * Calculates parameters for a single Cron task
	 * and adds them to the resulting $task_array
	 *
	 * @param array                  $rows       Array with fetched parameters for Cron tasks
	 * @param \phpbb\cron\task\task  $task       Current Cron task object
	 * @param string                 $cronlock   Name of the Cron task locking the Cron
	 * @param array                 &$task_array Array of already collected Cron tasks
	 */
	public function handle_task(array $rows, $task, $cronlock, array &$task_array)
	{
		$task_name = $task->get_name();
		if (empty($task_name))
		{
			return;
		}

		$name = $task_name;
		$this->helper->get_task_params($rows, $name, $task_date);
		$new_task_date = $this->helper->get_new_task_date($rows, $task_date, $name);

		/**
		 * Event to modify task variables before displaying cron information
		 *
		 * @event boardtools.cronstatus.modify_cron_task
		 * @var object task          Task object
		 * @var object task_name     Task name ($task->get_name())
		 * @var object name          Task name for new task date
		 * @var object task_date     Last task date
		 * @var object new_task_date Next task date
		 * @since 3.1.0-RC3
		 * @changed 3.1.1 Added new_task_date variable
		 */
		$vars = array('task', 'task_name', 'name', 'task_date', 'new_task_date');
		extract($this->phpbb_dispatcher->trigger_event('boardtools.cronstatus.modify_cron_task', compact($vars)));

		$task_array[] = array(
			'task_sort'       => ($task->is_ready()) ? 'ready' : 'not_ready',
			'display_name'    => $task_name,
			'task_date'       => $task_date,
			'task_date_print' => ($task_date == -1) ? $this->user->lang['CRON_TASK_AUTO'] : (($task_date) ? $this->user->format_date($task_date, $this->config['cronstatus_dateformat']) : $this->user->lang['CRON_TASK_NEVER_STARTED']),
			'new_date'        => $new_task_date,
			'new_date_print'  => ($new_task_date > 0) ? $this->user->format_date($new_task_date, $this->config['cronstatus_dateformat']) : '-',
			'task_ok'         => ($task_date > 0 && ($new_task_date > time())) ? false : true,
			'locked'          => ($this->config['cron_lock'] && $cronlock == $name) ? true : false,
		);
	}
}
