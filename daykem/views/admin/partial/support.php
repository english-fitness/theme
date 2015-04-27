<div id="navigation">
	<ul class="fL">
		<li>
			<a class="parent" href="<?php echo Yii::app()->baseurl;?>/support"><span class="session mT5"></span>&nbsp;Trang chủ</a>
		</li>
		<li>
			<a class="parent" href="<?php echo Yii::app()->baseurl;?>/admin/quizTopic"><span class="session mT5"></span>&nbsp;Chủ đề môn học</a>
        </li>
        <li>
			<a class="parent" href="<?php echo Yii::app()->baseurl;?>/admin/quizExam"><span class="session mT5"></span>&nbsp;Đề thi trắc nghiệm</a>
        </li>
        <li>
			<a class="parent" href="<?php echo Yii::app()->baseUrl; ?>/admin/quizItem" ><span class="session mT5"></span>&nbsp;Câu hỏi trắc nghiệm</a>
        </li>
        </ul>
    <div class="fR pR20 pT5">
		<?php if(Yii::app()->user->getId()):?>
		<span class="pT10 today"><b>Xin chào, <?php echo Yii::app()->user->firstname ?></b> | </span>
		<?php endif;?>
		<?php $dayOfWeeks = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');?>
		<span class="pT10 today"><?php echo $dayOfWeeks[date('w')].date(', d/m/Y H:i')?></span>
	</div>
</div>
