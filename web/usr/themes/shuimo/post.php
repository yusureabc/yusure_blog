<?php include('header.php'); ?>

    <div id="content">
	<div id="contentleft">
<div class="colehead"><div class="left">查看文章</div><div class="right"></div> </div>
		<div class="postarea">
			<h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<div class="date">发布时间：<?php $this->date('Y月m月d日'); ?></div>
			<?php $this->content(); ?>
			<div class="opt">作者：<?php $this->author(); ?> | 分类：<?php $this->category(','); ?> | 评论：<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('%d 条'); ?></a> | 标签：<?php $this->tags(', ', true, ' '); ?> </div>
		</div>

		<?php include('comments.php'); ?>


    </div><!-- end #content-->
	<?php include('sidebar.php'); ?>
	<?php include('footer.php'); ?>
