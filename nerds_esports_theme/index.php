<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nerds-Esport
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area news">    	
		<main id="main" class="site-main" role="main">
        <article>
        	<h2 class="h2">Notizie</h2>
        	<p>Qui potete trovare notizie sul mondo dei videogiochi e tecnologia in generale, sono stati presi da vari siti quindi cliccate sul link vicino "from" che trovate sotto ogni articolo per andare al post completo.</p>
        </article>

		<?php 	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$the_query = new WP_Query( array( 'posts_per_page' => 10,'post__not_in' => get_option( 'sticky_posts' ), 'paged' => $paged ) );
				if ( $the_query->have_posts() ) : 
		?>

			<?php /* Start the Loop */ ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php nerds_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


