var loading =[];
loading.created = function(message)
{
	if (!message){
		var message = "Processing..."
	}
    var courseLoading = $(".loading").length;
    if(courseLoading==0)
    {
        $("body").append('<div class="loading">' + message + '</div>');
    }
}
loading.removed = function()
{
    $(".loading").remove();
}
$(document).ready(function(){
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
    $(document).on("click","input[type='submit']",function(){
        loading.created();
    });
    $(document).on("click","button[type='submit']",function(){
        loading.created();
    });
    $('.list').slimScroll({
        "height": '430px'
    });
    $('#main-right .notice').slimScroll({
        "height": '300px'
    });


    $("body").on("submit",".formUser",function(e){
        e.preventDefault();
        $.ajax({
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            success: function(success) {
                loading.removed();
                var status = success.success?"success":"error";
                $(success.htmlTag).html('<div class="alert alert-'+status+'">'+success.notice+'</div>');
            }
        });
    });
});

function str_replace(token, newToken,mystring) {
   return mystring.split(token).join(newToken);
}

function confirm_value(msg) {
    if (window.confirm(msg))
        return true;
    return false;
}

function bookSession(values, successCallback, errorCallback){
	var session = {
		plan_start: values.start,
		teacher_id: values.teacher,
	};
	
	$.ajax({
		url:values.actionUrl,
		type:'post',
		data:{
			Session: session,
		},
		success:function(response){
			if (response.success){
				successCallback.call(undefined, response);
			} else {
				errorCallback.call(undefined, response);
			}
		}
	});
}