<li>
    <a href="<?php echo Yii::app()->createUrl('/cart/notice/view/',array('id'=>$data->id)); ?>">
        <div class="notification-row">
            <i class="fa fa-comment fa-fw"></i> <strong><?php echo $data->user->fullName(); ?></strong>
            <span class="notification-content"><?php echo $data->content; ?></span>
            <span class="pull-right text-muted small"><?php echo date('H:s, d/mY',$data->created_time); ?></span>
        </div>
    </a>
</li>
<li class="divider"></li>