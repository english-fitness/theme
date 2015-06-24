<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/media/css/base/style.css">

    <!--css student-->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/student.css" type="text/css" rel="stylesheet">

    <link href='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />

    <script src='<?php echo Yii::app()->baseUrl; ?>/media/js/calendar/jquery.min.js'></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/popup.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/media/css/jquery/jquery-ui.css">
    <script src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.slimscroll.min.js"></script>
    <?php echo CHtml::scriptFile(Yii::app()->baseUrl.'/media/js/jquery/jquery.history.js');?>
	<script type="text/javascript">
		var daykemBaseUrl = "<?php echo Yii::app()->baseUrl; ?>";
		var currentDate = "<?php echo date('Y-m-d')?>";
	</script>
	<?php $this->renderPartial('//site/partial/facebookTracking'); ?>
    <?php
    $settingHeader = Settings::loadHeader(Yii::app()->request->requestUri);
    if(isset($settingHeader->value)) { echo $settingHeader->value;}
    ?>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64042265-1', 'auto');
  ga('send', 'pageview');

</script>
<body>
<?php $this->renderPartial('//site/partial/googleAnalytics'); ?>
<div id="top">
	<div class="logo" style="left: 100px; top:12px;"><a href="<?php echo Yii::app()->baseUrl; ?>/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo/logo3.png" /></a></div>
<!--# tắt hiển thị logo hocmai.vn ở bên tay phải
    <div class="logo" style="right: 10px; left: auto; top:12px;"><a href="<?php echo Yii::app()->baseUrl; ?>/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo/logo1.png" /></a></div>
-->

</div>
<!--#top-->
