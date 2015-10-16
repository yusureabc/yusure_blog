<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php if($this->is('index')): ?><?php $this->options->title(); ?><?php else: ?><?php $this->archiveTitle(' - ', '', ''); ?><?php endif; ?></title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('ie.css'); ?>" /><![endif]-->
<?php $this->header(); ?>
</head>

<body>
<div id="wrapper">
	<div id="header">
		<div class="logo">
		<h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
        <h2><?php $this->options->description() ?></h2>
		</div>
        <div class="banner"><script type="text/javascript"><!--
google_ad_client = "pub-5103276334884998";
/* 爱一起你分页 */
google_ad_slot = "7558398826";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
        <div class="nav">
            <ul>
                <li class="f"><a title="<?php $this->options->title(); ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页 - Home'); ?></a></li>
                <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                <?php while($categorys->next()): ?>
                <li <?php if($this->is('category', $categorys->slug)): ?>class="current"<?php endif; ?>><a href="<?php $categorys->permalink(); ?>" title="查看 <?php $categorys->name(); ?> 下的所有日志"><?php $categorys->name(); ?></a></li>
                <?php endwhile; ?>
                <li><a href="http://i171.com/mm/" target="_blank"><?php _e('淘宝导购 - Taobao'); ?></a></li>
            </ul>
        </div>
	</div>
	<div id="body">
