    <div id="sidebar">
        <div class="widget">
			<div class="colehead"><div class="left">分类</div><div class="right"></div> </div>
<ul>
                <?php $this->widget('Widget_Metas_Category_List')
                ->parse('<li><a href="{permalink}">{name}</a> ({count})</li> '); ?>           
		</ul></div>

        <div class="widget">
			<div class="colehead"><div class="left">友情链接</div><div class="right"></div> </div>           
<ul><li><a href="http://www.ccbworld.com">品森之电子银行理财</a></li></ul>
		</div>

	    <div id="search" class="widget">
			<div class="colehead"><div class="left">站内搜索</div><div class="right"></div> </div>
<ul><li>	       <form method="post" action="">
            	<p><input type="text" name="s" class="text" size="20" /><input type="submit" class="submit" value="搜索" /></p>
	        </form></li></ul>
	    </div>
    
	    <div class="widget">
<?php if ($this->is('post')): ?>

<?php else : ?>
			<div class="colehead"><div class="left">最新回复</div><div class="right"></div> </div>
            <ul>
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
            <?php endwhile; ?>
            </ul>
<?php endif; ?>
	    </div>

	    <div class="pcenter">

</div>

		<div class="widget">
			<div class="colehead"><div class="left">其它</div><div class="right"></div> </div>
            <ul>
                <?php if($this->user->hasLogin()): ?>
					<li class="last"><a href="<?php $this->options->adminUrl(); ?>">进入后台(<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>">退出</a></li>
                <?php else: ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
                <?php endif; ?>
                <li><a href="http://validator.w3.org/check/referer">Valid XHTML</a></li>
                <li><a href="http://www.typecho.org">Typecho</a></li>
            </ul>
		</div>

    </div><!-- end #sidebar --></div>

