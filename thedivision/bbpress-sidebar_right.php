<?php
/**
* The bbpress Sidebar containing the right widget areas.
*
* @package Shape
* @since Shape 1.0
*/
?>
<div id="right-side" class="eight-bar">
	<div id="right_sidebar" class="widget-area" role="complementary">
        <div id="right_sidebar_b">			
            <?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>
            <?php endif; // end sidebar widget area ?>
           	<div id="ts3">
            	<iframe src="http://cache.www.gametracker.com/components/html0/?host=85.236.105.30:10837&bgColor=333333&fontColor=CCCCCC&titleBgColor=222222&titleColor=FF9900&borderColor=555555&linkColor=FFCC00&borderLinkColor=222222&showMap=0&currentPlayersHeight=500&showCurrPlayers=1&showTopPlayers=0&showBlogs=0&width=240" frameborder="0" scrolling="no" width="240" height="600"></iframe>
            </div>
        </div>
	</div><!-- #right_sidebar .widget-area -->
</div>