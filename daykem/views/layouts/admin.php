<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- begin header -->
<?php $this->renderPartial('/partial/header'); ?>
<!-- end header -->
<body>
<div class="admin-page">
	<div class="page-content-container text-center pB10">
		<?php if(isset(Yii::app()->user->id) && Yii::app()->user->role==User::ROLE_SUPPORT):?>
			<?php $this->renderPartial('/partial/support'); ?>
		<?php else:?>
			<?php $this->renderPartial('/partial/sidebar'); ?>
		<?php endif;?>
	</div>
    <div class="page-content-container col col-lg-12">
        <section class="page-content">
            <?php echo $content;?>
        </section>
    </div>
</div>
<div class="clear"></div>
<?php $this->renderPartial('/partial/footer'); ?>
</body>
</html>
