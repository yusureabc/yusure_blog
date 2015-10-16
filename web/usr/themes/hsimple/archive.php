<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


        <h3 class="archive_title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类: <span>%s</span> 下的文章'),
            'search'    =>  _t('包含关键字: <span>%s</span> 的文章'),
            'tag'       =>  _t('Tag: <span>%s</span> 下的文章'),
            'author'    =>  _t('<span>%s</span> 发布的文章')
        ), '', ''); ?></h3>
        <?php if ($this->have()): ?>
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
			<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" rel="bookmark"><?php $this->title() ?></a>
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
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <div class="page_navigator_container noline"><?php $this->pageNav('&lt; 上一页', '下一页 &gt;'); ?></div>
    </main><!-- end main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
