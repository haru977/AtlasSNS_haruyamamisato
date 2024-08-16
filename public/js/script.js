// jQueryの動作確認用
// $(function() {
//     alert('OK!');
//   });

// 矢印の反転
$(function() {
    $('.nav-btn').click(function() {
        var arrow = $(this).find('.arrow');

        // 矢印を反転（回転）させる
        arrow.toggleClass('rotate');

        // メニューをトグル
        $('.nav-menu').toggle();
    });

    // メニューの外をクリックすると閉じる
    $(document).click(function(event) {
        if (!$(event.target).closest('.nav-btn, .nav-menu').length) {
            $('.nav-menu').hide();

            // 矢印を元に戻す
            var arrow = $('.nav-btn').find('.arrow');
            arrow.removeClass('rotate');
        }
    });
});


// 編集モーダル
$(function(){
    // 編集ボタン(class="js-modal-open")が押されたら発火
    $('.js-modal-open').on('click',function(){
        // モーダルの中身(class="js-modal")の表示
        $('.js-modal').fadeIn();
        // 押されたボタンから投稿内容を取得し変数へ格納
        var post = $(this).attr('post');
        // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
        var post_id = $(this).attr('post_id');

        // 取得した投稿内容をモーダルの中身へ渡す
        $('.modal_post').text(post);
        // 取得した投稿のidをモーダルの中身へ渡す
        $('.modal_id').val(post_id);
        return false;
    });

    // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js-modal-close').on('click',function(){
        // モーダルの中身(class="js-modal")を非表示
        $('.js-modal').fadeOut();
        return false;
    });
});

// 削除ボタンの反転
$(function() {
    $('a img').hover(
        function()
        {$(this).attr('src', $(this).attr('src').replace('trash', 'trash-h'));},
        function()
        {
            if (!$(this).hasClass('current')) {
                $(this).attr('src', $(this).attr('src').replace('trash-h', 'trash'));
        }
    }
    );
});