<div id="comments" class="panel">
    <div>
        <h3 class="post-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
        <i class="fa fa-chevron-circle-up panel-toggle"></i>
    </div>
    <div class="comment-list">
        <header class="post-head">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
            

            <div class="comment_list">
            <?php $this->comments()->to($comments); ?>
                    <?php while($comments->next()): ?>
                <div id="<?php $comments->theId(); ?>" class="media">
                  <div class="media-left">
                    <a href="#">
                      <?php $comments->gravatar(40); ?>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php $comments->author(); ?>
                        <strong>on <?php $comments->date('Y年m月j日'); ?></strong>
                    </h4>
                        <?php $comments->content(); ?>
                  </div>
                </div>
                <div class="comment-reply">
                    <?php $comments->Reply(); ?>
                </div>
                <?php endwhile; ?>
            </div>

            <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>      
            <?php endif; ?>
            <?php if($this->allow('comment')): ?>
        </header>
    </div> 
    <div class="post-content">
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <h3 id="response"><?php _e('添加新评论'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if($this->user->hasLogin()): ?>
                <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                <?php else: ?>
                <p id="guest"><div class="guest-info"></div></p>
            <div class="comment-form">
                <p>
                    <label for="author" class="required"><?php _e('称呼'); ?></label>
                    <input type="text" name="author" id="author" class="form-control" value="<?php $this->remember('author'); ?>" required />
                </p>
                <p>
                    <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                    <input type="email" name="mail" id="mail" class="form-control" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                </p>
                <p>
                    <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                    <input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                </p>
            </div>
                <?php endif; ?>
                <p>
                    <!-- <label for="textarea" class="required"><?php _e('内容'); ?></label> -->
                    <textarea rows="8" cols="50" name="text" id="textarea" class="form-control" required ><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <button type="submit" class="btn btn-success"><?php _e('提交评论'); ?></button>
                </p>
            </form>
        </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    </div> 
</div>