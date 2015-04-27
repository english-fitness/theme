<?php
	if(isset(Yii::app()->params['googleTagCode'])){
		$googleTagCode = Yii::app()->params['googleTagCode'];
	}
	if(isset($googleTagCode) && $googleTagCode!=null):
?>
<?php if(isset(Yii::app()->user->id) && isset(Yii::app()->user->role)):?>
<!-- Data layer code -->
 <script>
    dataLayer = [{
      'userID': '<?php echo Yii::app()->user->id;?>', //ID User
      'userRole': '<?php echo Yii::app()->user->role;?>',// Role User
 	  'visitorType': 'loggedUser'
    }];
  </script>
<!-- End data layer code -->
<?php endif;?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php echo $googleTagCode;?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $googleTagCode;?>');</script>
<!-- End Google Tag Manager -->
<?php endif;?>