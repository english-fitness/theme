<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php $baseUrl = Yii::app()->baseurl.'/cart'; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-onscholl navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  style="padding-top:2px; background-color:#ffffff; border:#ffffff" class="navbar-brand" href="/"><img style="width: 100px; " src="/themes/daykem/images/logo/onschool.png"/></a>
            </div>
            <!-- /.navbar-header -->
            <?php $this->widget('application.widgets.MenuAdmin');?>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php
                        $notifications = CartNotice::model()->findNewNotifications();
                        if($notifications): foreach($notifications as $notification):
                        ?>
                        <?php $this->renderPartial('//layouts/includes/_view_cart_notification',array('data'=>$notification)); ?>
                        <?php endforeach; else: ?>
                        <li class="text-center">Không có thông báo mới</li>
                        <?php endif; ?>
                        <li>
                            <a class="text-center" href="<?php echo Yii::app()->createUrl('/cart/notice'); ?>">
                                <strong>Xem tất cả</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/site/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php
            $controller = Yii::app()->controller;
            ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php
                    $countNotification = '';
                    $countNotice = CartNotice::model()->countNewNotification();
                    if($countNotice > 0 ) {
                        $countNotification = '<span class="badge pull-right">'.$countNotice.'</span> ';
                    }
                    $menu = array(
                        array(
                            'label'=>Icon::show('home').'Thẻ <span class="fa arrow"></span>',
                            'url'=>array('/cart'),
                            'active'=>($this->id=='cart')?true:false,
                            'items'=>array(
                                array(
                                    'label'=>'Quản lý thẻ',
                                    'url'=>array('/cart/cart/admin'),
                                    'active'=>($controller->id== 'cart' && $controller->action->id=='admin') ?true:false,
                                ),
                                array(
                                    'label'=>'Tạo thẻ mới',
                                    'url'=>array('/cart/cart/create'),
                                    'active'=>($controller->id== 'cart' && $controller->action->id=='create')?true:false,
                                )
                             ),

                            'submenuOptions'=>array('class'=>'nav nav-second-level')
                        ),
                        array('label'=>Icon::show('time').'Lịch sử','url'=>array('/cart/log'),'active'=>$this->id=='log'?true:false),
                        array('label'=>'<i class="fa fa-bell fa-fw"></i>Thông báo '.$countNotification,'url'=>array('/cart/notice'),'active'=>$this->id=='notice'?true:false),
                        array('label'=>'<i class="glyphicon glyphicon-lock"></i>Tài khoản bị khóa','url'=>array('/cart/locked'),'active'=>$this->id=='locked'?true:false)

                    );
                    $this->widget('zii.widgets.CMenu', array('encodeLabel'=>false,'items'=>$menu,'htmlOptions'=>array('class'=>'nav','id'=>'side-menu')));
                    ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <div class="row" style="padding-top: 5px">
                <div class="col-sm-5">
                    <?php $this->widget('application.widgets.bootstrap.Breadcrumbs',array('links'=>$this->breadcrumbs)); ?>
                </div>
                <div class="col-sm-7">
                    <div class="pull-right">
                        <?php $this->widget('application.widgets.bootstrap.LinkGroups',array('items'=>$this->menu)); ?>
                    </div>
                </div>
            </div>

            <?php echo $content; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sb-admin-2.js"></script>

</body>

</html>
