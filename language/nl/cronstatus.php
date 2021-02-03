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
	'CRON_LOCKED'                     => 'Taak geblokkeerd',
	'CRON_TIME_LOCKED'                => 'Taak tijd geblokkeerd',
	'ACP_CRON_STATUS_TITLE'           => 'Cron Status',
	'ACP_CRON_STATUS_CONFIG_TITLE'    => 'Controleer Cron Status',
	'ACP_CRON_STATUS_EXPLAIN'         => 'Cron Status bied je een overzicht van taken in je forum. De “Auto” vermelding betekent dat er geen geldige tijd- datum is gevonden door de Cron Status extensie. Taken worden in de kleur rood of groen weergegeven. Rood betekent dat de taak nog nooit is gestart of er een probleem mee is. Een geblokkeerde taak heeft een rood slotje achter zijn naam staan.',
	'CRON_STATUS_REFRESH'             => 'Seconden voor verversen pagina',
	'CRON_TASK_LOCKED'                => 'Taak geblokkeerd',
	'CRON_STATUS_READY_TASKS'         => 'Taken klaar om te starten',
	'CRON_STATUS_NOT_READY_TASKS'     => 'Taken niet klaar om te starten',
	'CRON_STATUS_NO_TASKS'            => 'Geen taken gevonden in je forum',
	'CRON_STATUS_DATE_FORMAT'         => 'Datum formaat voor Cron Status pagina',
	'CRON_STATUS_DATE_FORMAT_EXPLAIN' => 'Het datum formaat is hetzelfde als de PHP <code>date</code> functie.',
	'CRON_STATUS_MAIN_NOTICE'         => 'Waarschuwing op ACP index pagina',
	'CRON_STATUS_MAIN_NOTICE_EXPLAIN' => 'Toon Cron Status Waarschuwing op ACP index pagina als taken zijn geblokkeerd.',
	'CRON_TASK_NAME'                  => 'Taak naam',
	'CRON_TASK_DATE'                  => 'Laatste taak datum',
	'CRON_NEW_DATE'                   => 'Nieuwe taak datum',
	'CRON_TASK_NEVER_STARTED'         => 'Nooit gestart',
	'CRON_TASK_AUTO'                  => 'Auto',
	'CRON_TASK_DATE_TIME'             => 'Huidige datum & tijd',
	'CRON_STATUS_ERROR'               => 'Vernieuwen fout',
	'CRON_STATUS_TIMEOUT'             => 'Vernieuwen timeout',
	'CRON_STATUS_ERROR_EXPLAIN'       => 'Er is een fout opgetreden tijdens het vernieuwen van de pagina.',
	'CRON_STATUS_DEVELOPERS'          => 'Ontwikkelaars',
	'CRON_TASK_RUN'                   => 'Run',
	'CRON_TASK_RUNNING'               => 'Running...',
));

// Description of Cron Status extension
$lang = array_merge($lang, array(
	'CRONSTATUS_DESCRIPTION_PAGE'            => 'Cron Status pagina',
	'CRONSTATUS_DESCRIPTION_PAGE_OVERVIEW'   => 'Overzicht van taken (met sortering)',
	'CRONSTATUS_DESCRIPTION_PAGE_STATUS'     => 'Toon de status van iedere taak',
	'CRONSTATUS_DESCRIPTION_PAGE_ABILITY'    => 'Start een taak manueel',
	'CRONSTATUS_DESCRIPTION_NOTICE'          => 'Cron Status Melding (optioneel)',
	'CRONSTATUS_DESCRIPTION_NOTICE_OVERVIEW' => 'Melding op hoofdpagina ACP als taak is geblokkeerd',
	'CRONSTATUS_DESCRIPTION_NOTICE_SETTINGS' => 'Kan uitgeschakeld worden in Forum instellingen',
));
