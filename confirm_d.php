<?php
session_start();
require_once(__DIR__ . '/configs/config.php');
require_once(__DIR__ . '/modules/function.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    exit;
}

$in = clean_input($_POST);

$err = validate_d($in);
if (!empty($err)) {
    $_SESSION['lp_m06_request_d'] = $in;
    $_SESSION['lp_m06_err_d']     = $err;
    $_SESSION['lp_m06_Tabflag']   = 'd';
    header('Location: ./index.php#contact');
    exit;
}

$_SESSION['lp_m06_request_d'] = $in;
$_SESSION['lp_m06_Tabflag']   = 'd';
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta name="robots" content="noindex,nofollow">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <title>入力内容のご確認｜<?php echo h(PAGE_TITLE); ?></title>
  <link rel="shortcut icon" sizes="16x16" href="./images/favicon.png">
  <link rel="apple-touch-icon" sizes="192x192" href="./images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@400;500;700;800;900&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<header id="header">
  <div class="header_inner">
    <div class="header_logo">
      <a href="./index.php"><img src="./images/header-logo.png" alt="弁護士保険ミカタ"></a>
    </div>
  </div>
</header>

<main>
  <section class="confirm_sec">
    <div class="confirm_sec_inner">
      <h2 class="confirm_sec_title">入力内容のご確認</h2>
      <p class="confirm_sec_lead">下記の内容でよろしければ「この内容で送信する」ボタンを押してください。</p>

      <div class="confirm_sec_card">
        <dl class="confirm_sec_list">
          <dt>お名前</dt>
          <dd><?php echo h($in['d_name']); ?></dd>

          <dt>メールアドレス</dt>
          <dd><?php echo h($in['d_mail']); ?></dd>

          <dt>電話番号</dt>
          <dd><?php echo h($in['d_tel']); ?></dd>
        </dl>
      </div>

      <div class="confirm_sec_buttons">
        <a class="confirm_sec_back" href="./index.php#contact">&#x276E; 入力画面へ戻る</a>

        <div class="confirm_sec_submit_form">
          <form method="post" action="./sendmail_d.php">
            <button type="submit" class="confirm_sec_submit">
              <span class="confirm_sec_submit_text">この内容で送信する</span>
              <span class="confirm_sec_submit_arrow">
                <img src="./images/icon_arr_white.webp" alt="">
              </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<footer id="svgFooter">
  <div class="footer_nav">
    <nav class="footer_nav_inner">
      <a href="https://mikata-ins.co.jp/policy/solicitation/" target="_blank">勧誘方針</a>
      <span class="footer_divider" aria-hidden="true">|</span>
      <a href="https://mikata-ins.co.jp/policy/privacy/" target="_blank">個人情報のお取扱い</a>
      <span class="footer_divider" aria-hidden="true">|</span>
      <a href="https://mikata-ins.co.jp/company/" target="_blank">運営会社</a>
    </nav>
  </div>
  <div class="footer_copy" id="f_copy">
    <p class="footer_copy_text">Copyright(C)ミカタ少額短期保険株式会社 All rights reserved.</p>
    <p class="footer_copy_code">M2021営推01711</p>
  </div>
</footer>

</body>
</html>
