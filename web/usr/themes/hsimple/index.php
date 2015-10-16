<?php
/**
 * Bootstrap技术，响应式布局，简洁灰色风格。
 * (响应式布局、自动文章摘要，自动提取文章第一幅图片为列表缩略图、自定义内容、新文章标注。)
 *<a href="http://api.codeinto.com/redirect/redirect.php?name=typecho_theme_hsimple" target="_blank">hsimple 主页</a>
 * @package hsimple
 * @author happmaoo
 * @version 1.00
 * @link http://blog.codeinto.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>




<?php while($this->next()): ?>
	<article class="post post_list">
	<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" rel="nofollow" class="post_thumbnail_container">
	<div class="post_thumbnail">
	<img src="<?php @thumbnail($this); ?>" class="attachment-featured wp-post-image" alt="<?php $this->title() ?>">
	</div>
	<div class="post_thumbnail_category">
	<?php $this->category(',',false); ?>
	</div>
	</a>
	<header>
	<h2 class="post_title post_list_title">
	<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" rel="bookmark"><?php $this->title() ?></a><?php @isNewPost($this);?>
	</h2>
	<ul class="post_meta post_list_meta">
		<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
		<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time></li>
		<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
		<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('没有评论', '1 条评论', '%d 条评论'); ?></a></li>
	</ul>
	</header><!--.header-->
	<div class="post_content post_list_content">
	<?php @summary($this); ?>
	</div>
	<span class="readmore"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" rel="nofollow">Read More</a></span>
	</article>
<?php endwhile; ?>

<div class="page_navigator_container noline"><?php $this->pageNav('&lt; 上一页', '下一页 &gt;'); ?></div>






</main>


<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
