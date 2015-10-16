<?php

function threadedComments($comments)
{
?>
    <li id="<?php $comments->theId(); ?>"<?php $comments->levelsAlt('', ' class="odd"'); ?>>
		<div class="comment_data">
			<?php $comments->gravatar(32, 'X', '', 'avatar'); ?>
			<span class="author"><?php $comments->author(); ?></span>
			<?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?>
		</div>
		<?php $comments->content(); ?>
        <?php $comments->threadedComments('<ol>', '</ol>'); ?>
        <?php if (!$comments->isTopLevel): ?>
        <div class="comment_reply">
            <?php Helper::replyLink($comments->theId, $comments->coid, 'Reply', 'respond'); ?>
        </div>
        <?php endif; ?>
    </li>
<?php
}
?>

<div id="comments">
        <div id="ajax_comments">
		  <?php $this->comments()->to($comments); ?>
          <?php if ($comments->have()): ?>
          <div class="comments">
			<h3><?php $this->commentsNum(_t('本文暂无评论'), _t('本文仅有一篇评论'), _t('本文有 %d 篇评论')); ?> <a href="#respond" title="<?php _e('发表你的见解'); ?>"> <?php _e('↓↓'); ?></a></h3>
          </div>
			<ol id="comment_list">
            <?php while($comments->next()): ?>
				<li id="<?php $comments->theId(); ?>">
					<div class="comment_data">
						<?php $comments->gravatar(32, 'X', '', 'avatar'); ?>
						<span class="author"><?php $comments->author(); ?></span>
						<?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?>
					</div>
					<?php $comments->content(); ?>
                    <?php $comments->threadedComments('<ol>', '</ol>'); ?>
                    <div class="comment_reply">
                        <?php Helper::replyLink($comments->theId, $comments->coid, 'Reply', 'respond'); ?>
                    </div>
				</li>
			<?php endwhile; ?>
			</ol>
            <?php endif; ?>
            <?php if($this->allow('comment')): ?>
            <div id="respond">
            <div class="cancle_comment_reply"><?php Helper::cancleCommentReplyLink('Click here to cancel reply', 'respond'); ?></div>
			<h3 id="response"><?php _e('添加新评论'); ?> <a href="#header" title="<?php _e('回到页头'); ?>"><?php _e(' ↑↑'); ?></a></h3>
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
                <?php if($this->user->hasLogin()): ?>
				<p>Logged in as <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('登出'); ?> &raquo;</a></p>
                <?php else: ?>
				<p>
					<input type="text" name="author" id="author" class="t1" size="15" value="<?php $this->remember('author'); ?>" />
                    <label for="author"><?php _e('称呼'); ?><span class="required">*</span></label>
				</p>
				<p>
					<input type="text" name="mail" id="mail" class="t1" size="15" value="<?php $this->remember('mail'); ?>" />
                    <label for="mail"><?php _e('邮箱'); ?><?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></label>
				</p>
				<p>
					<input type="text" name="url" id="url" class="t1" size="15" value="<?php $this->remember('url'); ?>" />
                    <label for="url"><?php _e('网站'); ?><?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
				</p>
                <?php endif; ?>
				<p><textarea rows="5" cols="50" name="text" class="textarea"><?php $this->remember('text'); ?></textarea></p>
				<p><input type="submit" value="<?php _e('提交评论'); ?>" class="submit" /></p>
			</form>
            </div>
            <?php else: ?>
            
            <?php endif; ?>
		</div>
      </div>
