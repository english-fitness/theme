<?php
	$user = Yii::app()->user;
	$notifications = Notification::model()->getNotifications($user, 2, null);
?>
<div class="page-title">
	<?php $countNotConfirmed = Notification::model()->getNotifications($user, null, false, true);?>
    <a href="<?php echo Yii::app()->baseurl ?>/teacher/notification">Notification
    	<?php if($countNotConfirmed>0):?><span class="error">(<?php echo $countNotConfirmed;?>)</span><?php endif;?>
    </a>
    <?php 
    	$countMessageNotReadFlag =MessageStatus::model()->countMessageNotReadFlag(Yii::app()->user->id);
    	if($countMessageNotReadFlag>0):
    ?>
	    <a style="float: right" href="<?php echo Yii::app()->baseurl; ?>/<?php echo $this->getModule()->id; ?>/messages">Messages
	        <span class="error">(<?php echo $countMessageNotReadFlag; ?>)</span>
	    </a>
	<?php else:?>
		<a style="float: right" href="<?php echo Yii::app()->baseurl; ?>/<?php echo $this->getModule()->id; ?>/messages/send">Messages</a>
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
        <div class="row-notice"><span class="mL5">You have <?php echo $countNotConfirmed;?> unread notifications!</span></div>
    <?php else: ?>
        <div class="row-notice"><span class="mL5">You don't have any new notifications</span></div>
    <?php endif; ?>
    <?php if($countMessageNotReadFlag>0):?>
        <div class="row-notice"><span class="mL5">You have <?php echo $countMessageNotReadFlag;?> unread messages!</span></div>
    <?php else: ?>
        <div class="row-notice"><span class="mL5" style="{color:red;}">You don't have any new messages</span></div>
    <?php endif; ?>
</div>