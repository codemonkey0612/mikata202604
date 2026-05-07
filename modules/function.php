<?php
/**
 * 共通ユーティリティ関数
 * - エスケープ
 * - 入力値サニタイズ（trim / 制御文字除去 / 全角→半角 など）
 * - フォームバリデーション
 * - 日本語UTF-8メール送信ヘルパ
 */

if (!function_exists('h')) {
    function h($s) {
        return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
    }
}

/**
 * 入力値の基本クレンジング
 *  - trim
 *  - NULLバイト・制御文字除去
 *  - 改行コードを LF に統一
 */
function clean_input($v) {
    if (is_array($v)) {
        return array_map('clean_input', $v);
    }
    $v = (string)$v;
    $v = str_replace(array("\r\n", "\r"), "\n", $v);
    $v = str_replace("\0", '', $v);
    $v = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $v);
    return trim($v);
}

/** 全角数字 → 半角数字 */
function to_half_digit($v) {
    return mb_convert_kana((string)$v, 'n', 'UTF-8');
}

/** メールアドレス書式判定 */
function is_valid_email($v) {
    return (bool)filter_var($v, FILTER_VALIDATE_EMAIL);
}

/** 電話番号判定（半角数字 10〜11桁、ハイフンは除去して判定） */
function is_valid_tel($v) {
    $v = preg_replace('/[\-－ー―‐]/u', '', $v);
    $v = mb_convert_kana($v, 'n', 'UTF-8');
    return (bool)preg_match('/\A0\d{9,10}\z/', $v);
}

/** 郵便番号判定（半角数字7桁、ハイフン許容） */
function is_valid_zip($v) {
    $v = mb_convert_kana($v, 'n', 'UTF-8');
    $v = str_replace('-', '', $v);
    return (bool)preg_match('/\A\d{7}\z/', $v);
}

/** カナ判定（全角カタカナ・長音・スペースのみ） */
function is_valid_kana($v) {
    return (bool)preg_match('/\A[ァ-ヶー　 ]+\z/u', $v);
}

/**
 * ダウンロード申込フォームのバリデーション
 *  $in : POST 値の配列
 *  return : エラー連想配列（空ならOK）
 */
function validate_d($in) {
    $err = array();
    if (empty($in['d_name']))                   { $err['d_name'] = 'お名前を入力してください'; }
    if (empty($in['d_mail']))                   { $err['d_mail'] = 'メールアドレスを入力してください'; }
    elseif (!is_valid_email($in['d_mail']))     { $err['d_mail'] = 'メールアドレスの形式が正しくありません'; }
    if (empty($in['d_tel']))                    { $err['d_tel']  = '電話番号を入力してください'; }
    elseif (!is_valid_tel($in['d_tel']))        { $err['d_tel']  = '電話番号は半角数字10〜11桁で入力してください'; }
    if (empty($in['d_typeModel']))              { $err['d_typeModel'] = '個人情報の取扱いに同意してください'; }
    return $err;
}

/**
 * 郵送申込フォームのバリデーション
 */
function validate_y($in) {
    $err = array();
    if (empty($in['y_name']))                       { $err['y_name']      = 'お名前を入力してください'; }
    if (empty($in['y_kana']))                       { $err['y_kana']      = 'フリガナを入力してください'; }
    elseif (!is_valid_kana($in['y_kana']))          { $err['y_kana']      = 'フリガナは全角カタカナで入力してください'; }
    if (empty($in['y_mail']))                       { $err['y_mail']      = 'メールアドレスを入力してください'; }
    elseif (!is_valid_email($in['y_mail']))         { $err['y_mail']      = 'メールアドレスの形式が正しくありません'; }
    if (empty($in['y_tel']))                        { $err['y_tel']       = '電話番号を入力してください'; }
    elseif (!is_valid_tel($in['y_tel']))            { $err['y_tel']       = '電話番号は半角数字10〜11桁で入力してください'; }
    if (empty($in['y_zip']))                        { $err['y_zip']       = '郵便番号を入力してください'; }
    elseif (!is_valid_zip($in['y_zip']))            { $err['y_zip']       = '郵便番号は半角数字7桁で入力してください'; }
    if (empty($in['y_pref']))                       { $err['y_pref']      = '都道府県を選択してください'; }
    if (empty($in['y_address01']))                  { $err['y_address01'] = '市区町村を入力してください'; }
    if (empty($in['y_address02']))                  { $err['y_address02'] = '番地・建物名を入力してください'; }
    if (empty($in['y_typeModel']))                  { $err['y_typeModel'] = '個人情報の取扱いに同意してください'; }
    return $err;
}

/**
 * 日本語UTF-8テキストメール送信
 * - PHP標準 mail() を使用（要件：AWS SES不使用）
 * - From / Reply-To をUTF-8 Bエンコード
 */
function send_text_mail($to, $from_addr, $from_name, $subject, $body) {
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');

    $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\n");
    $encoded_from    = mb_encode_mimeheader($from_name, 'UTF-8', 'B', "\n")
                       . ' <' . $from_addr . '>';

    $headers  = 'From: '       . $encoded_from . "\r\n";
    $headers .= 'Reply-To: '   . $from_addr   . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
    $headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";

    return mb_send_mail($to, $subject, $body, $headers);
}
