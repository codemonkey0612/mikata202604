<?php
require_once(__DIR__ . '/configs/config.php');
require_once(__DIR__ . '/modules/function.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta name="robots" content="noindex,nofollow">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <title>セッションタイムアウト｜<?php echo h(PAGE_TITLE); ?></title>
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
  <section class="syserr_sec">
    <div class="syserr_inner">
      <h2 class="syserr_title">セッションタイムアウト</h2>
      <p class="syserr_lead">
        セッションがタイムアウトしました。<br>
        お手数ですが、最初からやり直してください。
      </p>
      <div class="syserr_buttons">
        <a href="./index.php" class="syserr_back">申込ページへ戻る</a>
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
