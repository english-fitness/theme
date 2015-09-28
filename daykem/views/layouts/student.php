<?php $this->renderPartial('/partial/top'); ?>

    <div id="main">
        <div id="leftContent">
            <div id="main-left">
                <?php $this->renderPartial('/partial/left'); ?>
            </div>
            <?php
            //<div id="main-right">
                //<?php $this->renderPartial('/partial/right'); ? >
            //</div>
            ?>
        </div>
        <!--#main-menu-->
        <div id="main-center">
            <?php echo $content; ?>
        </div>
        <!--#main-content-->
        <div class="cls"></div>
    </div>
    <!--#main-->
<?php $this->renderPartial('/partial/footer'); ?>
