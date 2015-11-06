<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!--Base css *put base css before title so later files registered by controllers don't get overriden-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseAssetsUrl;?>/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $this->baseAssetsUrl;?>/css/base/style.css">
    <!--Base js files should go here too so depending js files can use them-->
    <script type="text/javascript" src="<?php echo $this->baseAssetsUrl;?>/js/moment.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--add icon for system-->
    <link rel="shortcut icon" href="https://speakup.vn/news/wp-content/uploads/2015/06/android-chrome-96x961.png" />

    <link href="<?php echo $this->themeAssetsUrl;?>/css/student.css" type="text/css" rel="stylesheet">

    <!--javascripts-->
    <script type="text/javascript" src="<?php echo $this->baseAssetsUrl;?>/js/jquery/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseAssetsUrl;?>/js/utils.js"></script>
    <!--extra js files-->
    <?php Yii::app()->clientScript->registerCoreScript('history');?>

    <script type="text/javascript" src="<?php echo $this->themeAssetsUrl;?>/js/student.js"></script>
    <script type="text/javascript" src="<?php echo $this->themeAssetsUrl;?>/js/popup.js"></script>
    <script type="text/javascript" src="<?php echo $this->themeAssetsUrl;?>/js/load.js"></script>
	<script>
		window.onunload = function(){
			$.ajax({
				async: false,
				url: "<?php echo Yii::app()->baseUrl;?>/site/logout",
				type: "POST",
			});
		};
	</script>
    <?php if (Yii::app()->language == "vi"): ?>
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
    <?php endif;?>
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
    <?php 
		$this->renderPartial('//site/partial/tawkTo'); 
	?>

    <?php
    	$settingHeader = Settings::loadHeader(Yii::app()->request->requestUri);
    	if(isset($settingHeader->value)) { echo $settingHeader->value;}
    ?>
    <?php
        $userID = Yii::app()->user->id;
        $languages = User::model()->findByPk($userID)->language;
        Yii::app()->language=$languages;
    ?>
    <?php echo Yii::t('lang','');?>
    
    
</head>

<body>
<div id="top">
        
	<div class="fL" style="width:20%; height:100%;">
		<div class="logo" style="left: 80px; top:0;">
            <a href="<?php echo Yii::app()->baseUrl; ?>/">
                <img style="background-color:white;padding:5px 3px;width:120px;border-radius:0px 0px 5px 5px" src="/media/images/logo/logo-300.png" />
            </a>
        </div>
	</div>
    <div class="language-select">
       
        <?php 
   
            if($languages=='en'){
        ?>
                <form id="my-form">
                    <?php echo Yii::t('lang','Language');?>:
                    <select name="navigation">
                        <option>English</option>
                    </select>
                </form>
                <script>
                    var navigation = [
                        {title: "Tiếng việt", url: '<?php echo Yii::app()->baseUrl."/student/class/language?lang=vi";?>'}
                      ];

                      var select = document.getElementById("my-form").navigation;

                      for (var i=0, option; i<navigation.length; i++) {
                        option = document.createElement("option");
                        option.value = navigation[i].url;
                        option.innerText = navigation[i].title;
                        option.innerText = navigation[i].title;
                        option.textContent=navigation[i].title;
                        select.appendChild(option);
                      }

                      select.addEventListener("change", function(event) {
                        window.location.href = select.value;
                    });
                </script>
                <?php 
                    }
                    if($languages=='vi'){
                        ?>
                <form id="my-form">
                    <?php echo Yii::t('lang','Language');?>:
                    <select name="navigation">
                        <option>Tiếng việt</option>
                    </select>
                </form>
                <script>
                    var navigation = [
                        {title: "English", url: '<?php echo Yii::app()->baseUrl."/student/class/language?lang=en";?>'}
                      ];

                      var select = document.getElementById("my-form").navigation;

                      for (var i=0, option; i<navigation.length; i++) {
                        option = document.createElement("option");
                        option.value = navigation[i].url;
                        option.innerText = navigation[i].title;
                        option.textContent=navigation[i].title;
                        select.appendChild(option);
                      }

                      select.addEventListener("change", function(event) {
                        window.location.href = select.value;
                    });
                </script>
                <?php
                    }
                ?>
            </span>
    </div>
</div>
<!--#top-->

