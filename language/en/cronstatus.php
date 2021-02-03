<?php
/**
 *
 * @package       Cron Status
 * @copyright (c) 2014 - 2021 Igor Lavrov, John Peskens, Leinad4Mind
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'CRON'                            => 'Cron',
	'CRON_LOCKED'                     => 'Cron Locked',
	'CRON_TIME_LOCKED'                => 'Cron time locked',
	'ACP_CRON_STATUS_TITLE'           => 'Cron Status',
	'ACP_CRON_STATUS_CONFIG_TITLE'    => 'Check Cron Status',
	'ACP_CRON_STATUS_EXPLAIN'         => 'Cron Status is a page of your phpBB Board where you can check if cron tasks are ready to be done. The “Auto” last task date means that the task has a specific time control option that couldn’t be recognized by Cron Status extension. A red marked task means a task which never started or which has a problem. A red lock means this task is locked by cron manager and blocks other tasks.',
	'CRON_STATUS_REFRESH'             => 'Seconds for refresh',
	'CRON_TASK_LOCKED'                => 'Cron task locked',
	'CRON_STATUS_READY_TASKS'         => 'Tasks ready to run',
	'CRON_STATUS_NOT_READY_TASKS'     => 'Not ready tasks',
	'CRON_STATUS_NO_TASKS'            => 'No available cron tasks',
	'CRON_STATUS_DATE_FORMAT'         => 'Date format for Cron Status page',
	'CRON_STATUS_DATE_FORMAT_EXPLAIN' => 'The date format is the same as the PHP <code>date</code> function.',
	'CRON_STATUS_MAIN_NOTICE'         => 'Notice on the ACP index page',
	'CRON_STATUS_MAIN_NOTICE_EXPLAIN' => 'Display Cron Status Notice on the ACP index page if Cron is locked.',
	'CRON_TASK_NAME'                  => 'Task name',
	'CRON_TASK_DATE'                  => 'Last task date',
	'CRON_NEW_DATE'                   => 'New task date',
	'CRON_TASK_NEVER_STARTED'         => 'Never started',
	'CRON_TASK_AUTO'                  => 'Auto',
	'CRON_TASK_DATE_TIME'             => 'Current date & time',
	'CRON_STATUS_ERROR'               => 'Refresh error',
	'CRON_STATUS_TIMEOUT'             => 'Refresh timeout',
	'CRON_STATUS_ERROR_EXPLAIN'       => 'An error occurred during refreshing the page.',
	'CRON_STATUS_DEVELOPERS'          => 'Developers',
	'CRON_TASK_RUN'                   => 'Run',
	'CRON_TASK_RUNNING'               => 'Running...',
));

// Description of Cron Status extension
$lang = array_merge($lang, array(
	'CRONSTATUS_DESCRIPTION_PAGE'            => 'Cron Status page',
	'CRONSTATUS_DESCRIPTION_PAGE_OVERVIEW'   => 'Overview of Cron Jobs (with sorting)',
	'CRONSTATUS_DESCRIPTION_PAGE_STATUS'     => 'Displays the status of each Cron Task',
	'CRONSTATUS_DESCRIPTION_PAGE_ABILITY'    => 'You can run any ready task manually',
	'CRONSTATUS_DESCRIPTION_NOTICE'          => 'Cron Status Notice (optional)',
	'CRONSTATUS_DESCRIPTION_NOTICE_OVERVIEW' => 'Is displayed on the main page of the ACP when cron is locked',
	'CRONSTATUS_DESCRIPTION_NOTICE_SETTINGS' => 'Can be switched off in Board settings',
));