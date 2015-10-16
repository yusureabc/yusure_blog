    <div class="break"></div>
</div>
<div id="footer">&copy; 2010 <?php $this->options->title(); ?>, Powered by <a href="http://typecho.org/" target="_blank">Typecho)))</a>, Theme by Fufu, Theme rework by <a href="http://i171.com/" target="_blank">i171 Studio</a>, <a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a> and <a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a>, <script language="javascript" src="http://count42.51yes.com/click.aspx?id=420597225&logo=12" charset="gb2312"></script>, <a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备08019602号</a> 
		<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3796743-2");
pageTracker._trackPageview();
} catch(err) {}</script></div>
<?php $this->footer(); ?>
<?php
if ($this->is('single')) {
    Helper::threadedCommentsScript();
}
?>
</div>
</body>
</html>
