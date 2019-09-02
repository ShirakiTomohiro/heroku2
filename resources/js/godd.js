$(function(){
    var $good = $('.btn-good'), //いいねボタンセレクタ
                goodPostId;
    $good.on('click' ,function(e){
        e.stopPropagation();
        var $this = $(this);
        
        goodPostId = $this.parents('.post').data('postid');
        $.ajax({
            type: 'POST',
            url: ''
        })
    })
})