<?php
/**
 * sendmail_y.php  郵送申込 送信処理
 *  - 自動返信メール（既存LP m05 のテンプレ流用：クライアント指示）
 *  - 管理者通知メール
 *  - thanks_y.php へ遷移
 *
 * 旧仕様との差分（本案件要件）：
 *  - DB登録（mail_log INSERT）  → 削除
 *  - dcd / acd パラメータ引き継ぎ → 削除
 *  - AWS SES (sendText)         → PHP標準 mail() (send_text_mail) に置換
 */
session_start();
require_once(__DIR__ . '/configs/config.php');
require_once(__DIR__ . '/modules/function.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    exit;
}

if (!isset($_SESSION['lp_m06_request_y'])) {
    header('Location: ./syserr_sessiontimeout.php');
    exit;
}

$y = $_SESSION['lp_m06_request_y'];

// 必須項目の最終チェック（直リク防止）
$err = validate_y($y);
if (!empty($err)) {
    $_SESSION['lp_m06_err_y'] = $err;
    header('Location: ./index.php#formArea');
    exit;
}

$db_name     = $y['y_name'];
$db_kana     = $y['y_kana'];
$db_email    = $y['y_mail'];
$db_tel      = $y['y_tel'];
$db_zip      = $y['y_zip'];
$db_pref     = $y['y_pref'];
$db_address1 = $y['y_address01'];
$db_address2 = $y['y_address02'];

/**********************/
/**** 自動返信メール ***/
/**********************/
$to      = $db_email;
$subject = "【弁護士保険ミカタ】資料請求ありがとうございます";
$mail = <<<__EOD__
[name]様

この度は、弁護士保険ミカタの資料をご請求いただき、誠にありがとうございます。

ご入力いただきましたご住所宛てに資料を送付いたします。
お手元に到着するまで、土日祝日を除き7～10日程度、お時間をいただいておりますので、
今しばらくお待ちください。


資料請求後、二週間経過しても資料が届かない場合、
お電話またはメールにてお問い合わせいただきますようお願いいたします。

※今すぐパンフレットを確認したい場合には、以下のURLからもご覧いただけます。
https://mikata-ins.co.jp/data/mikata.pdf

後日、資料発送手続完了のご報告および弁護士保険ミカタを
より理解するための案内メールを登録アドレスに送信させていただきます。
あわせてご確認いただきますよう、よろしくお願いいたします。

配信停止をご希望の場合　→　support-info@mikata-ins.co.jp
「配信停止」と本文に記載の上ご返信ください。
なお、商品案内メールはいつでも解除可能です。

≪お問い合わせ先≫----------------------------------------------------
ミカタ少額短期保険株式会社
https://mikata-ins.co.jp/
住所：東京都中央区日本橋人形町3-3-13-6F
フリーダイヤル：0120-741-066
営業時間：平日 10:00～17:00（祝日・年末年始休業日を除く）
メール：support-info@mikata-ins.co.jp
----------------------------------------------------------------------
※このメールはシステムからの自動返信です。

__EOD__;

$mail = str_replace('[name]', $db_name, $mail);
send_text_mail($to, AUTO_REPLY_FROM, AUTO_REPLY_NAME, $subject, $mail);

/**********************/
/**** 管理者通知メール ***/
/**********************/
$admin_subject = "資料請求されました【https://lp.mikata-ins.co.jp/m06/】";
$admin_body = <<<__EOD__
資料請求されました【https://lp.mikata-ins.co.jp/m06/】

■お名前：[name]
■フリガナ：[kana]
■電話番号：[tel]
■メールアドレス：[mail]
■郵便番号：[zip]
■住所：[address]

__EOD__;
$admin_body .= "\n";
$admin_body .= "------------------------------------------------------------\n";
$admin_body .= "■投稿日時： " . date("r") . "\n";
$admin_body .= "■ブラウザ： " . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '') . "\n";
$admin_body .= "------------------------------------------------------------\n";

$admin_body = str_replace('[name]',    $db_name,  $admin_body);
$admin_body = str_replace('[kana]',    $db_kana,  $admin_body);
$admin_body = str_replace('[tel]',     $db_tel,   $admin_body);
$admin_body = str_replace('[mail]',    $db_email, $admin_body);
$admin_body = str_replace('[zip]',     $db_zip,   $admin_body);
$admin_body = str_replace('[address]', $db_pref . $db_address1 . $db_address2, $admin_body);

send_text_mail(ADMIN_MAIL_TO, $db_email, $db_name, $admin_subject, $admin_body);

header('Location: ./thanks_y.php');
exit;
