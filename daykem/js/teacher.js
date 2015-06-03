var loading =[];
loading.created = function()
{
    $("body").append('<div class="loading">Processing...</div>');
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

var loadPopupCalendar = {
    editSession: function(events,action){
        popup({
            width:"450px",
            title:"Chỉnh sửa buổi học",
            content: function(event){
                var temp = event.tempForm();
                var form = event.getForm({"action":action,"method":"post","class":"myFormPopup"});
                form +=event.rowForm("Chủ đề buổi học:",temp.input({"type":"text","name":"title","value":events.title}));
                form +=event.rowForm("Nội dung buổi học: ",temp.textarea({name:"content",style:"height:100px;"},events.content));
                form +=event.endForm({"name":"save"},"Cập nhật");
                return form;
            }
        });
    },
    ajaxForm: function(eventCalendar,calendar){
        $(document).on("click","button",function(){
            $(".myFormPopup").ajaxForm(function(response){
                if(response.success){
                    eventCalendar.title = response.notice.title;
                    eventCalendar.content = response.notice.content;
                    loading.removed();
                    calendar.fullCalendar('updateEvent',eventCalendar);
                    removePopupByID("popupAll");
                }
            });
        });
    }
}


var popups = {
    editCourse: function(action) {
        popup({
            width:"550px",
            title:"Chỉnh sửa thông tin khóa học",
            content: function(event){
                var temp = event.tempForm(),
                    form = event.getForm({"action":action,"method":"post","class":"myForm"});
                form +=event.rowForm("Chủ đề khóa học:",temp.input({"type":"text","name":"Course[title]", "disabled":"disabled", "value":str_replace("<br/>","\n",$(".aCourseTitle").html())}));
                form +=event.rowForm("Nội dung khóa học:",temp.textarea({style:"height:100px;","name":"Course[content]"},str_replace("<br>","\n",$(".aCourseContent").html())));
                form +=event.endForm({"name":"save"},"Cập nhật");
                return form;
            }
        });
    }
}

function str_replace(token, newToken,mystring) {
    return mystring.split(token).join(newToken);
}

