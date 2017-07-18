<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('bootstrap/css/bootstrap.min.css'); ?>">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('bootstrap/css/bootstrap-theme.min.css'); ?>">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery-2.1.3.min.js'); ?>"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="<?php $this->options->themeUrl('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body><div class="header_container container">
    <div class="top_header">
        <a class="logo" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->description(); ?>"><h1><?php $this->options->title(); ?></h1></a>
    </div>
<header class="header">
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      
      
          <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        <?php @category_for_bootstrap_nav($this);?>
        </ul>
          <ul class="nav navbar-nav navbar-left">
            <li<?php if($this->is('index')): ?> class="active"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li<?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>>
                <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
            </li>
            <?php endwhile; ?>
          </ul>
        
      </div><!--end header's container-->
    </nav>
</header></div><!--/.nav-collapse -->
<div class="container outmost">
    <div class="header2"><p><?php echo ($this->options->ac);?></p></div>
<main class="main col-md-8 ">
