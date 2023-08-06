<?php
/*
Template Name: Matches
*/
?>

<?php get_header(); ?>
<div id="content" class="site-content">
	<div id="primary base" class="content-area news">
    	<!--<div id="top" class="top_img"></div>-->
		<main id="main" class="site-main base" role="main">
			<div id="lastest-events" class="">
            <header class="entry-header">
				<h1 class="entry-title h1">Matches Archive</h1>	
            </header>             	
            <table class="matches back-op3">
            <tbody>
                <tr class="t-head">
                    <th>Team</th>
                    <th>Opponent</th>
                    <th>Game</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>League</th>
                    <th>Result</th>
                </tr>
                
                    
                        <?php 
                            $args = array(
                                'post_type' => 'event',
                                'category_name' => 'matches'
                                
                            );
                            
                            $query = new WP_Query( $args );
                            
                            while ($query -> have_posts()):$query -> the_post(); ?>
                            <tr>
                            <td>Squad-Competitive</td>
                            <td>            
                            <?php 
                                $teama = (types_render_field("team-nerds", array("row" => true))); 
                                //echo $teama;
                                $teamb = types_render_field("team-b", array("row" => true));
                                
                                if(!$teamb == null){
                                    echo " Vs. ".$teamb;
                                }
                            ?>                                                                  
                            </td>
                            
                            <td>
                            <?php 
                                $img_text = types_render_field("game-where-played", array("row" => true)); 
                                $path_img = get_template_directory_uri();
                                switch($img_text){
                                    case ($img_text == "Battlefield 4") :
                                        echo ('<img id="" class="ordered"  alt=""  src="'.$path_img.'/img/bf4.png"/>');
                                        break;
                                    case ($img_text == "Arma 3") :
                                        echo ('<img id="" class="ordered"  alt=""  src="'.$path_img.'/img/arma.png"/>');
                                        break;
                                    case ($img_text == "CS GO") :
                                        echo ('<img id="" class="ordered"  alt=""  src="'.$path_img.'/img/cs_go.png"/>');
                                        break;
                                    case ($img_text == "Fifa 15") :
                                        echo ('<img id="" class="ordered"  alt=""  src="'.$path_img.'/img/fifa15.png"/>');
                                        break;
                                    case ($img_text == "League of Legends") :
                                        echo ('<img id="" class="ordered"  alt=""  src="'.$path_img.'/img/lol.png"/>');
                                        break;
                                    case ($img_text == "Call of Duty - AW") :
                                        echo ('<img id="" class="ordered"  alt=""  src="'.$path_img.'/img/cod_aw.png"/>');
                                        break;
                                }
                                
                            ?>
                            </td>
                            <td><?php echo (types_render_field("type-of-match", array("row" => true))); ?></td>
                            <td><?php echo (types_render_field("start-time", array("style" => "text", "format" => "d/m/Y"))); ?></td>
                            <td>PCW</td>
                            <td>
                            <?php 
                                $scorea = types_render_field("score-a", array("row" => true));
                                 
                                $scoreb = types_render_field("score-b", array("row" => true));											
                                
                                if($scorea > $scoreb){
                                    echo '<span class="team-a-s green"> </span> ';
                                    
                                }elseif($scorea < $scoreb){
                                    echo '<span class="team-a-s red"> </span> ';
                                }elseif($scorea == $scoreb){
                                    //echo '<span class="red">|</span> ';
                                }else{
                                    echo "";
                                }
                                
                                if(($scoreb == 0)&&($scorea == 0)){
                                    echo "";
                                }elseif	($scoreb == 0){
                                    echo '<span class="team-a-s"> '.$scorea.':'.$scoreb.'</span> ';
                                }else{
                                    echo '<span class="team-a-s"> '.$scorea.':'.$scoreb.'</span> ';
                                }
                            ?>
                            </td>
                            
                            </tr>
                                                       
                        <?php endwhile; ?>
                     
                                            
            </tbody>
            </table>
            <?php wp_reset_query(); ?>
         	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
