<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
   	<!-- add icon for system-->
	<link rel="shortcut icon" href="https://speakup.vn/news/wp-content/uploads/2015/06/android-chrome-96x961.png" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/media/css/base/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin.css" />
	<?php if($this->loadJQuery):?>
		<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery-1.9.1.min.js"></script>
	<?php else:?>
		<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/media/js/admin/gridview.js"></script>
	<?php endif;?>	
	<script src="<?php echo Yii::app()->baseUrl; ?>/media/js/jquery/jquery-ui.js"></script>
	<script src="<?php echo Yii::app()->baseUrl; ?>/media/js/admin/menu.js"></script>
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/media/css/jquery/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/tags/bootstrap-tagsinput.css">
	<script type="text/javascript">
		var daykemBaseUrl = "<?php echo Yii::app()->baseUrl; ?>";
		var currentDate = "<?php echo date('Y-m-d')?>";
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
</head>
<div class="header">
<!-- row class cause the page to overflow in width
	<div class="row">
-->
	<div>
		<a href="<?php echo Yii::app()->baseUrl; ?>/admin"><div id="daykem-logo"></div></a>
		<div class="site-title">		
			<span>Quản lý dạy tiếng Anh trực tuyến</span>
		</div>
		<div class="fR">
<!-- hide hocmai login in admin page 
			<a href="<?php echo Yii::app()->baseUrl; ?>/admin"><div id="hocmai-logo"></div></a> -->
		</div>
		<div class="fR pR20 pT25 mT10">
			<?php if(Yii::app()->user->getId()):?>
			<span class="pT10 today"><b>Xin chào, <?php echo Yii::app()->user->getFullName(); ?></b> | </span>
			<?php endif;?>
			<?php $dayOfWeeks = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');?>
			<span class="pT10 today"><?php echo $dayOfWeeks[date('w')].date(', d/m/Y H:i')?></span>
		</div>  
	</div>
</div>
