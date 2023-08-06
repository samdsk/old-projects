<?php get_header(); ?>

    <div id="mainContaintBlog">

     
    <?php if ( have_posts() ) : ?>
    
    
		<?php while ( have_posts() ) : the_post() ?>        
			<?php get_template_part('content') ?>            
		<?php endwhile; ?>
    
   	<?php endif; ?>
    <?php /* Bottom post navigation */
		global $wp_query; 
		$total_pages = $wp_query->max_num_pages; 
		if ( $total_pages > 1 ) { 
	?>
        <div id="nav_below" class="navigation">
            <div id="nav" class="nav_previous"><?php next_posts_link('<span id="next_page" class="icon-chevron-left"></span><p>Previous Post</p>') ?></div>
            <div id="nav" class="nav_next"><?php previous_posts_link('<p>Newer Posts</p><span id="next_page" class="icon-chevron-right"></span>') ?></div>
        </div><!-- #nav-below -->
    <?php } ?>

 
    </div>

<?PHP get_footer(); ?> 