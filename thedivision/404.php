<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Shape
 * @since Shape 1.0
 */
 
get_header(); ?>
<div id="main" class="site-main"> 
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
 
            <article id="post-0" class="post error404 not-found">
                <header class="entry-header">
                    <h1 class="entry-title h1"><?php _e( '404 Error', 'shape' ); ?></h1>
                </header><!-- .entry-header -->
 
                <div class="entry-content">
                    <h2><?php _e( 'Mayday! Mayday! <br/> <p class="h4">We are under attack this page should be sloten by the enemy, Report to the Battlefield. Hooah!</p>', 'shape' ); ?></h2>
 					<img id="img_e"  class="img_er" src="<?php echo get_template_directory_uri();?>/img/404_img.jpg" alt="404_img" />
                    <?php get_search_form(); ?>
 
                    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
 
                    <div class="widget">
                        <h2 class="widgettitle"><?php _e( 'Most Used Categories', 'shape' ); ?></h2>
                        <ul>
                        <?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
                        </ul>
                    </div><!-- .widget -->
 
                    <?php
                    /* translators: %1$s: smilie */
                    $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'shape' ), convert_smilies( ':)' ) ) . '</p>';
                    the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                    ?>
 
                    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
 
                </div><!-- .entry-content -->
            </article><!-- #post-0 .post .error404 .not-found -->
 
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
</div><!-- #main .site-main -->
<?php get_footer(); ?>