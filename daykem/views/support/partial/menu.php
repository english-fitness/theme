<?php
$baseurl = Yii::app()->baseurl."/".$this->getModule()->id;
$menuLeftStudent  =  array(
    array("label"=>"Buổi học gần nhất","url"=>array($baseurl."/session/nearest")),
	array("label"=>"Buổi học đang diễn ra","url"=>array($baseurl."/session/active")),
	array("label"=>"Kiểm tra loa, mic","url"=>array($baseurl."/testCondition/index")),
    array("label"=>"Thông tin cá nhân","url"=>array($baseurl."/account/index")),
);
$this->widget('zii.widgets.CMenu', array(
    'items'=>$menuLeftStudent,
    "htmlOptions"=>array(
        "class"=>"nav nav-tabs"
    )
));
?>