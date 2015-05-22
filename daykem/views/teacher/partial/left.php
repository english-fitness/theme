<div class="info-user">
    <div class="avatar loadImageJavascript"><img src="<?php echo Yii::app()->user->getProfilePicture()?>" /></div>
    <!--.avatar-->
    <ul class="menu-user">
        <li><a href="#">
			<?php 
				$fullname = Yii::app()->user->getFullname();
				if (strlen($fullname) > 25)
					$fullname = substr($fullname, 0, 25)."...";
			echo $fullname;
			?>
		</a>
			<!-- REMOVE
            <ul>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/teacher/account/index">Personal Infor</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/teacher/account/socialNetwork">Connect Social</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Exit</a></li>
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
    $baseurl = Yii::app()->baseurl."/teacher";
    $menuLeftStudent  =  array(
	    array("label"=>"My schedule","url"=>array($baseurl."/class/nearestSession")),
		array("label"=>"My files","url"=>array($baseurl."/file")),
		array("label"=>"Test speaker, microphone","url"=>array($baseurl."/testCondition/index")),
        array("label"=>"Exit","url"=>array(Yii::app()->baseUrl."/site/logout")),
    );
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$menuLeftStudent
    ));
    ?>
</div>
<!--.menu-list-->