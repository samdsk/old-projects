<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Shape
 * @since Shape 1.0
 */
 
get_header(); ?>
<div id="main-forum" class="site-main">
	<?php get_template_part( 'bbpress', 'sidebar_left' ); ?>
        <div id="primary-forum" class="content-area">
            <div id="content" class="site-content" role="main">
 
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'page' ); ?>
 
                    <?php comments_template( '', true ); ?>
 
                <?php endwhile; // end of the loop. ?>
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
    <?php get_template_part( 'bbpress', 'sidebar_right' ); ?>
    </div>
<?php get_footer(); ?>