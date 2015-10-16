<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <article class="post post_content" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post_title" itemprop="name headline"><?php $this->title() ?></h1>
        <ul class="post_meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <div class="post_content_txt" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
        <div class="post_content_tools_share"></div>

		<?php $this->related(5)->to($relatedPosts); ?>
		<?php if ($relatedPosts->have()): ?>
		<div class="post_content_other panel panel-default">
			<h1 class="panel-heading">相关文章</h1>
			<ul class="panel-body widget_list">
		<?php while ($relatedPosts->next()): ?>
			<li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
		<?php endwhile; ?>
			</ul>
		</div>
		<?php else : ?>
		<?php endif; ?>
        <div class="postauthor_container">
			<h4>About The Author</h4>
			<div class="postauthor">
			<span class="postauthor_img"></span>
			<h5><?php $this->author(); ?></h5>
			<?php echo ($this->options->author_introduction);?>
			</div>
		</div>
    </article>
    <ul class="post_context">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
    <?php $this->need('comments.php'); ?>


</main><!-- end main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
