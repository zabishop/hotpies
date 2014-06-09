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

                $status_array = array('development', 'planning', 'proofing', 'hold', 'live');

                foreach ($status_array as $status) {
                    $my_query = new WP_Query(array(
                        'category_name' => 'projects',
                        'posts_per_page' => '-1',
                        'orderby' => 'meta_value',
                        'order' => 'DESC',
                        'meta_key' => 'status',
                        'meta_value' => $status
                    ));



                    echo "<fieldset class='{$status}'>";
                    echo "<legend><h2>{$status}</h2></legend>";

                    if ($my_query->have_posts()) {
                        //check status and assign time sensitive status
                        switch ($status) {
                            case 'live';
                                // #weeks * days/week * hours/day * min/hour * seconds/min
                                $bad = 10000 * 7 * 24 * 60 * 60;
                                $meh = 10000 * 7 * 24 * 60 * 60;
                                break;
                            case 'development';
                                // #weeks * days/week * hours/day * min/hour * seconds/min
                                $bad = 2 * 7 * 24 * 60 * 60;
                                $meh = 1 * 7 * 24 * 60 * 60;
                                break;
                            case 'planning';
                                // #weeks * days/week * hours/day * min/hour * seconds/min
                                $bad = 2 * 7 * 24 * 60 * 60;
                                $meh = 1 * 7 * 24 * 60 * 60;
                                break;
                            case 'proofing';
                                // #weeks * days/week * hours/day * min/hour * seconds/min
                                $bad = 4 * 7 * 24 * 60 * 60;
                                $meh = 2 * 7 * 24 * 60 * 60;
                                break;
                            case 'hold';
                                // #weeks * days/week * hours/day * min/hour * seconds/min
                                $bad = 6 * 7 * 24 * 60 * 60;
                                $meh = 3 * 7 * 24 * 60 * 60;
                                break;
                        }

                        //Begin table markup
                        echo '<table>';
                        //Begin table header markup
                        echo '<tr>';
                        echo '<th>Project</th>';
                        echo '<th>Developer</th>';
                        echo '<th>Last modified</th>';
                        echo '<tr>';
                        //End Table Header Markup
                        //Begin looping through posts to build table rows
                        while ($my_query->have_posts()) {

                            $my_query->the_post();

                            $last_modified = get_the_modified_date('m.d.y');
                            $last_modified_int = strtotime($last_modified);
                            $current_time = strtotime('now');
                            $difference = $current_time - $last_modified_int;

                            if ($difference > $bad) {
                                $class = "bad";
                            } elseif ($difference > $meh) {
                                $class = "meh";
                            } else {
                                $class = "good";
                            }

                            echo '<tr class="' . $class . '">';
                            //First column value
                            echo '<td>';
                            echo '<a href="';
                            echo the_permalink();
                            echo '">';
                            echo the_title();
                            echo '</a>';
                            echo '</td>';

                            //Second column
                            echo '<td>';
                            $values = $cfs->get('developer');
                            $i = 0;
                            foreach ($values as $value => $label) {
                                $i++;
                                if ($i != count($values)) {
                                    $value .= ", ";
                                }
                                echo $value;
                            }
                            echo '</td>';

                            //Third Column
                            echo '<td>';
                            echo $last_modified;
                            echo '</td>';


                        }
                        echo '</table>';
                    } else {
                        echo "<li>No projects found...</li>";
                    }

                    echo "</fieldset>";

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