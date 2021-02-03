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
	'CRON_LOCKED'                     => 'Cron Kilitli',
	'CRON_TIME_LOCKED'                => 'Cron zamanı kilitli',
	'ACP_CRON_STATUS_TITLE'           => 'Cron Durumu',
	'ACP_CRON_STATUS_CONFIG_TITLE'    => 'Cron Durmunu denetle',
	'ACP_CRON_STATUS_EXPLAIN'         => 'Cron Durumu sizin phpBB sitenizin cron görevleri yapılmaya hazır olduğunda denetleyebileceğiniz bir sayfadır. “Otomatik” görev tarihi görevin spesifik bir zaman kontrol seçeneğinin olduğunu ve bunun Cron Durumu eklentisi tarafından tanınmadığı anlamına gelir. Kırmızı işaretli görev o görevin hiç başlatılmadığını veya bir problem olduğunu gösterir. Kırmızı kilit -görev cron yöneticisi tarafından kilitlendi ve diğer görevler bloklandı- anlamındadır.',
	'CRON_STATUS_REFRESH'             => 'Yenileme için saniyeler',
	'CRON_TASK_LOCKED'                => 'Cron görevi kilitli',
	'CRON_STATUS_READY_TASKS'         => 'Görevler çalıştırılmaya hazır',
	'CRON_STATUS_NOT_READY_TASKS'     => 'Görevler hazır değil',
	'CRON_STATUS_NO_TASKS'            => 'Erişilebilir cron görevi yok',
	'CRON_STATUS_DATE_FORMAT'         => 'Cron Durum sayfası için tarih formatı',
	'CRON_STATUS_DATE_FORMAT_EXPLAIN' => 'Tarih formatı PHP <code>date</code> fonksiyonu ile aynı.',
	'CRON_STATUS_MAIN_NOTICE'         => 'YKP indeks sayfasındaki Bilgi',
	'CRON_STATUS_MAIN_NOTICE_EXPLAIN' => 'Eğer Cron kilitli ise Cron Durum Bilgisini YKP indeks sayfasında göster.',
	'CRON_TASK_NAME'                  => 'Görev ismi',
	'CRON_TASK_DATE'                  => 'Son görev tarihi',
	'CRON_NEW_DATE'                   => 'Yeni görev tarihi',
	'CRON_TASK_NEVER_STARTED'         => 'Hiç başlatılmadı',
	'CRON_TASK_AUTO'                  => 'Otomatik',
	'CRON_TASK_DATE_TIME'             => 'Şu anki tarih & zaman',
	'CRON_STATUS_ERROR'               => 'Yenileme hatası',
	'CRON_STATUS_TIMEOUT'             => 'Yenileme zaman aşımı',
	'CRON_STATUS_ERROR_EXPLAIN'       => 'Sayfa yenilenirken bir hata oluştu.',
	'CRON_STATUS_DEVELOPERS'          => 'Geliştiriciler',
	'CRON_TASK_RUN'                   => 'Çalıştır',
	'CRON_TASK_RUNNING'               => 'Çalıştırılıyor...',
));

// Description of Cron Status extension
$lang = array_merge($lang, array(
	'CRONSTATUS_DESCRIPTION_PAGE'            => 'Cron Durum sayfası',
	'CRONSTATUS_DESCRIPTION_PAGE_OVERVIEW'   => 'Cron İşleri genel bakışı(sıralamalı)',
	'CRONSTATUS_DESCRIPTION_PAGE_STATUS'     => 'Her Cron görevinin durumunu gösterir',
	'CRONSTATUS_DESCRIPTION_PAGE_ABILITY'    => 'Herhangi bir görevi elle çalıştırabilirsiniz',
	'CRONSTATUS_DESCRIPTION_NOTICE'          => 'Cron Durumu Uyarısı (opsiyonel)',
	'CRONSTATUS_DESCRIPTION_NOTICE_OVERVIEW' => 'Cron kilitlendiğinde YKP anasayfada gösterilsin mi',
	'CRONSTATUS_DESCRIPTION_NOTICE_SETTINGS' => 'Site ayarlarında kapatılabilir',
));
