<?php
/**
* The bbpress Sidebar containing the left widget areas.
*
* @package Shape
* @since Shape 1.0
*/
?>
<div id="left-side" class="left-bar">
    <div id="left_sidebar" class="widget-area" role="complementary">
        <div id="left_sidebar_b">
        <?php do_action( 'before_sidebar' ); ?>
        <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
        
            <aside id="meta" class="widget">
                <h1 class="widget-title"><?php _e( 'Meta', 'shape' ); ?></h1>
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </aside>
     
            <aside id="search" class="widget widget_search">
                <?php get_search_form(); ?>
            </aside>
     
            <aside id="archives" class="widget">
                <h1 class="widget-title"><?php _e( 'Archives', 'shape' ); ?></h1>
                <ul>
                    <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                </ul>
            </aside>
        <?php endif; // end sidebar widget area ?>
        </div>    
	</div>
</div>
