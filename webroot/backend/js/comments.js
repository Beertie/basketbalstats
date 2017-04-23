$(function() {

    var $totalCom = $(".total-comment");
    $totalCom.text($(".list-comments > div").length);

    $("input.submit_comment[type='submit']").click(function () {

        var $text = $("#text"),
            $listComment = $(".list-comments"),
            $loading = $(".loading"),
            data,
            order_id = $(".order_id").val();

        if($text.html() == "")
        {
            $text.focus();
        }
        else
        {
            data = $text.html();
            $.ajax({
                type: "POST",
                url: "/admin/orders/addComment",
                data: {'text': $text.html(), 'type': 'intern', 'order_id': order_id},
                dataType: 'json',
                cache: false,
                success: function (html) {
                    $loading.show().fadeOut(300);
                    $listComment.append("<div>" + data + "</div>");
                    $text.html("");
                    $totalCom.text($(".list-comments > div").length);
                }
            });
            return false;
        }
    });

});