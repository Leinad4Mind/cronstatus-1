<?php
/**
 *
 * @package       Cron Status
 * @copyright (c) 2014 - 2021 Igor Lavrov, John Peskens, Leinad4Mind
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace boardtools\cronstatus\acp;

class cronstatus_info
{
	public function module()
	{
		return array(
			'filename' => 'boardtools\cronstatus\acp\cronstatus_module',
			'title'    => 'ACP_CRON_STATUS_TITLE',
			'version'  => '1.0.0',
			'modes'    => array(
				'config' => array(
					'title' => 'ACP_CRON_STATUS_CONFIG_TITLE',
					'auth'  => 'ext_boardtools/cronstatus',
					'cat'   => array('ACP_CAT_MAINTENANCE'),
				),
			),
		);
	}

	public function install()
	{
	}

	public function uninstall()
	{
	}
}
