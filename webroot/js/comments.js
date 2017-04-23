/**
 * Created by peter on 4-1-17.
 */
$(document).ready(function(){
    var $text = $("#text"),
        $submit = $("input[type='submit']"),
        $listComment = $(".list-comments"),
        $loading = $(".loading"),
        data,
        order_id = $(".order_id").val(),
        $totalCom = $(".total-comment");

    $totalCom.text($(".list-comments > div").length);

    $($submit).click(function(){
        if($text.html() == ""){
            alert("Plesea write a comment!");
            $text.focus();
        } else{
            data = $text.html();
            $.ajax({
                type: "POST",
                url: "/admin/orders/addComment",
                data: {'text':$text.html(), 'type':'intern', 'order_id':order_id},
                dataType: 'json',
                cache: false,
                success: function(html){
                    $loading.show().fadeOut(300);
                    $listComment.append("<div>"+data+"</div>");
                    $text.html("");
                    $totalCom.text($(".list-comments > div").length);
                }
            });
            return false;
        }
    });
});