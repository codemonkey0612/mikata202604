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
  // Exponential smoothing animation. Every frame we move a fixed fraction of the
  // remaining distance to the live target. When lazy-loaded images above #contact
  // load mid-scroll and push the form further down, the scroll smoothly
  // accelerates toward the new position rather than jumping — one continuous
  // motion that lands on the form.
  var _scrollAnimId = null;
  $(document).on('click', 'a[href="#contact"]', function (e) {
    e.preventDefault();
    var target = document.getElementById('contact');
    if (!target) return;

    // Kick all lazy images above #contact into eager loading immediately so
    // the target stabilises as soon as possible.
    var contactInitY = target.getBoundingClientRect().top + window.pageYOffset;
    document.querySelectorAll('img[loading="lazy"]').forEach(function (img) {
      if (img.getBoundingClientRect().top + window.pageYOffset < contactInitY) {
        img.loading = 'eager';
      }
    });

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      window.scrollTo(0, target.getBoundingClientRect().top + window.pageYOffset - 20);
      return;
    }

    if (_scrollAnimId) cancelAnimationFrame(_scrollAnimId);

    var currentY = window.pageYOffset;
    var lastTime = null;
    var settledFrames = 0;
    var frameCount = 0;

    function getTargetY() {
      return target.getBoundingClientRect().top + window.pageYOffset - 20;
    }

    function step(now) {
      if (lastTime === null) lastTime = now;
      var dt = Math.min((now - lastTime) / 16.667, 2);
      lastTime = now;
      frameCount++;

      var targetY = getTargetY();
      var dist = targetY - currentY;
      // Framerate-independent exponential smoothing (~10% per 60fps frame)
      var k = 1 - Math.pow(0.9, dt);
      currentY += dist * k;
      window.scrollTo(0, currentY);

      if (Math.abs(dist) < 1) {
        if (++settledFrames > 3) {
          window.scrollTo(0, targetY);
          _scrollAnimId = null;
          return;
        }
      } else {
        settledFrames = 0;
      }

      // Safety cap (~2s at 60fps)
      if (frameCount > 120) {
        window.scrollTo(0, targetY);
        _scrollAnimId = null;
        return;
      }

      _scrollAnimId = requestAnimationFrame(step);
    }
    _scrollAnimId = requestAnimationFrame(step);
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
