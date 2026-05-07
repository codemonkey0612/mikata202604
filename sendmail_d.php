<?php
/**
 * sendmail_d.php  ダウンロード申込 送信処理
 *  - セッションから値を取得
 *  - 自動返信メール送信（既存LP m05 のテンプレ流用：クライアント指示）
 *  - 管理者通知メール送信
 *  - thanks_d.php へ遷移
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

if (!isset($_SESSION['lp_m06_request_d'])) {
    header('Location: ./syserr_sessiontimeout.php');
    exit;
}

$d = $_SESSION['lp_m06_request_d'];

// 必須項目の最終チェック（直リク防止）
$err = validate_d($d);
if (!empty($err)) {
    $_SESSION['lp_m06_err_d'] = $err;
    header('Location: ./index.php#formArea');
    exit;
}

$db_name  = $d['d_name'];
$db_email = $d['d_mail'];
$db_tel   = $d['d_tel'];

/**********************/
/**** 自動返信メール ***/
/**********************/
$to      = $db_email;
$subject = "【弁護士保険ミカタ】ダウンロードありがとうございます";
$mail = <<<__EOD__
[name]様


この度は、弁護士保険ミカタの資料ダウンロードしていただき、誠にありがとうございます。


各ページのURLは以下のとおりです。

≪各種資料≫

◆電子カタログ(パンフレット)
https://mikata-ins.co.jp/data/mikata.pdf

◆マンガでわかる弁護士保険「トラブル予防編」
https://mikata-ins.co.jp/img/manga/bookdata1/html5.html#page=1

◆マンガでわかる弁護士保険「弁護士保険活用編」
https://mikata-ins.co.jp/img/manga/bookdata2/html5.html#page=1

◆ミカタ動画
https://www.youtube.com/watch?v=lJ0MUcXCM0A

◆よくある質問集
https://mikata-ins.co.jp/inquiry/faq/

----------------------------------------
◇◆お申込はこちら◆◇
https://mikata-ins.co.jp/webmkt/index.php
※ネットで簡単5分
----------------------------------------


●お問い合わせについて
カタログ、ご案内漫画をお読み頂き、何かご不明な点等ございましたら、気軽にお問い合わせいただきますようよろしくお願い致します。


今後、弁護士保険ミカタをより理解するための案内メールを登録アドレスに送信させていただきます。
不要な場合は、本メールに「案内不要」と記載いただき返信してください。
なお、商品案内メールはいつでも解除可能です。


≪お問い合わせ先≫
ミカタ少額短期保険(株)
総合カスタマーセンター

ＴＥＬ：0120-741-066
（月～金曜日10：00～17：00祝日・年末年始休業日を除く）

お問い合わせフォーム
support-info@mikata-ins.co.jp

__EOD__;

$mail = str_replace('[name]', $db_name, $mail);
send_text_mail($to, AUTO_REPLY_FROM, AUTO_REPLY_NAME, $subject, $mail);

/**********************/
/**** 管理者通知メール ***/
/**********************/
$admin_subject = "資料ダウンロードされました【https://lp.mikata-ins.co.jp/m06/】";
$admin_body = <<<__EOD__
資料ダウンロードされました【https://lp.mikata-ins.co.jp/m06/】

■お名前：[name]
■電話番号：[tel]
■メールアドレス：[mail]

__EOD__;
$admin_body .= "\n";
$admin_body .= "------------------------------------------------------------\n";
$admin_body .= "■投稿日時： " . date("r") . "\n";
$admin_body .= "■ブラウザ： " . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '') . "\n";
$admin_body .= "------------------------------------------------------------\n";

$admin_body = str_replace('[name]', $db_name,  $admin_body);
$admin_body = str_replace('[tel]',  $db_tel,   $admin_body);
$admin_body = str_replace('[mail]', $db_email, $admin_body);

send_text_mail(ADMIN_MAIL_TO, $db_email, $db_name, $admin_subject, $admin_body);

header('Location: ./thanks_d.php');
exit;
