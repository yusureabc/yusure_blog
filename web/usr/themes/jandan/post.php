<?php include('header.php'); ?>
<div id="content">
	<div class="title"><span class="tags"><?php $this->tags(' ', true, 'none'); ?></span><?php $this->category(''); ?></div>
	<div class="post f">
        <div class="info">
            <span class="small"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0', '1', '%d'); ?></a></span>
            <h2><a href="<?php $this->permalink() ?>" rel="bookmark"><?php $this->title() ?></a></h2>
        </div>
            <p class="time"><?php _e('&copy;  '); ?><?php $this->author(); ?> / <?php _e('Posted in '); ?><?php $this->category(','); ?> / <?php _e(''); ?><?php $this->date('F j, Y'); ?></p>
		<?php $this->content(); ?>
        <div class="break"></div>
        <div class="postnext">
            上一篇：<?php $this->thePrev('%s', '最后一篇日志'); ?> | 下一篇：<?php $this->theNext('%s', '最新日志'); ?>
        </div>
    </div>
    <?php include('comments.php'); ?>
</div>
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>
