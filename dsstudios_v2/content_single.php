<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                   
        
        <a id="post_link" style="text-decoration:none !important;" href="<?php the_permalink() ?>">
        <h1><strong><?php the_title(); ?></strong></h1>
        </a>      

		<?php get_template_part('content_time') ?>
       	
        <div id="content_e" class="content_entry">
            <?php the_content(); ?>
            <?php if(function_exists('social_ring_show')){ social_ring_show();} ?>
        </div>
        
        <?php get_template_part('content_meta_data') ?>
        <!--
        <div id="nav_below_s" class="navigation">
            <div id="nav" class="nav_previous"><?php //next_post_link('<span id="next_page" class="icon-chevron-left"></span><p>%link</p>') ?></div>
            <div id="nav" class="nav_next"><?php //previous_post_link('<p>%link</p><span id="previous_page" class="icon-chevron-right"></span>') ?></div>
        </div>
        -->
</article>				
<!-- #post-<?php the_ID(); ?> -->
