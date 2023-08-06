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
			<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
            <?php endif; // end sidebar widget area ?>
        </div> 
	</div>
</div>
