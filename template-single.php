<!-- template-single.php -->
<h1 class="title"><?php the_title() ?></h1>

<div class="post-meta">
    <?php if (comments_open()) : ?>
        <span class="comments-link">
									<?php comments_popup_link(__('Comment', 'less'), __('1 Comment', 'less'), __('% Comments', 'less')); ?>
								</span>
    <?php endif; ?>

</div>
<!--/post-meta -->

<div class="the-content">
    <?php the_content('Continue...'); ?>

    <?php wp_link_pages(); ?>
</div>
<!-- the-content -->

<div class="meta clearfix">
    <div class="category"><?php echo get_the_category_list(); ?></div>
    <div class="tags"><?php echo get_the_tag_list('| &nbsp;', '&nbsp;'); ?></div>
</div>
<!-- /template-single.php -->