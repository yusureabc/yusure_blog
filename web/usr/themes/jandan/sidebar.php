<div id="sidebar">
<form method="get" action="" target="_top">
  <label for="s" style="display:none;">输入您的搜索字词</label>
  <input type="text" name="s" id="s" value="" />
  <button type="submit">Search</button>
</form>
<h3>About</h3>
<ul>
	<li># &nbsp; 
	  <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <?php while($pages->next()): ?>
      <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a> | 
      <?php endwhile; ?>
      <a href="<?php $this->options->feedUrl(); ?>" title="文章RSS订阅"><?php _e('文章RSS'); ?></a>
    </li>
    <li># &nbsp; <a href="http://www.xianguo.com/subscribe.php?url=http://sansuer.com/index.php/feed" title="Xianguo Reader" rel="nofollow" target="_blank">鲜果</a> / <a href="http://fusion.google.com/add?feedurl=http://sansuer.com/index.php/feed" title="Google Reader" rel="nofollow" target="_blank">Google</a> / <a href="http://mail.qq.com/cgi-bin/feed?u=http://sansuer.com/index.php/feed" title="Email Reader" rel="nofollow" target="_blank">QQ</a> / <a href="http://www.zhuaxia.com/add_channel.php?url=http://sansuer.com/index.php/feed" title="Zhuaxia Reader" rel="nofollow" target="_blank">抓虾</a> / <a href="http://reader.youdao.com/b.do?keyfrom=feedsky&url=http://sansuer.com/index.php/feed" title="Yodao Reader" rel="nofollow" target="_blank">有道</a> / <a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论RSS'); ?></a></li>
</ul>
<h3>Recent Comments</h3>
<ul>
	<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
    <?php while($comments->next()): ?>
    <li><a href="<?php $comments->permalink(); ?>">
      <?php $comments->author(false); ?>
      </a>:
      <?php $comments->excerpt(50, '...'); ?>
    </li>
    <?php endwhile; ?>
</ul>
<h3>Recent Posts</h3>
<ul>
  <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
<?php if($this->is('post')): ?>
<h3>Related Posts</h3>
<ul>
  <?php $this->related()->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
<?php endif; ?>
<h3>Archive</h3>
<ul class="li2">
    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
</ul>
<h3>Other</h3>
<ul>
    <?php if($this->user->hasLogin()): ?>
					<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                <?php else: ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
                <?php endif; ?>
                <li><a href="http://i171.com">Jason's BLOG</a></li>
</ul>
</div>
