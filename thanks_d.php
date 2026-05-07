<?php
session_start();
require_once(__DIR__ . '/configs/config.php');
require_once(__DIR__ . '/modules/function.php');

if (!isset($_SESSION['lp_m06_request_d'])) {
    header('Location: ./index.php');
    exit;
}

unset($_SESSION['lp_m06_request_d'], $_SESSION['lp_m06_Tabflag']);
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta name="robots" content="noindex,nofollow">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <title>ダウンロード完了｜<?php echo h(PAGE_TITLE); ?></title>
  <link rel="shortcut icon" sizes="16x16" href="./images/favicon.png">
  <link rel="apple-touch-icon" sizes="192x192" href="./images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@400;500;700;800;900&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXXX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header id="header">
  <div class="header_inner">
    <div class="header_logo">
      <a href="./index.php"><img src="./images/header-logo.png" alt="弁護士保険ミカタ"></a>
    </div>
  </div>
</header>

<main>
  <section class="thanks_sec">
    <div class="thanks_sec_inner">
      <h2 class="thanks_sec_title">ダウンロード申込が完了しました</h2>
      <p class="thanks_sec_lead">
        この度はご申込いただき、誠にありがとうございます。<br>
        ご登録のメールアドレスに各種資料のURLをお送りしました。<br>
        ご確認をよろしくお願いいたします。
      </p>
      <p class="thanks_sec_lead">
        メールが届かない場合は、迷惑メールフォルダをご確認いただくか、<br>
        カスタマーセンター（0120-741-066）までお問い合わせください。
      </p>
      <div class="thanks_sec_buttons">
        <a href="./index.php" class="thanks_sec_btn">トップページへ戻る</a>
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
