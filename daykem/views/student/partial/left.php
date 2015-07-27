<?php
        $userID = Yii::app()->user->id;
        $languages = User::model()->findByPk($userID)->language;
        Yii::app()->language=$languages;
?>
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
		array("label"=>Yii::t('lang',"Lịch học"),"url"=>array($baseurl."/class/nearestSession")),
		array("label"=>Yii::t('lang',"student_schedule_calendar_view"), "url"=>array($baseurl . "/schedule/calendar")),
		array("label"=>Yii::t('lang',"Kiểm tra loa, mic"),"url"=>array($baseurl."/testCondition/index")),
		array("label"=>Yii::t('lang',"Thông tin cá nhân"),"url"=>array($baseurl."/account/index")),
               // array("label"=>Yii::t('lang',"Thay đổi ngôn ngữ"),"url"=>array($baseurl."/class/language")),
		array("label"=>Yii::t('lang',"Đổi mật khẩu"), "url"=>array($baseurl."/account/changePassword")),
        /*array("label"=>"Đăng ký học","url"=>array($baseurl."/courseRequest/index")),*/
        /*array("label"=>"Hướng dẫn sử dụng","url"=>array($baseurl."/support/index")),*/
		array("label"=>Yii::t('lang',"Thoát hệ thống"),"url"=>array(Yii::app()->baseUrl."/site/logout")),
        /*array("label"=>"Ôn tập, kiểm tra kiến thức","url"=>array($baseurl."/quizExam/index")),
        array("label"=>"Thông tin học phí","url"=>array($baseurl."/information/tuition")),*/
    );
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$menuLeftStudent
    ));
    ?>
</div>
<!--.menu-list-->
