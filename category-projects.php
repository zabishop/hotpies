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
<!-- category-projects.php -->
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

            <div class="cat-main-section">
                <a href="/webdev/">< Wiki</a>
                <header>
                    <h1 class="title"> <?php single_cat_title(); ?></h1> </a>
                </header>
                <?php

                $status_array = array('in development', 'completed', 'client proofing', 'planning');


                foreach ($status_array as $status) {
                    $my_query = new WP_Query(array(
                        'category_name' => 'projects',
                        'posts_per_page' => '-1',
                        'orderby' => 'meta_value',
                        'order' => 'DESC',
                        'meta_key' => 'status',
                        'meta_value' => $status
                    ));

                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            echo '<li>';
                            $values = $cfs->get('status');


                            echo ' :<a href="';
                            echo the_permalink();
                            echo '">';
                            echo the_title();
                            echo '<span>';
                            echo $cfs->get('main_menu_subtitle');
                            echo '</span></a>';
                            foreach ($values as $value => $label) {
                                echo '<p>' . $value . '</p>';
                            }
                            echo '</li>';
                        }
                    }

                    wp_reset_postdata();

                }
                ?>


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

        </div>
        <!-- .site-info -->
    </footer>
    <!-- #colophon .site-footer -->

    <?php wp_footer(); ?>

</body>
</html>