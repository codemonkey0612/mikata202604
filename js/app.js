$(function () {

  // AOS
  AOS.init({ once: true, duration: 600 });

  // ── Fixed button scroll show/hide ──
  var $fixedBtn = $('#fixedBtn');
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 300) {
      $fixedBtn.addClass('is_show');
    } else {
      $fixedBtn.removeClass('is_show');
    }
  });

  // ── Smooth scroll for href="#contact" ──
  // Use scrollIntoView so position is recalculated during scroll,
  // which avoids stopping short when images above #contact haven't loaded yet.
  $(document).on('click', 'a[href="#contact"]', function (e) {
    e.preventDefault();
    var target = document.getElementById('contact');
    if (target) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });

  // ── Tab switching ──
  $('#tag_y').on('click', function () {
    if ($(this).hasClass('on')) return;
    $(this).addClass('on').removeClass('off');
    $('#tag_d').addClass('off').removeClass('on');
    $('#rc_form_d').removeClass('is_active');
    $('#rc_form_y').addClass('is_active');
  });

  $('#tag_d').on('click', function () {
    if ($(this).hasClass('on')) return;
    $(this).addClass('on').removeClass('off');
    $('#tag_y').addClass('off').removeClass('on');
    $('#rc_form_y').removeClass('is_active');
    $('#rc_form_d').addClass('is_active');
  });

  // ── Zip code → address auto-fill (skip arrow/nav keys to match production behaviour) ──
  $(document).on('keyup', '[name="y_zip"]', function (e) {
    var navKeys = [9, 16, 17, 18, 20, 27, 33, 34, 35, 36, 37, 38, 39, 40, 45, 46, 91, 93];
    if (navKeys.indexOf(e.which) === -1) {
      AjaxZip3.zip2addr(this, '', 'y_pref', 'y_address01');
    }
  });

  // ── FAQ accordion toggle ──
  $(document).on('click', '.sec14_q', function () {
    $(this).closest('.sec14_item').toggleClass('is_open');
  });

  // ── FAQ keyword links → open target item ──
  $(document).on('click', '[data-faq-target]', function (e) {
    e.preventDefault();
    var targetId = $(this).data('faq-target');
    var $target = $('#' + targetId);
    if (!$target.length) return;

    $target.addClass('is_open');

    $('html,body').animate({ scrollTop: $target.offset().top - 30 }, 500);
  });

});

// ── Form validation: download ──
function check_input_d() {
  var ok = true;
  var $form = $('#rc_form_d');

  var fields = [
    { name: 'd_name', label: 'お名前' },
    { name: 'd_mail', label: 'メールアドレス' },
    { name: 'd_tel',  label: '電話番号' }
  ];

  $form.find('.form_row').removeClass('is_error');
  $form.find('.err_msg').remove();

  fields.forEach(function (f) {
    var $input = $form.find('[name="' + f.name + '"]');
    var $wrap  = $input.closest('.form_row');
    var val    = $.trim($input.val());
    if (val === '') {
      $wrap.addClass('is_error');
      $wrap.append('<span class="err_msg">' + f.label + 'を入力してください</span>');
      ok = false;
    }
  });

  if (!ok) {
    var $first = $form.find('.is_error').first();
    $('html,body').animate({ scrollTop: $first.offset().top - 80 }, 400);
  }
  return ok;
}

// ── Form validation: postal ──
function check_input_y() {
  var ok = true;
  var $form = $('#rc_form_y');

  var fields = [
    { name: 'y_name',      label: 'お名前' },
    { name: 'y_kana',      label: 'フリガナ' },
    { name: 'y_mail',      label: 'メールアドレス' },
    { name: 'y_tel',       label: '電話番号' },
    { name: 'y_zip',       label: '郵便番号' },
    { name: 'y_pref',      label: '都道府県' },
    { name: 'y_address01', label: '住所' },
    { name: 'y_address02', label: '番地・建物名' }
  ];

  $form.find('.form_row').removeClass('is_error');
  $form.find('.err_msg').remove();

  fields.forEach(function (f) {
    var $input = $form.find('[name="' + f.name + '"]');
    var $wrap  = $input.closest('.form_row');
    var val    = $.trim($input.val());
    if (val === '' || val === '選択してください') {
      $wrap.addClass('is_error');
      $wrap.append('<span class="err_msg">' + f.label + 'を入力してください</span>');
      ok = false;
    }
  });

  if (!ok) {
    var $first = $form.find('.is_error').first();
    $('html,body').animate({ scrollTop: $first.offset().top - 80 }, 400);
  }
  return ok;
}
