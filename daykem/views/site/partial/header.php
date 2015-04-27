<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/media/css/base/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery-1.9.1.min.js"></script>	
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery.scrollTo-min.js"></script>	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/popup.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/media/css/jquery/jquery-ui.css">
    <script src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery-ui.js"></script>
    <?php
    $settingHeader = Settings::loadHeader(Yii::app()->request->requestUri);
    if(isset($settingHeader->value)) { echo $settingHeader->value;}
    ?>
</head>
<!--div id="top">
	<div style="opacity:1; position: relative">
	<div class="logo" style="background:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/logo/logo.jpg') no-repeat center;">
		  <a href="<?php echo Yii::app()->getRequest()->getBaseUrl(true); ?>" style="display: block;width: 150px; height: 67px;"></a>
	</div>
	<div class="menu">
		<ul class="nav">
			<li><a data="scroll" href="#recommend">Giới thiệu</a></li>
			<li><a data="scroll" href="#compare">So sánh</a></li>
			<li><a data="scroll" href="#teacher">Giáo viên</a></li>
			<li><a data="scroll" href="#contact">Liên hệ</a></li>
		</ul>
	</div>
	<?php if(Yii::app()->user->isGuest):?>
	<div class="login">
		<span class="click accountLogin"><a href="#">Đăng nhập</a></span>
	</div>
	<?php else:?>
	<div class="login">
		<?php 
			$strRole = Yii::app()->user->getRole();
			if($strRole==User::ROLE_MONITOR) $strRole = User::ROLE_ADMIN;
		?>
		<span><a href="<?php echo Yii::app()->baseUrl; ?>/<?php echo str_replace("role_","",$strRole)?>"><?php echo Yii::app()->user->getFullname()?></a> </span>
		<span class="click"><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Đăng xuất</a></span>
	</div>
	<?php endif?>
	</div>
</div-->