$(function(){
    // スクロールバーの横幅を取得
    $('html').append('<div class="scrollbar" style="overflow:scroll;"></div>');
    var scrollsize = window.innerWidth - $('.scrollbar').prop('clientWidth');
    $('.scrollbar').hide();

    // 「.modal-open」をクリック
    $('.modal-open').click(function(){
        // html、bodyを固定（overflow:hiddenにする）
        $('html, body').addClass('lock');

        // オーバーレイ用の要素を追加
        $('body').append('<div class="modal-overlay"></div>');

        // オーバーレイをフェードイン
        $('.modal-overlay').fadeIn('slow');

        // モーダルコンテンツのIDを取得
        var modal = '#' + $(this).attr('data-target');

         // モーダルコンテンツを囲む要素を追加
        $(modal).wrap("<div class='modal-wrap'></div>");

        // モーダルコンテンツを囲む要素を表示
        $('.modal-wrap').show();

        // モーダルコンテンツの表示位置を設定
        modalResize();

         // モーダルコンテンツフェードイン
        $(modal).fadeIn('slow');

        // モーダルコンテンツをクリックした時はフェードアウトしない
        $(modal).click(function(e){
            e.stopPropagation();
        });

        // 「.modal-overlay」あるいは「.modal-close」,「.modal-close2」をクリック
        $('.modal-wrap, .modal-close, .modal-close2, .modal-close3').off().click(function(){
            // モーダルコンテンツとオーバーレイをフェードアウト
            $(modal).fadeOut('slow');
            $('.modal-overlay').fadeOut('slow',function(){
                // html、bodyの固定解除
                $('html, body').removeClass('lock');
                // オーバーレイを削除
                $('.modal-overlay').remove();
                // モーダルコンテンツを囲む要素を削除
                $(modal).unwrap("<div class='modal-wrap'></div>");
           });
        });

        // リサイズしたら表示位置を再取得
        $(window).on('resize', function(){
            modalResize();
        });

        // モーダルコンテンツの表示位置を設定する関数
        function modalResize(){
            // ウィンドウの横幅、高さを取得
            var w = $(window).width();
            var h = $(window).height();

            // モーダルコンテンツの横幅、高さを取得
            var mw = $(modal).outerWidth(true);
            var mh = $(modal).outerHeight(true);

        }

    });
});
