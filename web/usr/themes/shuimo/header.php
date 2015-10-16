<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>

<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>

<body>

<div id="header">
<div id="tit"><a href="<?php $this->options->siteUrl(); ?>" class="titlink"><?php $this->options->title() ?></a></div>
<div id="desc"><?php $this->options->description() ?></div>
<div id="tab"><ul>
<li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
<?php $this->widget('Widget_Contents_Page_List')->parse('<li ><a href="{permalink}">{title}</a></li>'); ?></ul></div></div>


<div id="wrap">
<!-- end #header -->
