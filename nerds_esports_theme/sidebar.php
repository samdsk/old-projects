<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Nerds-Esport
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area news-sidebar" role="complementary">
	<div id="column-1" class="sidebar-img">
		<img class="logo-news" src="<?php echo get_template_directory_uri(); ?>/img/logo_main.png" />                	
    </div>
    <aside id="column-1" class="sidebar widget server_block_widget">
	<div id="column-1" class="sidebar_blocks server_block">
		<h4 class="h4">Servers' status:</h4>  
        <ul>
        	<li class="online">
                <a class="" href="http://nerds-esport.com/n/servers/" target="_blank">
                	<img class="logo-server" src="<?php echo get_template_directory_uri(); ?>/img/ts3.png" />                    
                </a>
            </li>
            <li class="online">
                <a class="" href="http://nerds-esport.com/n/servers/" target="_blank">
					<img class="logo-server" src="<?php echo get_template_directory_uri(); ?>/img/bf4.png" />
                </a>
            </li>
            <li class="online">
                <a class="" href="http://nerds-esport.com/n/servers/" target="_blank">
                	<img class="logo-server" src="<?php echo get_template_directory_uri(); ?>/img/ark.png" />
                </a>
            </li>
        </ul>              	
    </div>   
    </aside>
    <aside id="column-1" class="sidebar widget">
        <div id="ts3viewer_1057383" class="block-set sidebar_blocks tsblock" style="width:auto;">
            <h4 class="h4">Nerds Teamspeak</h4>
        </div>

		<script type="text/javascript" src="http://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
        
        <script type="text/javascript">
        <!--
        var ts3v_url_1 = "http://www.tsviewer.com/ts3viewer.php?ID=1057383&text=00ff00&text_size=12&text_family=1&js=1&text_s_weight=bold&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_s_color_h=fff&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=underline&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_i_color_h=fff&text_i_weight_h=normal&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=underline&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_c_color_h=fff&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=underline&text_u_weight=bold&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_u_color_h=fff&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none";
        ts3v_display.init(ts3v_url_1, 1057383, 100);
        -->
        </script>

    </aside>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    
</div><!-- #secondary -->
