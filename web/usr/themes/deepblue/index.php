<?php
/**
 * 这是 M4GO 制作的一款新主题，深蓝色风格，纯CSS，无图。
 * 
 * @package Typecho Deepblue Theme 
 * @author M4
 * @version 2010.05.04
 * @link http://www.m4go.com
 */
 
 $this->need('header.php');
 ?>

    <div class="grid_10" id="content">
	<?php while($this->next()): ?>
        <div class="post">
			<h2 class="entry_title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<p class="entry_data">
				<span><?php _e('作者：'); ?><?php $this->author(); ?></span>
				<span><?php _e('发布时间：'); ?><?php $this->date('F j, Y'); ?></span>
				<span><?php _e('分类：'); ?><?php $this->category(','); ?></span>
				<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a>
			</p>
			<?php $this->content('阅读剩余部分...'); ?>
        </div>
	<?php endwhile; ?>

        <ol class="pages clearfix">
            <?php $this->pageNav(); ?>
        </ol>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
