<?php
/**
 * xxx主题
 * 
 * @package xxx主题
 * @author xxx&ooo
 * @version 1.0.0
 * @link 
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php while($this->next()): ?>
                <section class="wallpaper clearfix article">
                    <div class="article-date">
                        <span class="month"><?php $this->date('n') ?>月</span>
                        <span class="day"><?php $this->date('d') ?></span>
                    </div>
                    <div class="article-title">
                        <h1><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    </div>
                    <div class="article-tag">
                        <span class="label label-danger"><i class="fa fa-calendar"></i></i>&nbsp;<a href="#"><?php $this->date('y-m-d') ?></a></span>
                        <span class="label label-info"><i class="fa fa-tags"></i>&nbsp;<a href="#"><?php $this->tags(',', true, 'none'); ?></a></span>
                        <span class="label label-warning"><i class="fa fa-cog fa-spin"></i></i>&nbsp;<a href="#"><?php $this->category(','); ?></a></span>
                        <span class="label label-success"><i class="fa fa-user"></i>&nbsp;<a href="#"><?php $this->author(); ?></a></span>
                    </div>
                    <figure>
                        <a href="<?php $this->permalink() ?>">
                            <?php showThumbnail($this); ?>
                        </a>
                    </figure>
                    <div class="article-content">
                        <?php $this->excerpt('220', '...') ?>
                    </div>
                    <a href="<?php $this->permalink() ?>" class="btn btn-success pull-right"><span class="badge"><?php $this->commentsNum() ?></span>&nbsp;阅读更多</a>

                </section>
            <?php endwhile; ?>
                <nav class="page-nav"><?php $this->pageNav('«', '»'); ?></nav>
            </div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>