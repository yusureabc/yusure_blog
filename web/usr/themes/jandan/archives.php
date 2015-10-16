<?php include('header.php'); ?>
<div id="content">
	<div class="title"><?php if($this->is('index')): ?><?php _e('新鲜发布'); ?><?php else: ?><?php $this->archiveTitle(' - ', '', ''); ?><?php endif; ?>：</div>
	<?php while($this->next()): ?>	
    <div class="post f">
        <div class="info">
            <span class="small"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0', '1', '%d'); ?></a></span>
            <h2><a href="<?php $this->permalink() ?>" rel="bookmark"><?php $this->title() ?></a></h2>
        </div>
            <p class="time"><?php _e('&copy;  '); ?><?php $this->author(); ?> / <?php _e('Posted in '); ?><?php $this->category(','); ?> / <?php _e(''); ?><?php $this->date('F j, Y'); ?></p>
        <?php $this->content('继续阅读 &raquo;'); ?>
        <div class="break"></div>
    </div>
	<?php endwhile; ?>	
    <ul class="pages">
        <li>分页:</li>
		<?php $this->pageNav(); ?>
    </ul>
    <div class="break"></div>
</div>
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>
