<?php get_header(); ?>

    <div id="mainContaintBlog">
 
    <?php if ( have_posts() ) : ?>    
		<?php while ( have_posts() ) : the_post() ?>        
			<?php get_template_part('content_single') ?>            
		<?php endwhile; ?>
   	<?php endif; ?>

    </div>

<?PHP get_footer(); ?>