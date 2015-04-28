<div class="info-user h50i">
    <a href="<?php echo Yii::app()->baseUrl; ?>/student/account">
        <div class="avatar loadImageJavascript">
            <img src="<?php echo Yii::app()->user->getProfilePicture()?>" alt="avatar"/>
        </div>
    </a>
    <!--.avatar-->
    <ul class="menu-user">
        <li>
        	<a href="<?php echo Yii::app()->baseUrl; ?>/student/account/index">
        		<?php 
					$fullname = Yii::app()->user->getFullname();
					if (strlen($fullname) > 13)
						$fullname = substr($fullname, 0, 13)."...";
				echo $fullname.' (ID: '.Yii::app()->user->id.')';
				?>
        	</a>
			<!--
            <ul>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/student/account/index">Thông tin cá nhân</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/student/account/socialNetwork">Kết nối mạng xã hội</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Thoát hệ thống</a></li>
            </ul>
			-->
        </li>
    </ul>
    <!--.full-name-->
    <div class="cls"></div>
</div>
<!--.info-user-->

<div class="menu-list">
    <?php
    $baseurl = Yii::app()->baseurl."/student";
    $menuLeftStudent  =  array(
		array("label"=>"Lịch học","url"=>array($baseurl."/class/nearestSession")),
		array("label"=>"Kiểm tra loa, mic","url"=>array($baseurl."/testCondition/index")),
		array("label"=>"Thông tin cá nhân","url"=>array($baseurl."/account/index")),
		array("label"=>"Đổi mật khẩu", "url"=>array($baseurl."/account/changePassword")),
        /*array("label"=>"Đăng ký học","url"=>array($baseurl."/courseRequest/index")),*/
        /*array("label"=>"Hướng dẫn sử dụng","url"=>array($baseurl."/support/index")),*/
		array("label"=>"Thoát hệ thống","url"=>array(Yii::app()->baseUrl."/site/logout")),
        /*array("label"=>"Ôn tập, kiểm tra kiến thức","url"=>array($baseurl."/quizExam/index")),
        array("label"=>"Thông tin học phí","url"=>array($baseurl."/information/tuition")),*/
    );
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$menuLeftStudent
    ));
    ?>
</div>
<!--.menu-list-->