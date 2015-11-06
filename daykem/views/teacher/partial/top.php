<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!--Base css *put base css before title so later files registered by controllers don't get overriden-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseAssetsUrl; ?>/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $this->baseAssetsUrl; ?>/css/base/style.css">
    <!--Base js files should go here too so depending js files can use them-->
    <script type="text/javascript" src="<?php echo $this->baseAssetsUrl; ?>/js/moment.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--add icon for system-->
    <link rel="shortcut icon" href="https://speakup.vn/news/wp-content/uploads/2015/06/android-chrome-96x961.png" />

    <!--css student-->
    <link href="<?php echo $this->themeAssetsUrl; ?>/css/student.css" type="text/css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo $this->baseAssetsUrl; ?>/js/jquery/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseAssetsUrl; ?>/js/jquery/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->themeAssetsUrl; ?>/js/popup.js"></script>

    <script type="text/javascript" src="<?php echo $this->baseAssetsUrl; ?>/js/jquery/jquery.slimscroll.min.js"></script>
    <?php Yii::app()->clientScript->registerCoreScript('history');?>
	<script type="text/javascript">
		var daykemBaseUrl = "<?php echo Yii::app()->baseUrl; ?>";
		var currentDate = "<?php echo date('Y-m-d')?>";
	</script>
    <?php
    $settingHeader = Settings::loadHeader(Yii::app()->request->requestUri);
    if(isset($settingHeader->value)) { echo $settingHeader->value;}
    ?>
</head>
<body>
<div id="top">
	<div class="fL" style="width:20%; height:100%;">
        <div class="logo" style="left: 80px; top:0;">
            <a href="<?php echo Yii::app()->baseUrl; ?>/">
                <img style="background-color:white;padding:5px 3px;width:120px;border-radius: 0 0 5px 5px" src="<?php echo $this->baseAssetsUrl;?>/images/logo/logo-300.png" />
            </a>
        </div>
    </div>

</div>
<!--#top-->
