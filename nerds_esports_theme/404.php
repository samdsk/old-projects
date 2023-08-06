<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Nerds-Esport
 */

get_header(); ?>
<div id="content" class="site-content block-set">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found ">
				<header class="page-header">
					<h1 class="h1 page-title entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'nerds' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
                	<div id="notFound404" class="">
					<h2 class="h2"><?php _e( 'Mayday! Mayday! <br/> <p class="h4">We are under attack this page should be sloten by the enemy, Report to the Battlefield. Hooah!</p>', 'shape' ); ?></h2>
 					<img id="img_e"  class="img_er" src="<?php echo get_template_directory_uri();?>/img/404_img.jpg" alt="404_img" />
					</div>
                    
                    <div id="stuffs" >
                    	<div id="columns_1" class="columns">
                        	<?php get_search_form(); ?>
    
                        	<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                        </div>

    					<div class="columns">
                            <?php if ( nerds_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                            <div class="widget widget_categories">
                                <h2 class="widget-title"><?php _e( 'Most Used Categories', 'nerds' ); ?></h2>
                                <ul>
                                <?php
                                    wp_list_categories( array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    ) );
                                ?>
                                </ul>
                            </div><!-- .widget -->
                            <?php endif; ?>
                        </div>

    					<div class="columns">
                       		<?php
								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'nerds' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
							?>
                        </div>
    					<div id="columns_5" class="columns">
							<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
                        </div>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
