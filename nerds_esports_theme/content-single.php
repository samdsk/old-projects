<?php
/**
 * @package Nerds-Esport
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title h1">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php nerds_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nerds' ),
				'after'  => '</div>',
			) );
		?>
        
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php nerds_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
