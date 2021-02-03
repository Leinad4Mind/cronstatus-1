<?php
/**
 *
 * @Slovak translate ansysko (ansysko@ansysko.eu)
 * @package       Cron Status
 * @copyright (c) 2014 John Peskens (http://ForumHulp.com) and Igor Lavrov (https://github.com/LavIgor)
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
	'CRON'								=> 'Cron',
	'CRON_LOCKED'						=> 'Cron Zamknutý',
	'CRON_TIME_LOCKED'					=> 'Cron čas zamknutia',
	'ACP_CRON_STATUS_TITLE'				=> 'Stav Cronu',
	'ACP_CRON_STATUS_CONFIG_TITLE'		=> 'Kontrola stavu Cron',
	'ACP_CRON_STATUS_EXPLAIN'			=> 'Stav Cronu je stránka phpBB fóra, kde si môžete skontrolovať, či sú úlohy cronu pripravené na vykonanie. "Auto" dátum poslednej úlohy znamená, že úloha má špecifickú možnosť riadenia času, ktoré nemohli byť vykonané Cronom. Červeno označené úlohy znamenajú, že tie neboli nikdy spustené, alebo ktoré majú problém. Červený zámok znamená, že táto úloha je uzamknutá správcom cronu a blokuje ďalšie.',
	'CRON_STATUS_REFRESH'				=> 'Sekúnd do znovu spustenia',
	'CRON_TASK_LOCKED'					=> 'Zamknuté úlohy cronu',
	'CRON_STATUS_READY_TASKS'			=> 'Úlohy pripravené na spustenie',
	'CRON_STATUS_NOT_READY_TASKS'		=> 'Nepripravené úlohy',
	'CRON_STATUS_NO_TASKS'				=> 'Nie sú k dispozícii žiadne úlohy cronu',
	'CRON_STATUS_DATE_FORMAT'			=> 'Formát dátumu pre stránku stavu Cronu',
	'CRON_STATUS_DATE_FORMAT_EXPLAIN'	=> 'Formát dátumu je totožný z funkciou <code>dátum</code> PHP.',
	'CRON_STATUS_MAIN_NOTICE'			=> 'Oznámenie na ACP stránke',
	'CRON_STATUS_MAIN_NOTICE_EXPLAIN'	=> 'Zobraziť oznámenie o stave Cronu na stránke indexu ACP ak je Cron uzamknutý.',
	'CRON_TASK_NAME'					=> 'Názov úlohy',
	'CRON_TASK_DATE'					=> 'Dátum posledného spustenia',
	'CRON_NEW_DATE'						=> 'Dátum ďalšieho spustenia',
	'CRON_TASK_NEVER_STARTED'			=> 'Nespustené',
	'CRON_TASK_AUTO'					=> 'Auto',
	'CRON_TASK_DATE_TIME'				=> 'Aktuálny dátum a čas',
	'CRON_STATUS_ERROR'					=> 'Chyba obnovenia',
	'CRON_STATUS_TIMEOUT'				=> 'Obnovenie vypršalo',
	'CRON_STATUS_ERROR_EXPLAIN'			=> 'Došlo k chybe pri obnovení stránky.',
	'CRON_STATUS_DEVELOPERS'			=> 'Autori',
	'CRON_TASK_RUN'						=> 'Pripravené',
	'CRON_TASK_RUNNING'					=> 'Beží...',
));

// Description of Cron Status extension
$lang = array_merge($lang, array(
	'CRONSTATUS_DESCRIPTION_PAGE'				=> 'Stránka stavu cronu',
	'CRONSTATUS_DESCRIPTION_PAGE_OVERVIEW'		=> 'Prehľad cronu (s radením)',
	'CRONSTATUS_DESCRIPTION_PAGE_STATUS'		=> 'Zobrazuje stav každého cronu',
	'CRONSTATUS_DESCRIPTION_PAGE_ABILITY'		=> 'Môžete ručne spustiť ľubovoľnú pripravenú úloha',
	'CRONSTATUS_DESCRIPTION_NOTICE'				=> 'Oznámenia stavu cronu (voliteľne)',
	'CRONSTATUS_DESCRIPTION_NOTICE_OVERVIEW'	=> 'Je zobrazený na hlavnej stránke ACP, ak je uzamknutý cron',
	'CRONSTATUS_DESCRIPTION_NOTICE_SETTINGS'	=> 'Možné vypnúť v nastaveniach fóra',
));
