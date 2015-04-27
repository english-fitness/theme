<?php 
$baseurl =Yii::app()->baseUrl;
$baseurlAdmin = $baseurl.'/admin';


?>
<nav class="navbar navbar-onscholl" role="navigation">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php $this->widget('application.widgets.MenuAdmin');?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--
<div id="navigation">


	<ul class="fL">
		<li>
			<a class="parent" href="#" style="cursor:default;"><span class="setting mT5"></span>&nbsp;Hệ thống</a>
			<ul>
                <li><a href="<?php echo $baseurl; ?>/cart">Quản lý thẻ khuyến mãi</a></li>

                <li><a href="<?php echo $baseurlAdmin; ?>/package">Quản lý gói khóa học</a></li>
				  <li><a href="<?php echo $baseurlAdmin; ?>/headerScript">Cài đặt đầu trang</a></li>
                  <li><a href="<?php echo $baseurlAdmin; ?>/shareFacebook">Cài đặt chia sẻ facebook</a></li>
				  <?php if(!Yii::app()->user->isAdmin()):?>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/default/permission">Các quyền truy cập</a></li>
				  <?php endif;?>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/UserActionHistory">Lịch sử các hoạt động</a></li>	
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/classes">Danh mục lớp - môn</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/subjectSuggestion">Gợi ý chủ đề khóa học</a></li>
				  <?php if(Yii::app()->user->isAdmin()):?>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/user">Người dùng hệ thống</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/socialNetwork/facebook">Mạng xã hội đã kết nối</a></li>
				  <?php endif;?>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/account/changePassword">Thay đổi mật khẩu</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Thoát hệ thống</a></li>
			</ul>
		</li>
		<li>
			<a class="parent" href="#" style="cursor:default;"><span class="classes mT5"></span>&nbsp;Trắc nghiệm</a>
            <ul>
                <li><a href="<?php echo Yii::app()->baseurl;?>/admin/quizTopic">Chủ đề môn học</a></li>
                <li><a href="<?php echo Yii::app()->baseurl;?>/admin/quizExam">Đề thi trắc nghiệm</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/quizItem">Câu hỏi trắc nghiệm</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/quizHistory">Thống kê trắc nghiệm</a></li>
            </ul>
        </li>
		<li>
			<a class="parent" href="#" style="cursor:default;"><span class="message mT5"></span>&nbsp;Tin nhắn</a>
            <?php $countMessageNotReadFlag = MessageStatus::model()->countMessageNotReadFlag(1);
            if($countMessageNotReadFlag): ?>
                <div class="notification" title="<?php echo $countMessageNotReadFlag;?> tin nhắn">(<?php echo $countMessageNotReadFlag;?>)</div>
            <?php endif; ?>
            <ul>
                <li><a href="<?php echo Yii::app()->baseurl;?>/admin/message/inbox">Tin nhắn gửi đến</a></li>
                <li><a href="<?php echo Yii::app()->baseurl;?>/admin/message/outbox">Tin nhắn đã gửi</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/notification">Thông báo hệ thống </a></li>
            </ul>
        </li>
		<?php $notification =  new ClsNotification();?>
		<li>
			<a class="parent" href="#" style="cursor:default;">
				<span class="teachers mT5"></span>&nbsp;Thành viên
			</a>
			<?php
				$countNotActivatedTeacher = $notification->countNotActivatedUser(User::ROLE_TEACHER);
				$countNotActivatedStudent = $notification->countNotActivatedUser(User::ROLE_STUDENT);
				$countPendingPreregisterUser = $notification->countPendingPreregisterUser();
				
			?>
			<?php if($countNotActivatedStudent>0):?>
				<div class="notification" title="<?php echo $countNotActivatedStudent;?> học sinh chưa xác nhận tài khoản">(<?php echo $countNotActivatedStudent;?>)</div>
			<?php endif;?>
			<ul>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/student">Danh sách HS <span class="clrRed">(<?php echo $countNotActivatedStudent;?>)</span></a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/teacher">Danh sách GV <span class="clrRed">(<?php echo $countNotActivatedTeacher;?>)</span></a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/preregisterUser">Đăng ký tư vấn <span class="clrRed">(<?php echo $countPendingPreregisterUser;?>)</span></a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/userSalesHistory/index">Lịch sử chăm sóc</a></li>
			</ul>
		</li>
		<li>
			<a class="parent" href="#" style="cursor:default;">
				<span class="session mT5"></span>&nbsp;Đơn xin học
			</a>
			<?php $countPendingCourseRequest = $notification->countPendingCourseRequest();?>
			<?php if($countPendingCourseRequest>0):?>
				<div class="notification" title="<?php echo $countPendingCourseRequest;?> đơn xin học đang chờ xử lý">(<?php echo $countPendingCourseRequest;?>)</div>
			<?php endif;?>
			<ul>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/preregisterCourse">Đơn đăng ký lớp nhỏ</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/preregisterCourse?type=preset">Đơn đăng ký lớp đông</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/preregisterPayment">Lịch sử nộp học phí</a></li>	
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/preregisterCourse?deleted_flag=1">Đơn xin học đã xóa/hủy</a></li>
			</ul>
		</li>
		<li>
			<a class="parent" href="#" style="cursor:default;">
				<span class="session mT5"></span>&nbsp;Đơn/Khóa
			</a>
			<?php $countPendingPresetCourse = $notification->countPendingPresetCourse();?>
			<?php if($countPendingPresetCourse>0):?>
				<div class="notification" title="<?php echo $countPendingPresetCourse;?> đơn/khóa học đang chờ xử lý">(<?php echo $countPendingPresetCourse;?>)</div>
			<?php endif;?>
			<ul>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/presetCourse?PresetCourse[status]=<?php echo PresetCourse::STATUS_PENDING;?>">Đơn/khóa đang chờ</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/presetCourse?PresetCourse[status]=<?php echo PresetCourse::STATUS_REGISTERING;?>">Khóa đang tuyển sinh</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/presetCourse?PresetCourse[status]=<?php echo PresetCourse::STATUS_ACTIVATED;?>">Khóa học đã khai giảng</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/presetCourse?deleted_flag=1">Đơn/khóa đã xóa/hủy</a></li>
			</ul>
		</li>
		<li>
			<a class="parent" href="#" style="cursor:default;">
				<span class="classes mT5"></span>&nbsp;Khóa học
			</a>
			<?php $countPendingCourse = $notification->countPendingCourse();?>
			<?php if($countPendingCourse>0):?>
				<div class="notification" title="<?php echo $countPendingCourse;?> khóa học đang chờ được xác nhận">(<?php echo $countPendingCourse;?>)</div>
			<?php endif;?>
			<ul>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/course?Course[status]=<?php echo Course::STATUS_APPROVED;?>&type=<?php echo Course::TYPE_COURSE_NORMAL;?>">Khóa học thường</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/course?Course[status]=<?php echo Course::STATUS_APPROVED;?>&type=<?php echo Course::TYPE_COURSE_PRESET;?>">Khóa học tạo trước</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/course?Course[status]=<?php echo Course::STATUS_APPROVED;?>&type=<?php echo Course::TYPE_COURSE_TRAINING;?>">Khóa học thử (giá rẻ)</a></li>				  
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/course?Course[status]=<?php echo Course::STATUS_APPROVED;?>&type=<?php echo Course::TYPE_COURSE_TESTING;?>">Khóa học test</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/course?deleted_flag=1">Khóa học đã xóa/hủy</a></li>
			</ul>
		</li>
		<li>
			
			<?php 
				$nearestClass = "clock"; $reminderClass = "message";
				$alertNearestSession = $notification->countPendingNearestSession(false, 3);
				if($alertNearestSession>0){
					$nearestClass = "bellReminder"; $reminderClass = "bellReminder";
				}
			?>
			<a class="parent" href="#" style="cursor:default;">
				<span class="<?php echo $nearestClass;?> mT5"></span>&nbsp;Buổi học
			</a>
			<?php $countPendingNearestSession = $notification->countPendingNearestSession();?>
			<?php if($countPendingNearestSession>0):?>
				<div class="notification" title="<?php echo $countPendingNearestSession;?> buổi học gần nhất đang chờ được xác nhận">(<?php echo $countPendingNearestSession;?>)</div>
			<?php endif;?>
			<ul>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/session/nearest">Buổi học gần nhất</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/session/active">Buổi học đang diễn ra</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/session/ended">Buổi học hoàn thành</a></li>
				  <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/session/canceled?Session[status]=<?php echo Session::STATUS_CANCELED;?>">Buổi học đã hoãn/hủy</a></li>
			</ul>
		</li>
		<li>
			<a class="parent" href="<?php echo Yii::app()->baseUrl; ?>/admin/session/reminder">
				<span class="<?php echo $reminderClass;?> mT5"></span>&nbsp;Nhắc lịch học
			</a>
			<?php $countPendingReminderSession = $notification->countPendingNearestSession(true);?>
			<?php if($countPendingReminderSession>0):?>
				<div class="notification" title="<?php echo $countPendingReminderSession;?> buổi học đang chờ được xác nhận">(<?php echo $countPendingReminderSession;?>)</div>
			<?php endif;?>
		</li>
	</ul>

</div>
-->
