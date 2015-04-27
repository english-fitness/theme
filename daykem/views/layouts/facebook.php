<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- begin header -->
<?php $this->renderPartial('/partial/top'); ?>
<!-- end header -->
<body>
    <div id="main">
        <div id="main-center">
            <?php echo $content; ?>
        </div>
    </div>
    <!--#main-->
	<div class="clear"></div>
<?php $this->renderPartial('/partial/footer'); ?>
</body>
</html>
