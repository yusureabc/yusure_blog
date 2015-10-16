<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="side col-md-4">
	<aside class="sidebar">

		<section class="widget widget_type1 widget_search">
      <form class="form-inline" method="post" action="./" role="search">
        <div class="form-group">
	      
          <input type="text" class="form-control" name="s" placeholder="搜索一下">
	          
         <button type="submit" class="btn btn-default">Search</button>
        </div>
        
      </form>
		</section>

	    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	    <section class="panel panel-default">
			<h1 class="panel-heading"><?php _e('最新文章'); ?></h1>
	        <ul class="panel-body widget_list">
	            <?php $this->widget('Widget_Contents_Post_Recent')
	            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
	        </ul>
	    </section>
	    <?php endif; ?>

	    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
	    <section class="panel panel-default">
			<h1 class="panel-heading"><?php _e('最近回复'); ?></h1>
	        <ul class="panel-body widget_list">
	        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
	        <?php while($comments->next()): ?>
	            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
	        <?php endwhile; ?>
	        </ul>
	    </section>
	    <?php endif; ?>

	    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
	    <section class="panel panel-default widget_category">
			<h1 class="panel-heading"><?php _e('分类'); ?></h1>
	         <div class="panel-body"><?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget_list'); ?></div>
		</section>
	    <?php endif; ?>
	    
		<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTags', $this->options->sidebarBlock)): ?>
	    <section class="panel panel-default widget_tags">
	        <h1 class="panel-heading"><?php _e('TAGS'); ?></h1>
	        <div class="panel-body widget_tags_list noline"><?php $this->widget('Widget_Metas_Tag_Cloud')->parse('<a class="" href="{permalink}">{name}<sup>{count}</sup></a>'); ?></div>
	    </section>
		<?php endif; ?>

	    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
	    <section class="panel panel-default">
			<h1 class="panel-heading"><?php _e('归档'); ?></h1>
	        <ul class="panel-body">
	            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y - m')
	            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
	        </ul>
		</section>
	    <?php endif; ?>

	    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
		<section class="panel panel-default">
			<h1 class="panel-heading"><?php _e('其它'); ?></h1>
	        <ul class="panel-body">
	            <?php if($this->user->hasLogin()): ?>
					<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
	                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
	            <?php else: ?>
	                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
	            <?php endif; ?>
	            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
	            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
	            <li><a href="http://www.typecho.org">Typecho</a></li>
	        </ul>
		</section>
	    <?php endif; ?>


	</aside>
</div>
<!-- end .side -->
