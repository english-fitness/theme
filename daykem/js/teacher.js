var loading =[];
loading.created = function()
{
    $("body").append('<div class="loading">Đang xử lý dữ liệu...</div>');
}
loading.removed = function()
{
    $(".loading").remove();
}
$(document).ready(function(){
    $("#main-right .notice").slimscroll({"height": '295px'});
    $('.list').slimScroll({
        "height": '350px'
    });
    $(".list-notice").slimScroll({
        height:"500px"
    });
    $(document).on("click","button",function(){
        $(".myForm").ajaxForm(function(response){
            if(response.success){
                $(response.htmlTag).html('<div class="alert alert-success">'+response.notice+'</div>');
                removePopupByID("popupAll");
            }else{
                $(response.htmlTag).html('<div class="alert alert-danger">'+response.notice+'</div>');
            }
            loading.removed();
        });
    });
    $(".myForm").ajaxForm(function(response){
        if(response.success){
            $(response.htmlTag).html('<div class="alert alert-success">'+response.notice+'</div>');
            removePopupByID("popupAll");
        }else{
            $(response.htmlTag).html('<div class="alert alert-danger">'+response.notice+'</div>');
        }
        loading.removed();
    });
    $(document).on("click","button[type='submit'],input[type='submit']",function(){
        var courseLoading = $(".loading").length;
        if(courseLoading==0)
        {
            loading.created();
        }
    });
});

function str_replace(token, newToken,mystring) {
    return mystring.split(token).join(newToken);
}

