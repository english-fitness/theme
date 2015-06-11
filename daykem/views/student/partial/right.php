<?php
    $userID = Yii::app()->user->id;
    $languages = User::model()->findByPk($userID)->language;
    Yii::app()->language=$languages;
?>

<?php
	$user = Yii::app()->user;
	$notifications = Notification::model()->getNotifications($user, 2, null);
?>
<div class="page-title">
	<?php $countNotConfirmed = Notification::model()->getNotifications($user, null, false, true);?>
    <a href="<?php echo Yii::app()->baseurl ?>/student/notification"><?php echo Yii::t('lang','Thông báo');?>
    	<?php if($countNotConfirmed>0):?><span class="error">(<?php echo $countNotConfirmed;?>)</span><?php endif;?>
    </a>
	<?php 
		$countMessageNotReadFlag = MessageStatus::model()->countMessageNotReadFlag(Yii::app()->user->id);
		if($countMessageNotReadFlag>0):
	?>
	    <a style="float: right" href="<?php echo Yii::app()->baseurl; ?>/student/messages"><?php echo Yii::t('lang','Tin nhắn');?>
	        <span class="error">(<?php echo $countMessageNotReadFlag; ?>)</span>
	    </a>
    <?php else:?>
    	<a style="float: right" href="<?php echo Yii::app()->baseurl; ?>/student/messages/send"><?php echo Yii::t('lang','Tin nhắn');?></a>
    <?php endif;?>
</div>
<div class="notice">
	<?php
		$clsNotice = new ClsNotification(); 
		$enoughProfile = $clsNotice->enoughProfile($user->id);
		if(!$enoughProfile):
	?>
	<!--
	<div class="row-notice">
		<div class='error pA5'>Để tham gia chương trình học, bạn vui lòng cập nhật đủ và chính xác các thông tin cá nhân. Tất cả các trường hợp cập nhật không đủ, không chính xác sẽ bị xoá khỏi hệ thống và dừng khoá học bất cứ lúc nào mà không cần báo trước.</div>
	</div>
	-->
	<?php endif;?>
    <?php echo TestConditions::app()->getNotice(); ?>
    <?php if($countNotConfirmed>0):?>
        <div class="row-notice"><span class="mL5" style="color:red;"><?php echo Yii::t('lang','Bạn có');?> <?php echo $countNotConfirmed;?><?php echo Yii::t('lang','thông báo chưa đọc');?>!</span></div>
    <?php else: ?>
        <div class="row-notice"><span class="mL5" style="color:red;"><?php echo Yii::t('lang','Bạn chưa có thông báo mới');?></span></div>
    <?php endif; ?>
    <?php if($countMessageNotReadFlag>0):?>
        <div class="row-notice"><span class="mL5" style="color:red;"><?php echo Yii::t('lang','Bạn có');?> <?php echo $countMessageNotReadFlag;?> <?php echo Yii::t('lang','tin nhắn mới chưa đọc');?>!</span></div>
    <?php else: ?>
        <div class="row-notice"><span class="mL5" style="color:red;"><?php echo Yii::t('lang','Bạn chưa có thêm tin nhắn mới');?></span></div>
    <?php endif; ?>
</div>
