<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="Cache-Control" content="no-transform">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css?ver=20190221'); ?>">
    <link rel="shortcut icon" href="http://yusure.cn/icon.ico">
    <link rel="apple-touch-icon" href="http://yusure.cn/icon.png">
    <?php $this->header(); ?>
</head>
<body>
    <header id="header">
        <div class="wrapper clearfix">
            <nav id="nav" role="navigation">
                <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
                    <?php _e('首页'); ?>
                </a>
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while ($category->next()): ?>
                <?php if ( 0 == $category->parent ) { ?>
                <span class="dropdown">
                    <a 
                    <?php if ( $this->is('post')): ?>
                        <?php if($this->category == $category->slug): ?> class="current"<?php endif; ?>
                    <?php else: ?>
                        <?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>
                    <?php endif; ?> href="<?php $category->permalink(); ?>" >
                        <?php $category->name(); ?>
                    </a>
                    <!-- 子分类 Start -->
                    <?php if ( count( $category->children ) > 0 ) { ?>
                    <ul class="dropdown-content">
                    <?php foreach ( (array)$category->children as $k => $child_item ) { ?>
                        <li><a href="<?php echo $child_item['permalink']; ?>"> <?php echo $child_item['name']; ?> </a></li>
                    <?php } ?>
                    </ul>
                    <?php } ?>
                    <!-- 子分类 End -->
                </span>
                <?php } ?>
                <?php endwhile; ?>

                <!-- Single Page Start -->
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>">
                        <?php $pages->title(); ?>
                    </a>
                <?php endwhile; ?>
                <!-- Single Page End -->
            </nav>

            <!-- <div class="logo"><?php $this->options->title() ?></div>
            <div class="tri"></div> -->
            <form class="search" method="post" action="/search" role="search">
                <input type="search" name="s" autocomplete="off">
            </form>
            <div id="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>