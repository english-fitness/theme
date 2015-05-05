<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/media/css/base/common.css">


    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">


    <link href='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/student.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/media/css/jquery/jquery-ui.css">



    <!--css student-->
    <script src='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/jquery.min.js'></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.form.js"></script>
    <script src='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/jquery-ui.custom.min.js'></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.slimscroll.min.js"></script>
    <!--DatePicker-->
    <script src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery-ui.js"></script>
    <?php echo CHtml::scriptFile(Yii::app()->theme->baseUrl.'/bootstrap/js/bootstrap.min.js');?>
    <?php echo CHtml::scriptFile(Yii::app()->baseUrl.'/media/js/jquery/jquery.history.js');?>

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/student.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/popup.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/load.js"></script>
	<script>
		window.onunload = function(){
			$.ajax({
				async: false,
				url: "<?php echo Yii::app()->baseUrl;?>/site/logout",
				type: "POST",
			});
		};
	</script>
    <script type="text/javascript">
		var daykemBaseUrl = "<?php echo Yii::app()->baseUrl; ?>";
		var currentDate = "<?php echo date('Y-m-d')?>";
        $(document).ready(function(){
            $.datepicker.regional['vi'] = {
                closeText: 'Đóng',
                prevText: '&#x3c;Trước',
                nextText: 'Tiếp&#x3e;',
                currentText: 'Hôm nay',
                monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
                    'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
                monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
                dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                weekHeader: 'Tu',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
            $.datepicker.setDefaults($.datepicker.regional['vi']);
            $(document).on("click",".datepicker",function(){
                $(this).datepicker({
                    "dateFormat":"dd/mm/yy"
                }).datepicker("show");;
            });
        });
    </script>
    <?php if($this->loadMathJax):?>
        <script type="text/x-mathjax-config">
			MathJax.Hub.Config({
  				tex2jax: {
    				inlineMath: [['$','$'], ['\\(','\\)']],
   					processEscapes: true
  				}
			});
		</script>
        <script type="text/javascript" src="https://c328740.ssl.cf1.rackcdn.com/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
        </script>
    <?php endif;?>
	<?php $this->renderPartial('//site/partial/facebookTracking'); ?>
    <?php 
		// dont use tawk.to
		$this->renderPartial('//site/partial/tawkTo'); 
	?>

    <?php
    	$settingHeader = Settings::loadHeader(Yii::app()->request->requestUri);
    	if(isset($settingHeader->value)) { echo $settingHeader->value;}
    ?>
</head>

<body>
<?php $this->renderPartial('//site/partial/googleAnalytics'); ?>
<div id="top">
	<div class="fL" style="width:20%; height:100%;">
		<div class="logo" style="left: 100px; top:12px;"><a href="<?php echo Yii::app()->baseUrl; ?>/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo/logo3.png" /></a></div>
	</div>
</div>
<!--#top-->
