//Javascript for step1 select subject
function checkValidStep1(){
	var subject_id, title, checkvalid;
	checkvalid = true;
	subject_id = $("#Course_subject_id").val();
	title = $("#Course_title").val();
	if(subject_id=="" || title==""){
		checkvalid = false;
	}
	return checkvalid;
}
//Auto complete suggest title for course
function suggestTitles(){
	var data = {'subject_id': $('#Course_subject_id').val()};
	$.ajax({
		url: daykemBaseUrl + "/student/courseRegistration/ajaxLoadSuggestion",
		type: "POST", dataType: 'JSON',data:data,
		success: function(data) {
			$( "#Course_title" ).autocomplete({
			      source: data.suggestions
			});
		}
	});
}
$(document).ready(function() {
	$('#btnNextInStep1').click(function(){
		var check_valid = checkValidStep1();
		if(check_valid){
			$("#formStep1").submit();
		}else{
			$("#validMessage").html('<div class="alert alert-danger">Vui lòng kiểm tra lại những trường dữ liệu bắt buộc* (lớp, môn, chủ đề)!</div>');
		}
	});
	$('#tutorClasses').change(function(){
		//Load ajax subjects by class
		var data = {'class_id': $(this).val()};
		$.ajax({
			url: daykemBaseUrl + "/student/courseRegistration/ajaxLoadSubject",
			type: "POST", dataType: 'html',data:data,
			success: function(data) {
				$('#divDisplaySubject').html(data);
			}
		});
	});
});

//Javascript for step2 select schedule
//Generate schedule session with suggest day & hour
function generateSchedule(){
    var nPerWeek = parseInt($('#numberSessionPerWeek').val());
    //Load ajax subjects by class
    var data = {'nPerWeek': nPerWeek};
    $.ajax({
        url: daykemBaseUrl + "/student/courseRequest/ajaxSuggestSchedules",
        type: "POST", dataType: 'html',data:data,
        success: function(data) {
            $('#selectedSchedule').html(data);
        }
    });
}
//Generate price table
function generatePriceTable(){
    var nStudent = parseInt($('#totalOfStudent').val());
    //Load ajax subjects by class
    var data = {'totalOfStudent': nStudent};
    $.ajax({
        url: daykemBaseUrl + "/student/courseRequest/AjaxGetPriceTable",
        type: "POST", dataType: 'html',data:data,
        success: function(data) {
            $('#loadPriceTable').html(data);
        }
    });
}
//Get full date in javascript
$(document).ready(function() {
    $('#btnNextInStep2').click(function(){
        var wnumber, startDate, startD;
        var displayStartDate = $('#displayStartDate').val();
        startD = displayStartDate.split("/");
        startDate = startD[2]+'-'+startD[1]+'-'+startD[0];
        $("#startDate").val(startDate);
        wnumber = $("#numberSessionPerWeek").val();
        if(wnumber!="" && startDate>=currentDate && startDate<="2100-01-01"){
            $("#formStep2").submit();
        }else{
            $("#validMessage").html('<span class="alert alert-danger">Vui lòng kiểm tra lại những trường dữ liệu bắt buộc* (số buổi/toàn khóa, số buổi/tuần, ngày bắt đầu, thời gian học)!</span>');
        }
    });
});