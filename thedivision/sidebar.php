<?php
/**
* The Sidebar containing the main widget areas.
*
* @package Shape
* @since Shape 1.0
*/
?>
<div id="secondary" class="widget-area" role="complementary">
	<div id="secondary_b">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
    
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
</div><!-- #secondary .widget-area -->
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 
     <div id="tertiary" class="widget-area" role="supplementary">
      <?php dynamic_sidebar( 'sidebar-2' ); ?>
     </div><!-- #tertiary .widget-area -->
 
<?php endif; ?>