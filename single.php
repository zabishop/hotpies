<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <title><?php bloginfo('name'); ?>
        | <?php if (is_home()) : echo bloginfo('description'); endif; ?><?php wp_title('', true); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php
/*-----------------------------------------------------------------------------------*/
/* Start header
/*-----------------------------------------------------------------------------------*/
?>

<header id="masthead" class="site-header" role="banner">
    <div class="container">

        <div class="gravatar">
            <?php $upload_dir = wp_upload_dir(); ?>
            <img src="<?php echo $upload_dir['baseurl']; ?>/2014/06/5335252_6420692_lz-e1401823653720.jpg"/>
        </div>
        <!--/ author -->

        <div id="brand">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                      title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                      rel="home"><?php bloginfo('name'); ?></a> &mdash;
                <span><?php echo get_bloginfo('description'); ?></span></h1>
        </div>
        <!-- /brand -->


        <div class="clear"></div>
    </div>
    <!--/container -->

</header>
<!-- #masthead .site-header -->

<div class="container">

    <div id="primary">
        <div id="content" role="main">

            <?php
            /*-----------------------------------------------------------------------------------*/
            /* Start Single loop
            /*-----------------------------------------------------------------------------------*/

            if (is_single()) {
            ?>


        <?php if (have_posts()) : ?>

        <?php while (have_posts()) :
        the_post(); ?>

            <article class="post">

                <?php if (has_category('projects')) {
                    get_template_part('template', 'project');
                } elseif (has_category('snippets')) {
                    get_template_part('template', 'snippet');
                } else {
                    get_template_part('template', 'single');
                } ?>


            </article>

            <?php endwhile; ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number())
                comments_template('', true);
            ?>


            <?php else : ?>

                <article class="post error">
                    <h1 class="404">Nothing posted yet</h1>
                </article>

            <?php endif; ?>


            <?php } //end is_single(); ?>


        </div>
        <!-- #content .site-content -->
    </div>
    <!-- #primary .content-area -->

</div>
    <!-- / container-->

<?php
/*-----------------------------------------------------------------------------------*/
/* Start Footer
/*-----------------------------------------------------------------------------------*/
?>

<footer class="site-footer" role="contentinfo">
    <div class="site-info container">
        <?php do_action('break_credits'); ?>
        <a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform" rel="generator">Proudly powered
            by WordPress</a>
        <span class="sep"> and </span>
        <a href="http://lessmade.com/themes/less" rel="theme">LESS</a> by <a href="http://jarederickson.com"
                                                                             rel="designer">Jared Erickson</a>
    </div>
    <!-- .site-info -->
</footer>
    <!-- #colophon .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
