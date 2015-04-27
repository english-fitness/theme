function loadPopupCalendar()
{
    var popupAllCalendar = {
        registerCourseUpdateCalendar: function(calEvent)
        {
            popup({
                width:"450px",
                title:"Chỉnh sửa buổi học",
                content: function(event){
                    var temp = event.tempForm();
                    var form = event.getForm({"action":"","method":"post","name":"calendarEditTitle"});
                    form +=event.rowForm("Chủ đề buổi học:",temp.input({"type":"text","name":"sessionTitle","value":calEvent.title}));
                    form +=event.rowForm("Thời gian bắt đầu:",temp.input({"style":"width: 100px;","type":"text","name":"sessionPlanStartDate","class":"datepicker","value":$.fullCalendar.formatDate(calEvent.start,"dd/MM/yyyy")})+event.selectTimeOption({"name":"sessionPlanStartTime","style":"width:auto"},$.fullCalendar.formatDate(calEvent.start,"HH:mm")));
                    form +=event.endForm({"name":"save"},"Cập nhật");
                    return form;
                }
            });
        },
        editSessionCalendar: function(calEvent)
        {
            popup({
                width:"600px",
                title:"Chỉnh sửa buổi học",
                content: function(event){
					var planStart = $.fullCalendar.formatDate(calEvent.start,"yyyy-MM-dd h:mm");
					var now = new Date(); now = $.fullCalendar.formatDate(now,"yyyy-MM-dd h:mm"); //Edit: changed TT to tt
                    var temp = event.tempForm(),
                    form = event.getForm({"action":"","method":"post","name":"calendarEditTitle"});
                    form +=event.rowForm("Chủ đề buổi học:",temp.input({"type":"text","name":"sessionTitle","value":calEvent.title}));
				    form +=event.rowForm("Thời gian bắt đầu:",temp.input({"style":"width: 100px;","type":"text","name":"sessionPlanStartDate","class":"datepicker","value":$.fullCalendar.formatDate(calEvent.start,"dd/MM/yyyy"),"disabled":"disabled"})+event.selectTimeOption({"name":"sessionPlanStartTime","style":"width:auto","disabled":"disabled"},$.fullCalendar.formatDate(calEvent.start,"HH:mm")));
					form += '<input type="hidden" id="allowChangePlanStart" value="0"/>'
                    form +=event.rowForm("Nội dung buổi học:",temp.textarea({"name":"sessionContent","style":"height:100px;"},calEvent.content));
                    form +=event.endForm({"name":"save"},"Cập nhật");
                    return form;
                }
            });
        },
        editCalendarBatch: function()
        {
            removePopupByID("popupAll");
            popup({
                width:"370px",
                title:"Dời lịch học",
                content: function(event){
                    var temp = event.tempForm();
                    var form = "<div class='pA15'>" +
						event.rowForm("Chọn kiểu dời:",
							temp.select({name:"moveSessons"},
								temp.option("1","Dời 1 buổi học về tương lai",'selected="selected"')+
								temp.option("-1","Dời 1 buổi học về gần hiện tại hơn")
							)
						)+
                        event.rowForm("&nbsp;",
                            temp.button({"id":"editCalendarBatchOk"},"Chấp nhận")+
                            temp.button({"onclick":'removePopupByID("popupAll")'},"Hủy")
                        )+
                        "</div>"
                    return form;
                }
            });
        }
    };
    return popupAllCalendar;
}
function eventClickCalendar()
{
    var events =
    {
        eventEditSessionCalendar: function()
        {
            var value = [];
            value.title = $("input[name='sessionTitle']").val();
			value.allowChangeStart = $("#allowChangePlanStart").val();
            value.PlanStartDate = $("input[name='sessionPlanStartDate']").val();
            value.PlanStartTime = $("select[name='sessionPlanStartTime']").val();
            var startD = value.PlanStartDate.split("/");
            value.PlanStart = startD[2]+'-'+startD[1]+'-'+startD[0]+" "+ value.PlanStartTime+":00";
            value.content = $("textarea[name='sessionContent']").val();
            value.sessionBackAll = $("select[name='sessionBackAll']").val();
            return value;
        }
    }
    return events;
}
var eventClickCalendar = eventClickCalendar();
var loadPopupCalendar = loadPopupCalendar();

var loading =[];
loading.created = function()
{
    var courseLoading = $(".loading").length;
    if(courseLoading==0)
    {
        $("body").append('<div class="loading">Đang xử lý dữ liệu...</div>');
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

function confirm_value(msg) {
    if (window.confirm(msg))
        return true;
    return false;
}
