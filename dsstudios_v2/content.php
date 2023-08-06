<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                   
        <a id="post_link" style="text-decoration:none !important;" href="<?php the_permalink() ?>">
            <h1><strong><?php the_title(); ?></strong></h1>
        </a>

		<?php get_template_part('content_time') ?>

        <div id="content_e" class="content_entry">
            <?php the_excerpt(); ?>
        </div>
		
        <?php get_template_part('content_meta_data') ?>
        
</article><!-- #post-<?php the_ID(); ?> -->
   
 <!-- .entry-content -->