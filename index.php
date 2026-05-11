<?php
/* mikata-lp-m06 ver3 index.php */
session_start();
require_once(__DIR__ . '/configs/config.php');
require_once(__DIR__ . '/modules/function.php');

$siteKey = V3_SITEKEY;

$d     = isset($_SESSION['lp_m06_request_d']) ? $_SESSION['lp_m06_request_d'] : array();
$y     = isset($_SESSION['lp_m06_request_y']) ? $_SESSION['lp_m06_request_y'] : array();
$tab   = isset($_SESSION['lp_m06_Tabflag'])   ? $_SESSION['lp_m06_Tabflag']   : 'y';
$err_d = isset($_SESSION['lp_m06_err_d'])     ? $_SESSION['lp_m06_err_d']     : array();
$err_y = isset($_SESSION['lp_m06_err_y'])     ? $_SESSION['lp_m06_err_y']     : array();
unset($_SESSION['lp_m06_err_d'], $_SESSION['lp_m06_err_y']);
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta name="robots" content="noindex">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-K9LWX8V');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <title><?php echo h(PAGE_TITLE); ?></title>
  <meta name="description" content="弁護士保険ミカタの資料請求・ダウンロードページ。月額2,980円から始められる弁護士費用保険。トラブル時の弁護士費用を補償します。">
  <meta property="og:title" content="<?php echo h(PAGE_TITLE); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo h(LP_URL); ?>">
  <meta property="og:image" content="<?php echo h(LP_URL); ?>images/ogp.jpg">
  <meta property="og:site_name" content="弁護士保険ミカタ【ミカタ少額短期保険株式会社】">
  <meta property="og:description" content="月額2,980円から始められる弁護士費用保険。資料請求・ダウンロードはこちら。">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="shortcut icon" sizes="16x16" href="./images/favicon.png">
  <link rel="apple-touch-icon" sizes="192x192" href="./images/favicon.png">
  <link rel="canonical" href="<?php echo h(LP_URL); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@400;500;700;800;900&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/aos.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/ajaxzip3.js" defer></script>
  <script src="./js/aos.js" defer></script>
  <script src="./js/app.js" defer></script>
  <!-- GoogleRecaptcha JS Files -->
  <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9LWX8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- ===================== HEADER ===================== -->
<header id="header">
  <div class="header_inner">
    <div class="header_logo">
      <a href="/"><img src="./images/header-logo.png" alt="弁護士保険ミカタ"></a>
    </div>
    <div class="header_contact">
      <a href="#" class="header_biz">事業者・経営者はこちら</a>
      <a href="tel:" class="header_tel">
        <span class="header_tel_icon">
          <img src="./images/icon_tel.webp" alt="電話">
        </span>
      </a>
    </div>
  </div>
</header>

<main>

<!-- ===================== MV / ヒーロー ===================== -->
<section class="sec01" id="mv">
  <div class="sec01_hero">
    <picture>
      <source srcset="./images/header-pc.webp" type="image/webp">
      <img src="./images/header-pc.png" alt="幅広いトラブルの弁護士費用を補償" class="sec01_hero_bg" loading="eager" fetchpriority="high">
    </picture>
    <img src="./images/header-pc-a_sp.webp" alt="幅広いトラブルの弁護士費用を補償" class="sec01_hero_sp">
  </div>
</section>

<!-- ===================== CTA1 (hero直下 紺バー) ===================== -->
<section class="sec01_cta">
  <div class="sec01_cta_inner">
    <div class="sec01_cta_left">
      <img src="./images/cta_pattern_a.png.png" alt="加入者数30,000名突破 12年連続No.1" class="sec01_cta_badges">
    </div>
    <div class="sec01_cta_right">
      <a href="#contact" class="sec01_cta_btn">
        <span class="sec01_cta_btn_text">無料で資料請求をする</span>
        <span class="sec01_cta_btn_arrow">
          <img src="./images/icon_arr_white.webp" alt="">
        </span>
      </a>
    </div>
  </div>
</section>

<!-- ===================== 実績バッジ ===================== -->
<section class="sec01_lead">
  <div class="sec01_lead_inner">
    <div class="sec01_lead_badges">
      <div class="sec01_lead_row">
        <img src="./images/sec01-img01.png" alt="加入者数30,000件突破" class="sec01_lead_badge">
        <img src="./images/sec01-img02.png" alt="弁護士直通ダイヤル受電数50,000件突破" class="sec01_lead_badge">
        <img src="./images/sec01-img03.png" alt="保険金支払い実績15,000件突破" class="sec01_lead_badge">
        <img src="./images/sec01-img04.png" alt="弁護士紹介実績5,000件突破" class="sec01_lead_badge">
      </div>
      <img src="./images/sec01-img05.png" alt="単独型弁護士保険12年連続保有契約数No.1" class="sec01_lead_no1">
    </div>
    <p class="sec01_lead_note">※ 2025年3月現在。当社調べ</p>
  </div>
</section>

<!-- ===================== SEC01_2 弁護士保険ミカタとは ===================== -->
<section class="sec01_2" id="sec01_2">
  <div class="sec01_2_inner">
    <div class="sec01_2_top">
      <div class="sec01_2_title">
        <picture>
          <source media="(max-width:769px)" srcset="./images/sec1-2-img1_sp.png">
          <img src="./images/sec1-2-img1.png" alt="弁護士保険ミカタとは？">
        </picture>
      </div>
      <div class="sec01_2_card">
        <picture>
          <source media="(max-width:769px)" srcset="./images/sec1-2-img2_sp.png">
          <img src="./images/sec1-2-img2.png" alt="消費者トラブル、近隣とのトラブル、ハラスメントなどの労働トラブル、離婚や相続に関する問題">
        </picture>
      </div>
    </div>
    <div class="sec01_2_text">
      <p class="sec01_2_lead"><span class="sec01_2_lead_normal">など、</span><mark>日常生活の中で起こりうる</mark><br><mark>さまざまなリスクに対応</mark><span class="sec01_2_lead_normal">しています。</span></p>
      <div class="sec01_2_bottom">
        <p class="sec01_2_body">いざというときも、費用の不安を軽減することで、</p>
        <p class="sec01_2_highlight">「迷わず」「早めに」</p>
        <p class="sec01_2_body2">弁護士へ相談できる環境を整え、</p>
        <p class="sec01_2_emphasis"><strong>日々の安心</strong>につなげていただけます。</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== CTA main ===================== -->
<section class="cta cta_main" id="cta_main">
  <div class="cta_main_inner">
    <img src="./images/cta.png" alt="PC・スマホからすぐ確認できる！まずは無料で資料請求" class="cta_main_img">
    <a href="#contact" class="cta_main_btn">
      <span class="cta_main_btn_text"><span class="cta_main_btn_text_hl">無料</span><span class="cta_main_btn_text_sm">で</span>資料<span class="cta_main_btn_text_sm">を</span>請求<span class="cta_main_btn_text_sm">する</span></span>
      <span class="cta_main_btn_arrow">
        <img src="./images/icon_arr_white.webp" alt="">
      </span>
    </a>
  </div>
</section>

<!-- ===================== SEC02 ===================== -->
<div class="sec_deco" id="sec02">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec02_sp.webp">
    <img src="./images/sec02.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC03 ===================== -->
<div class="sec_deco sec_deco_narrow" id="sec03">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec03_sp.webp">
    <img src="./images/sec03.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC04 ===================== -->
<div class="sec_deco" id="sec04">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec04_sp.webp">
    <img src="./images/sec04.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC05 ===================== -->
<div class="sec_deco sec_deco_352" id="sec05">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec05_sp.webp">
    <img src="./images/sec05.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC06 ===================== -->
<div class="sec_deco" id="sec06">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec06_sp.webp" type="image/webp">
    <img src="./images/sec06.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC08 ===================== -->
<div class="sec_deco" id="sec08">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec08_sp.webp">
    <img src="./images/sec08.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC09 ===================== -->
<div class="sec_deco" id="sec09">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec09_sp.webp">
    <img src="./images/sec09.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC10 ===================== -->
<div class="sec_deco" id="sec10">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec10_sp.webp">
    <img src="./images/sec10.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC11 ===================== -->
<div class="sec_deco" id="sec11">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec11_sp.webp">
    <img src="./images/sec11.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== SEC12 ===================== -->
<div class="sec_deco sec_deco_960 sec_deco_352" id="sec12">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec12_sp.webp">
    <img src="./images/sec12.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== CTA main 2 ===================== -->
<section class="cta cta_main" id="cta_main2">
  <div class="cta_main_inner">
    <img src="./images/cta.png" alt="PC・スマホからすぐ確認できる！まずは無料で資料請求" class="cta_main_img">
    <a href="#contact" class="cta_main_btn">
      <span class="cta_main_btn_text"><span class="cta_main_btn_text_hl">無料</span><span class="cta_main_btn_text_sm">で</span>資料<span class="cta_main_btn_text_sm">を</span>請求<span class="cta_main_btn_text_sm">する</span></span>
      <span class="cta_main_btn_arrow">
        <img src="./images/icon_arr_white.webp" alt="">
      </span>
    </a>
  </div>
</section>

<!-- ===================== SEC13 ===================== -->
<div class="sec_deco" id="sec13">
  <picture>
    <source media="(max-width:769px)" srcset="./images/sec13_sp.webp">
    <img src="./images/sec13.webp" alt="" class="sec_deco_img" loading="lazy">
  </picture>
</div>

<!-- ===================== CTA FULL ===================== -->
<section class="cta cta_full" id="cta_full">
  <div class="cta_full_inner">
    <div class="cta_full_top">
      <img src="./images/cta.png" alt="まずは無料で資料請求" class="cta_full_pamphlet">
      <div class="cta_full_badges_area">
        <p class="cta_full_web">お申し込みはWebで完結！</p>
        <img src="./images/cta1.png" alt="加入者数30,000名突破 12年連続No.1" class="cta_full_badge_img">
        <p class="cta_full_note">※2025年3月現在。当社調べ</p>
      </div>
    </div>
    <div class="cta_full_buttons">
      <div class="cta_full_btn_col">
        <p class="cta_full_eyebrow">＼20秒でゲット／</p>
        <a href="#contact" class="cta_full_green_btn">
          <span class="cta_full_btn_text cta_full_btn_text_green"><span class="cta_full_btn_text_hl">無料</span><span class="cta_full_btn_text_sm">で</span>資料<span class="cta_full_btn_text_sm">を</span>請求<span class="cta_full_btn_text_sm">する</span></span>
          <span class="cta_full_btn_arrow">
            <img src="./images/icon_arr_white.webp" alt="">
          </span>
        </a>
      </div>
      <a href="#" class="cta_full_orange_btn">
        <span class="cta_full_btn_text cta_full_btn_text_orange">お申込みは<br>こちらをクリック</span>
        <span class="cta_full_btn_arrow">
          <img src="./images/icon_arr_white.webp" alt="">
        </span>
      </a>
    </div>
  </div>
</section>

<!-- ===================== SEC14 FAQ ===================== -->
<section class="sec14" id="sec14">
  <div class="sec14_inner">

    <div class="sec14_head">
      <div class="sec14_faq_badge">
        <span class="sec14_faq_text">FAQ</span>
        <span class="sec14_faq_arrow"></span>
      </div>
      <h2 class="sec14_title">よくあるご質問</h2>
    </div>

    <div class="sec14_list">

      <!-- Q1 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">いつ起きた法的トラブルでも、保険金は支払われるのですか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>保険開始日より前に法的トラブルの原因（弁護士へ相談したい出来事）が発生している場合は、弁護士へ相談・委任が保険開始日以降であったとしても、保険金のお支払い対象外となります。</p>
            <p>また、他にも一定期間の間に法的トラブルの原因が発生した場合は、保険金のお支払い対象外となります。</p>
            <div class="sec14_keywords">
              <a class="sec14_keyword" href="#faq-waiting" data-faq-target="faq-waiting"><img src="./images/icon_arr_blue.webp" alt="" class="sec14_keyword_arrow"><span>待機期間</span></a>
              <a class="sec14_keyword" href="#faq-exclusion" data-faq-target="faq-exclusion"><img src="./images/icon_arr_blue.webp" alt="" class="sec14_keyword_arrow"><span>特定原因不担保期間</span></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Q2 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">法的トラブルの発生時期は、どのように判断するのですか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>法的トラブルの発生時期は、その法的トラブルの原因（弁護士へ相談したい出来事）が生じたときに発生したものとみなします。</p>
            <div class="sec14_example">
              <p>（例）</p>
              <ul class="sec14_example_list">
                <li>相続トラブル…被相続人が亡くなったとき</li>
                <li>ハラスメントトラブル…最初にハラスメント被害にあったとき</li>
                <li>金銭トラブル…返済日に貸金の返済がなかったとき</li>
              </ul>
              <p>など</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Q3 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">保険開始日（責任開始日）は、どのように決まるのですか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>保険開始日（責任開始日）は、当社が保険契約の申込みを承諾した後、第1回保険料が払い込まれた日の属する月の翌月1日となります。同じ月に保険契約の申込みをいただいても、第1回保険料の払込方法によって、責任開始日が異なることがありますのでご注意ください。</p>
            <div class="sec14_table_wrap">
              <table class="sec14_table">
                <colgroup><col><col><col><col><col></colgroup>
                <thead>
                  <tr>
                    <th>申込方法</th>
                    <th>保険料の払込方法<br>（経路）</th>
                    <th>（書類）受付締切日</th>
                    <th>第1回保険料払込日</th>
                    <th>責任開始日</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="sec14_td_label sec14_td_left" rowspan="2">申込書での<br>お申し込み</td>
                    <td>クレジットカード払</td>
                    <td>毎月当社<br>最終営業日</td>
                    <td>当月末に決済</td>
                    <td class="sec14_td_right sec14_td_bottom" rowspan="4">第1回保険料が払い込まれた日の属する月の翌月1日</td>
                  </tr>
                  <tr>
                    <td>口座振替</td>
                    <td>毎月15日</td>
                    <td>翌月27日に振替</td>
                  </tr>
                  <tr>
                    <td class="sec14_td_label sec14_td_left sec14_td_bottom" rowspan="2">インターネット<br>でのお申し込み</td>
                    <td>クレジットカード<br>払</td>
                    <td>毎月月末</td>
                    <td>当月末に決済※1</td>
                  </tr>
                  <tr>
                    <td>インターネット<br>口座振替</td>
                    <td>毎月月末</td>
                    <td>翌月27日に振替</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <p class="sec14_note">※1：銀行口座からの引き落とし日はカード会社ごとの取り扱いとなります。詳しくは、カード会社にご確認下さい。</p>
            <p class="sec14_note">※保険契約申込書類の有効期限は3ヶ月です。もし、保険契約申込日から3ヶ月以内に、当社の承諾と第1回保険料の払込みがない場合は、申込まれた保険契約は不成立となり、再度申込み手続きが必要となります。</p>
          </div>
        </div>
      </div>

      <!-- Q4 待機期間 -->
      <div class="sec14_item" id="faq-waiting">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">待機期間とはなんですか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>保険開始日から3ヶ月以内に法的トラブルの原因が発生した場合、そのトラブルについては保険金支払の対象にはなりません。</p>
            <p>なお、交通事故など（特定偶発事故）には、この待機期間の設定はありません。</p>
            <div class="sec14_infobox">
              <p>法的トラブルに発展しそうな原因事象について、その発生が一定程度予見できる場合もあるため、いわゆる「逆選択」を排除するものです。一方、特定偶発事故は予見が不可能なのでこの待機期間はありません。</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Q5 特定原因不担保期間 -->
      <div class="sec14_item" id="faq-exclusion">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">特定原因不担保期間とはなんですか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>保険開始日から1年以内に、次の法的トラブルの原因が発生した場合は、保険金支払の対象にはなりません。</p>
            <ul class="sec14_ul">
              <li>リスク取引（金銭消費貸借・金融商品に関するトラブルなど）</li>
              <li>相続、離婚、親族関係に関するトラブル</li>
            </ul>
            <div class="sec14_infobox">
              <p>法的トラブルに発展しそうな原因事象について、その発生が一定程度予見できる場合もあることから、ご加入者さまの公平性を担保するため特定のトラブルに限り当該期間が設定されています。</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Q6 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">補償の対象になった場合、弁護士費用はすべて保険金で補われますか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>交通事故などの特定偶発事故については、弁護士費用の全額を保険金でお支払いできる場合もありますが、多くのケースで自己負担が発生します。主な注意点を下記でご案内します。</p>
            <ul class="sec14_ul">
              <li>一般事件については、保険金をお支払いできる割合が基準弁護士費用の80%（着手金・手数料部分。スタンダードの場合）となり、残りの費用については、自己負担が発生します。</li>
              <li>保険金の支払限度額を超えた場合は、自己負担が発生します。</li>
              <li>弁護士の提示額が、当社の定める「基準弁護士費用」または「基準紛争利益」を超えた場合は、その超過分について自己負担が発生します。</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Q7 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">事業に係わる法的トラブルは、保険金の支払対象になりますか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>被保険者のお仕事上、副業やアルバイトなどで発生した法的トラブルは、「事業上」のトラブルとなるため、保険金のお支払い対象外となります。</p>
            <p>なお、労務トラブルや各種ハラスメントに起因する法的トラブルなどは、保険金のお支払い対象となります。</p>
            <p>また、「事業特約」を付加いただくことで、事業上の法的トラブルについても補償の対象とすることができます。</p>
          </div>
        </div>
      </div>

      <!-- Q8 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">家族が直面した法的トラブルでも、補償の対象になりますか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>補償の対象となる方は、被保険者ご本人さまのみとなります。</p>
            <p>ご家族さまに「家族特約」を付加していただきますと、ご家族の方も補償の対象となります。家族特約は、お一人さまあたり約半額の保険料で家族も補償の対象とすることができる特約です。世帯や扶養が、ご契約者さまと同一でなくても、ご契約者さまの3親等以内のご家族さま（親族・姻族）であれば、主契約者さまと同等の補償を受けることができます。またプランも個々で選択することができます。</p>
          </div>
        </div>
      </div>

      <!-- Q9 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">保険金の支払いを受けた場合、更新後の保険料は上がりますか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>保険をご利用いただいても、保険料が上がることはありません。</p>
          </div>
        </div>
      </div>

      <!-- Q10 -->
      <div class="sec14_item">
        <div class="sec14_q">
          <span class="sec14_q_letter">Q</span>
          <span class="sec14_q_text">保険利用の回数制限はありますか？</span>
          <span class="sec14_plus"><img src="./images/icon_plus.webp" alt="" class="sec14_plus_img"></span>
        </div>
        <div class="sec14_a">
          <span class="sec14_a_letter">A</span>
          <div class="sec14_a_body">
            <p>回数制限はありません。</p>
            <p>ただし、法律相談料保険金・弁護士費用等保険金に対して、年間・通算での保険金の支払限度額があります。</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================== CTA BADGES 1 ===================== -->
<section class="cta cta_badges" id="cta_badges1">
  <div class="cta_badges_inner">
    <img src="./images/cta1.png" alt="加入者数30,000名突破 12年連続No.1" class="cta_badges_img">
    <p class="cta_badges_note">※ 2025年3月現在。当社調べ</p>
    <p class="cta_badges_eyebrow">＼WEBで完了／</p>
    <a href="#" class="cta_full_orange_btn">
      <span class="cta_full_btn_text cta_full_btn_text_orange">お申込みは<br>こちらをクリック</span>
      <span class="cta_full_btn_arrow">
        <img src="./images/icon_arr_white.webp" alt="">
      </span>
    </a>
  </div>
</section>

<!-- ===================== SEC15 弁護士推薦 ===================== -->
<section class="sec15_new" id="sec15">
  <div class="sec15_new_inner">
    <div class="sec15_new_head">
      <span class="sec15_new_eyebrow">Recommended</span>
      <h2 class="sec15_new_title">
        <span class="sec15_new_title_line1">弁護士保険ミカタは</span>
        <span class="sec15_new_title_line2"><em>弁護士</em>からも<em>推薦</em>されています</span>
      </h2>
    </div>

    <article class="sec15_new_card">
      <div class="sec15_new_card_head">
        <img src="./images/sec15-maru.png" alt="丸山和也弁護士" class="sec15_new_photo">
        <h3 class="sec15_new_name">丸山和也弁護士</h3>
      </div>
      <div class="sec15_new_card_content">
        <p class="sec15_new_quote"><span class="sec15_new_quote_accent">「私、弁護士保険に入ってるんですよ」</span>この一言はひじょ～～に強烈だと思いませんか？笑</p>
        <div class="sec15_new_body">
          <p>というのも、日本では弁護士を気軽に利用する意識がないんですね。</p>
          <p>「訴えるぞ！」とか「裁判だ！」「弁護士がついてるぞ！」と言われると誰でも弱気になります。</p>
          <p>弁護士保険の「ミカタ」のポイントは、保険証や、玄関に貼れるステッカーを持てるようになるので、抑止効果を発揮する。</p>
          <p class="sec15_new_body_highlight">「私、弁護士保険に入ってるんですよ」</p>
          <p>この一言はひじょ～～に強烈だと思いませんか？笑</p>
          <p>僕はこれからの日本について、「ミカタ」に加入していることが当然の世の中になってくると思うんです。</p>
          <p>日本での法的トラブルは、数え切れないほどあります。そんな時に、このサービスは強いミカタになると思うんですよね。</p>
          <p class="sec15_new_note">※個人の感想です</p>
        </div>
      </div>
    </article>

    <article class="sec15_new_card">
      <div class="sec15_new_card_head">
        <img src="./images/sec15-oobuchi.jpg" alt="大渕愛子弁護士" class="sec15_new_photo">
        <h3 class="sec15_new_name">大渕愛子弁護士</h3>
      </div>
      <div class="sec15_new_card_content">
        <p class="sec15_new_quote sec15_new_quote_dark">思いを晴らしたいのにできずに<br><span class="sec15_new_quote_accent">泣き寝入り</span>してしまった人がたくさんいます。</p>
        <div class="sec15_new_body">
          <p>婚約破棄などの慰謝料が多く取れない案件や、男性に騙され100万円払ってしまったけど取り返したいとか…そういった少額の争いの場合、弁護士費用を払うと、逆に赤字になってしまうようなこともあります。</p>
          <p>そんな時、弁護士を利用しないで何もできないで泣き寝入りしてしまう人がすごく多いんです。</p>
          <p>日本は特に弁護士を利用したことない人がすごく多く、<span class="sec15_new_body_accent">もっと気軽に利用できて、泣き寝入りせずに思いを晴らしたい</span>という人の願いを叶えることができるんじゃないかなと。</p>
          <p>特に少額のもの。例えば、詐欺は加害者のほうも「少額だと訴えられないだろう」って高を括ってやっているところもあるので、犯罪の抑止になるのではと期待しています。</p>
          <p class="sec15_new_note">※個人の感想です</p>
        </div>
      </div>
    </article>

    <article class="sec15_new_card">
      <div class="sec15_new_card_head">
        <img src="./images/sec15-ishi.jpg" alt="石渡真維弁護士" class="sec15_new_photo">
        <h3 class="sec15_new_name">石渡真維 弁護士</h3>
      </div>
      <div class="sec15_new_card_content">
        <p class="sec15_new_quote sec15_new_quote_dark">弁護士にとっても<span class="sec15_new_quote_accent">長年の夢</span>だった保険がようやくできるんだと感動致しました。</p>
        <div class="sec15_new_body">
          <p>企業なら何かあっても、すぐに顧問弁護士に相談することができますが、一般の方は争いごとも初めて、裁判も初めて、内容証明とかを受け取ってもドキドキしちゃうと思うんですね。</p>
          <p>そんな壁を乗り越えようやく弁護士までに相談に来て頂いたところに、私たちが「費用かかります」っていう風に言わなくてはならなくて…。</p>
          <p>弁護士保険があれば弁護士も説明しやすいし、本当に物事をスムーズにしてくれると思っています。</p>
          <p><span class="sec15_new_body_accent">「もらえるべきお金」をもらっていない方だと、最初の費用のお支払いのときから困る方も多い</span>ので、本当に役に立つと思います。特に女性のお客様や、専業主婦の方にもかなりアシストしてもらえる保険になると思います。</p>
          <p class="sec15_new_note">※個人の感想です</p>
        </div>
      </div>
    </article>

    <div class="sec15_new_manga">
      <img src="./images/sec15-img.png" alt="漫画 泣き寝入りのない世界へ">
    </div>
  </div>
</section>

<!-- ===================== CTA BADGES 2 ===================== -->
<section class="cta cta_badges cta_badges_web" id="cta_badges2">
  <div class="cta_badges_inner">
    <img src="./images/cta1.png" alt="加入者数30,000名突破 12年連続No.1" class="cta_badges_img">
    <p class="cta_badges_note">※2025年3月現在。当社調べ</p>
    <p class="cta_badges_eyebrow">＼WEBで完了／</p>
    <a href="#" class="cta_full_orange_btn">
      <span class="cta_full_btn_text cta_full_btn_text_orange">お申込みは<br>こちらをクリック</span>
      <span class="cta_full_btn_arrow">
        <img src="./images/icon_arr_white.webp" alt="">
      </span>
    </a>
  </div>
</section>

<!-- ===================== CONTACT FORM ===================== -->
<section id="contact" class="sec16">
  <div class="sec16_inner">

    <!-- Top banner -->
    <div class="sec16_banner">
      <picture>
        <source media="(max-width:769px)" srcset="./images/sec16-img01_sp.png">
        <img src="./images/sec16-img01.png" alt="資料請求数累計100,000件突破 スマホでも読める！簡単20秒入力 資料請求フォーム">
      </picture>
    </div>

    <!-- Intro card -->
    <div class="sec16_intro">
      <img src="./images/sec16-img02.png" alt="資料の一部をご紹介すると…マンガでわかる！弁護士保険とは？事例「トラブル予防編」事例「弁護士保険活用編」">
    </div>

    <!-- Form -->
    <div class="form_card">
      <!-- Tabs -->
      <ul id="change_tab" class="tab">
        <li id="tag_y" class="<?php echo ($tab === 'y') ? 'on' : 'off'; ?>">
          <span class="tab_text" data-main="郵送" data-sub="はこちら"></span>
        </li>
        <li id="tag_d" class="<?php echo ($tab === 'd') ? 'on' : 'off'; ?>">
          <span class="tab_text" data-main="ダウンロード" data-sub="はこちら"></span>
        </li>
      </ul>

      <!-- 郵送 panel -->
      <form id="rc_form_y" name="contact_y" method="post" action="./confirm_y.php" class="form_panel<?php echo ($tab === 'y') ? ' is_active' : ''; ?>" novalidate>
        <div class="form_row<?php echo !empty($err_y['y_name']) ? ' is_error' : ''; ?>">
          <label class="form_label">お名前 <span class="form_req">必須</span></label>
          <input class="form_input" type="text" name="y_name" value="<?php echo h(isset($y['y_name']) ? $y['y_name'] : ''); ?>" placeholder="例：ミカタ　太郎">
          <?php if (!empty($err_y['y_name'])): ?><span class="err_msg"><?php echo h($err_y['y_name']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_kana']) ? ' is_error' : ''; ?>">
          <label class="form_label">フリガナ <span class="form_req">必須</span></label>
          <input class="form_input" type="text" name="y_kana" value="<?php echo h(isset($y['y_kana']) ? $y['y_kana'] : ''); ?>" placeholder="例：ミカタ　タロウ">
          <?php if (!empty($err_y['y_kana'])): ?><span class="err_msg"><?php echo h($err_y['y_kana']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_mail']) ? ' is_error' : ''; ?>">
          <label class="form_label">メールアドレス <span class="form_req">必須</span></label>
          <input class="form_input" type="email" name="y_mail" value="<?php echo h(isset($y['y_mail']) ? $y['y_mail'] : ''); ?>" placeholder="例：info@mail.com">
          <?php if (!empty($err_y['y_mail'])): ?><span class="err_msg"><?php echo h($err_y['y_mail']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_tel']) ? ' is_error' : ''; ?>">
          <label class="form_label">電話番号 <span class="form_req">必須</span></label>
          <input class="form_input" type="tel" name="y_tel" value="<?php echo h(isset($y['y_tel']) ? $y['y_tel'] : ''); ?>" placeholder="例：09012345678">
          <span class="form_hint">※ハイフンありなしどちらも可</span>
          <?php if (!empty($err_y['y_tel'])): ?><span class="err_msg"><?php echo h($err_y['y_tel']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_zip']) ? ' is_error' : ''; ?>">
          <label class="form_label">郵便番号 <span class="form_req">必須</span></label>
          <input class="form_input form_input_zip" type="text" name="y_zip" value="<?php echo h(isset($y['y_zip']) ? $y['y_zip'] : ''); ?>" placeholder="例：1030006（ハイフンなし）" onKeyUp="AjaxZip3.zip2addr(this,'','y_pref','y_address01','','',false);">
          <span class="form_hint">※入力すると住所が自動で表示されます</span>
          <?php if (!empty($err_y['y_zip'])): ?><span class="err_msg"><?php echo h($err_y['y_zip']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_pref']) ? ' is_error' : ''; ?>">
          <label class="form_label">都道府県名 <span class="form_req">必須</span></label>
          <select class="form_input form_input_pref" name="y_pref">
            <option value="">選択してください</option>
            <?php
            $prefs = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
            $selected_pref = isset($y['y_pref']) ? $y['y_pref'] : '';
            foreach ($prefs as $p) {
                $sel = ($p === $selected_pref) ? ' selected' : '';
                echo '<option value="' . h($p) . '"' . $sel . '>' . h($p) . '</option>';
            }
            ?>
          </select>
          <?php if (!empty($err_y['y_pref'])): ?><span class="err_msg"><?php echo h($err_y['y_pref']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_address01']) ? ' is_error' : ''; ?>">
          <label class="form_label">住所 <span class="form_req">必須</span></label>
          <input class="form_input" type="text" name="y_address01" value="<?php echo h(isset($y['y_address01']) ? $y['y_address01'] : ''); ?>" placeholder="郵便番号で自動入力されます。">
          <?php if (!empty($err_y['y_address01'])): ?><span class="err_msg"><?php echo h($err_y['y_address01']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_y['y_address02']) ? ' is_error' : ''; ?>">
          <label class="form_label">番地・建物名 <span class="form_req">必須</span></label>
          <input class="form_input" type="text" name="y_address02" value="<?php echo h(isset($y['y_address02']) ? $y['y_address02'] : ''); ?>" placeholder="番地・部屋番号までご記入ください。">
          <?php if (!empty($err_y['y_address02'])): ?><span class="err_msg"><?php echo h($err_y['y_address02']); ?></span><?php endif; ?>
        </div>
        <div class="form_privacy">
          <strong>利用規約</strong><br>
          <a href="https://mikata-ins.co.jp/company/policy/privacy" target="_blank" rel="noopener">インターネットお申込みサービス利用規約</a>
        </div>
        <input type="hidden" name="y_typeModel" value="1">
        <div class="form_submit">
          <button type="submit" class="form_btn">
            <span class="form_btn_inner">
              <span class="form_btn_eyebrow">規約に同意した上で</span>
              <span class="form_btn_text">入力内容を確認する</span>
            </span>
            <span class="form_btn_arrow" aria-hidden="true">
              <img src="./images/icon_arr_white.webp" alt="" class="form_btn_arr">
            </span>
          </button>
        </div>
      </form>

      <!-- ダウンロード panel -->
      <form id="rc_form_d" name="contact_d" method="post" action="./confirm_d.php" class="form_panel<?php echo ($tab === 'd') ? ' is_active' : ''; ?>" novalidate>
        <div class="form_row<?php echo !empty($err_d['d_name']) ? ' is_error' : ''; ?>">
          <label class="form_label">お名前 <span class="form_req">必須</span></label>
          <input class="form_input" type="text" name="d_name" value="<?php echo h(isset($d['d_name']) ? $d['d_name'] : ''); ?>" placeholder="例：ミカタ　太郎">
          <?php if (!empty($err_d['d_name'])): ?><span class="err_msg"><?php echo h($err_d['d_name']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_d['d_mail']) ? ' is_error' : ''; ?>">
          <label class="form_label">メールアドレス <span class="form_req">必須</span></label>
          <input class="form_input" type="email" name="d_mail" value="<?php echo h(isset($d['d_mail']) ? $d['d_mail'] : ''); ?>" placeholder="例：info@mail.com">
          <?php if (!empty($err_d['d_mail'])): ?><span class="err_msg"><?php echo h($err_d['d_mail']); ?></span><?php endif; ?>
        </div>
        <div class="form_row<?php echo !empty($err_d['d_tel']) ? ' is_error' : ''; ?>">
          <label class="form_label">電話番号 <span class="form_req">必須</span></label>
          <input class="form_input" type="tel" name="d_tel" value="<?php echo h(isset($d['d_tel']) ? $d['d_tel'] : ''); ?>" placeholder="例：09012345678">
          <span class="form_hint">※ハイフンありなしどちらも可</span>
          <?php if (!empty($err_d['d_tel'])): ?><span class="err_msg"><?php echo h($err_d['d_tel']); ?></span><?php endif; ?>
        </div>
        <div class="form_privacy">
          <strong>利用規約</strong><br>
          <a href="https://mikata-ins.co.jp/company/policy/privacy" target="_blank" rel="noopener">インターネットお申込みサービス利用規約</a>
        </div>
        <input type="hidden" name="d_typeModel" value="1">
        <div class="form_submit">
          <button type="submit" class="form_btn">
            <span class="form_btn_inner">
              <span class="form_btn_eyebrow">規約に同意した上で</span>
              <span class="form_btn_text">入力内容を確認する</span>
            </span>
            <span class="form_btn_arrow" aria-hidden="true">
              <img src="./images/icon_arr_white.webp" alt="" class="form_btn_arr">
            </span>
          </button>
        </div>
      </form>

    </div>

  </div>
</section>

<!-- ===================== CTA BADGES WEB ===================== -->
<section class="cta cta_badges cta_badges_web" id="cta_badges_web">
  <div class="cta_badges_inner">
    <img src="./images/cta1.png" alt="加入者数30,000名突破 12年連続No.1" class="cta_badges_img">
    <p class="cta_badges_note">※ 2025年3月現在。当社調べ</p>
    <p class="cta_badges_eyebrow">＼WEBで完了／</p>
    <a href="#" class="cta_full_orange_btn">
      <span class="cta_full_btn_text cta_full_btn_text_orange">お申込みは<br>こちらをクリック</span>
      <span class="cta_full_btn_arrow">
        <img src="./images/icon_arr_white.webp" alt="">
      </span>
    </a>
  </div>
</section>

<!-- ===================== FOOTER ===================== -->
<footer id="svgFooter">
  <div class="footer_nav">
    <nav class="footer_nav_inner">
      <a href="https://mikata-ins.co.jp/company/policy/privacy" target="_blank" rel="noopener">個人情報のお取扱い</a>
      <span class="footer_divider" aria-hidden="true">|</span>
      <a href="https://mikata-ins.co.jp/company/policy/invite" target="_blank" rel="noopener">勧誘方針</a>
      <span class="footer_divider" aria-hidden="true">|</span>
      <a href="https://mikata-ins.co.jp/company" target="_blank" rel="noopener">運営会社</a>
    </nav>
  </div>
  <div class="footer_copy">
    <p class="footer_copy_text">Copyright(C)ミカタ少額短期保険株式会社 All rights reserved.</p>
    <p class="footer_copy_code">M2026営推01304</p>
  </div>
</footer>

</main>

<!-- ===================== 固定ボタン ===================== -->
<div id="fixedBtn" class="fixedBtn">
  <div class="fixedBtn_inner">
    <img src="./images/header-logo.png" alt="弁護士保険ミカタ" class="fixedBtn_logo">
    <a href="#contact" class="fixedBtn_link">
      <span class="fixedBtn_link_text"><span class="fixedBtn_link_text_hl">無料</span><span class="fixedBtn_link_text_sm">で</span>資料<span class="fixedBtn_link_text_sm">を</span>請求<span class="fixedBtn_link_text_sm">する</span></span>
      <span class="fixedBtn_link_arrow">
        <img src="./images/icon_arr_white.webp" alt="" class="fixedBtn_link_arr">
      </span>
    </a>
  </div>
</div>

  <script>
    jQuery(function($){
      $('#rc_form_y').submit(function(event) {
        event.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute("<?php echo $siteKey; ?>", {action: 'rc_action'}).then(function(token) {
            $('#rc_form_y').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
            $('#rc_form_y').prepend('<input type="hidden" name="action" value="rc_action">');
            $('#rc_form_y').unbind('submit').submit();
          });;
        });
      });
      $('#rc_form_d').submit(function(event) {
        event.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute("<?php echo $siteKey; ?>", {action: 'rc_action'}).then(function(token) {
            $('#rc_form_d').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
            $('#rc_form_d').prepend('<input type="hidden" name="action" value="rc_action">');
            $('#rc_form_d').unbind('submit').submit();
          });;
        });
      });
    })
  </script>

</body>
</html>
