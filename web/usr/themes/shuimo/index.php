<?php
/**
 * 这是 lococo 制作的水墨中国风主题。
 * @package shuimo
 * @author lococo
 * @version 1.0.0
 * @link http://www.ccbworld.com
 */
 
 include('header.php');
 ?>


<div id="content">
	<div id="contentleft">
<div class="colehead"><div class="left">文章列表</div><div class="right"></div> </div>
		
<?php while($this->next()): ?>
<div class="postarea">
		<h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<div class="date">发布时间：<?php $this->date('Y月m月d日'); ?></div>
<?php $this->content('阅读剩余部分...'); ?>
			<div class="opt">作者：<?php $this->author(); ?> | 分类：<?php $this->category(','); ?> | 评论：<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('%d 条'); ?></a> | 标签：<?php $this->tags(', ', true, ' '); ?> </div>
			</div>
 
	<?php endwhile; ?>       
        <ol class="pages">
	    <li>页码:</li>
            <?php $this->pageNav(); ?>
	</ol>

    </div><!-- end #content-->
	<?php include('sidebar.php'); ?>
	<?php include('footer.php'); ?>
