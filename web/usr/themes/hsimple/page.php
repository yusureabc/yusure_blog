<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


    <article class="post post_content" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post_title" itemprop="name headline"><?php $this->title() ?></h1>
        <ul class="post_meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time></li>
        </ul>
        <div class="post_content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>
    <?php $this->need('comments.php'); ?>


</main><!-- end main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
