<?php $this->renderPartial('/partial/top'); ?>
    <div id="main">
        <div id="mainContent">
            <div class="page-title">
                <label class="tabPage">Trang hỗ trợ lớp học trực tuyến</label>
                <div id="userProfile">
                    <span class="fullName"><a href="<?php echo Yii::app()->baseurl; ?>/<?php echo $this->getModule()->id;?>/account/index"><?php echo Yii::app()->user->getFullName(); ?></a></span>
                    <span class="logOut"><a href="<?php echo Yii::app()->baseurl; ?>/site/logout">Thoát</a> </span>
                </div>
            </div>
            <?php $this->renderPartial('/partial/menu'); ?>
            <?php echo $content; ?>
        </div>
    </div>
    <!--#main-->
<?php $this->renderPartial('/partial/footer'); ?>
