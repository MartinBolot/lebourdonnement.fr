<?php

    $templateURI = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="en">

    <?php get_template_part('head', 'none'); ?>


  <body id="home">

    <!-- Navigation -->
    <?php get_template_part('navigation', 'none'); ?>
    <?php get_header(); ?>


<div id="global_headlines">

    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );

        // End the loop.
        endwhile;

        // Previous/next page navigation.
        the_posts_pagination( array(
            'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
            'next_text'          => __( 'Next page', 'twentyfifteen' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
        ) );

    // If no content, include the "No posts found" template.
    else :
        get_template_part('content', 'none');

    endif;
    ?>
</div>

    <?php get_footer(); ?>

    <?php
        echo(
            '<!-- Bootstrap core JavaScript -->
            <script src="' . $templateURI . '/vendor/jquery/jquery.min.js"></script>
            <script src="' . $templateURI . '/vendor/popper/popper.min.js"></script>
            <script src="' . $templateURI . '/vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- custom scripts -->
            <script src="' . $templateURI . '/js/scripts.js"></script>'
        );
    ?>
  </body>

</html>
