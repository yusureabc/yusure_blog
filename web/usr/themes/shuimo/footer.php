<div style="clear:both;"> </div>
<div id="footer">
	<h3>&copy; <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>版权所有。<img src="<?php $this->options->themeUrl('images/rss.gif'); ?>" /><a href="<?php $this->options->feedUrl(); ?>">文章</a> and <a href="<?php $this->options->commentsFeedUrl(); ?>">评论</a></h3>Powered by<a href="http://www.typecho.org">Typecho)))</a>。本模板由<a href="www.ccbworld.com">品森</a>制作。

</div><!-- end #footer --></div>
<?php $this->footer(); ?>
<?php
if ($this->is('single')) {
    Helper::threadedCommentsScript();
}
?>

</body>
</html>
