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
    $(document).on("click","button[type='submit'],input[type='submit']",function(){
        var courseLoading = $(".loading").length;
        if(courseLoading==0)
        {
            loading.created();
        }
    });
    $("a[data='scroll']").click(function(){
        var data = $(this).attr("scroll");
        $(window).scrollTo( $(data), 800 );
        return false;
    });
    $("a[data='show']").click(function(){
        var data = $(this).attr("href");
        $(data).show();
        center(data+" .login");
        center(data+" .re");
        return false;
    });
    $("div.close").click(function(){
         $(this).parent().parent().parent().hide();
    });
})
function center(div){
    var top="30";
    var left="20";
    var height_window = $(window).innerHeight();
    var width_window  = $(window).innerWidth();
    var height_div    = $(div).innerHeight();
    var width_div     = $(div).innerWidth();
    left              = (width_window-width_div)/2;
    top               = (height_window-height_div)/2;
    $(div).css({
        "top":top+"px",
        "left":left+"px"
    });
}
function center_window(div){
    center(div);
    $(window).resize(function(){
        center(div);
    });
}
function ajaxPage(config)
{
    var type = checkNullArr(config.type,"get"),
        url = config.url,
        successClass = config.successByClass,
        data = checkNullArr(config.data,null)
    var ajax = {
        init: function()
        {
            if(data=='')
            {
                $.ajax({
                    type:type,
                    url:url,
                    success: function(html)
                    {
                        $(successClass).html(html)
                    }
                });
            }else{
                $.ajax({
                    type:type,
                    url:url,
                    data:data,
                    success: function(html)
                    {
                        $(successClass).html(html)
                    }
                });
            }

        }
    }
    return ajax.init();
}
function checkNullArr(check,defaults){
    if(!check){
        return defaults;
    }else{
        return check;
    }
}





