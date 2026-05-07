<?php
/**
 * mikata-lp-m06 共通設定
 *
 * 本案件はAWS/SES/DBは使用しない方針のため、
 * 旧LP（m05）の config.php からメール宛先・URL情報のみを移植している。
 */

// 本番URL（本ファイル群はクライアント側でアップロード予定）
defined('LP_URL')           or define('LP_URL',           'https://lp.mikata-ins.co.jp/m06/');

// ドメインに応じてページタイトルを切り替える
// lp.mikata-ins.co.jp  → 弁護士保険ミカタ6【ミカタ少額短期保険株式会社】
// bengoshihoken-mikata.com → 弁護士保険ミカタAD6【ミカタ少額短期保険株式会社】
if (!defined('PAGE_TITLE')) {
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
    if (strpos($host, 'bengoshihoken-mikata.com') !== false) {
        define('PAGE_TITLE', '弁護士保険ミカタAD6【ミカタ少額短期保険株式会社】');
    } else {
        define('PAGE_TITLE', '弁護士保険ミカタ6【ミカタ少額短期保険株式会社】');
    }
}

// 自動返信メール 送信元
defined('AUTO_REPLY_FROM')  or define('AUTO_REPLY_FROM',  'support-info@mikata-ins.co.jp');
defined('AUTO_REPLY_NAME')  or define('AUTO_REPLY_NAME',  '弁護士保険ミカタ');

// 管理者通知メール 宛先
defined('ADMIN_MAIL_TO')    or define('ADMIN_MAIL_TO',    'support-info@mikata-ins.co.jp');

// セッション名（旧LPと衝突しないように m06 で名前空間を切る）
defined('SESS_PREFIX')      or define('SESS_PREFIX',      'lp_m06');

// reCAPTCHA v3 キー（m05 と共通）
defined('V3_SITEKEY')       or define('V3_SITEKEY',       '6LdIdjIcAAAAAKQ-wmaUI2vRmpaQYn5BoH6Z9CbH');
defined('V3_SECRETKEY')     or define('V3_SECRETKEY',     '6LdIdjIcAAAAAJVZ06yDPkruKvvIqrpBqNmpNu0d');
