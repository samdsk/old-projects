<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>
<div id="content" class="site-content">
	<div id="primary base" class="content-area news">
    	<!--<div id="top" class="top_img"></div>-->
		<main id="main" class="site-main base" role="main">
        	<div id="lastest-events">
            	
                <h2 class="h2 bold"><a class="" href="">EVENTS</a></h2>
                <?php
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'event',
                        'posts_per_page'=> 6,
                        'paged' => $paged
                    
                    );
                    
                    $query = new WP_Query($args);
                    
                    while ($query -> have_posts()):$query -> the_post();							
                    
                ?>
                <?php 
                ?>
                    <div class="events">                                
                        <h3 class="h3 event-title"><a href="<?php the_permalink() ?>">
                            <?php 
                                $teama = (types_render_field("team-nerds", array("row" => true))); 
                                echo $teama;
                                $teamb = types_render_field("team-b", array("row" => true));
                                
                                if(!$teamb == null){
                                    echo " Vs. ".$teamb;
                                }
                            ?></a>
                        </h3>
                        <h5 class="h5 gamep"><span class="">
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
										
									?></span>  
                        Type: <span class="typem"><?php echo (types_render_field("type-of-match", array("row" => true))); ?></span></h5>
                        <h2 class="h2 scores">
                            <?php 
                                $scorea = types_render_field("score-a", array("row" => true));
                                 
                                $scoreb = types_render_field("score-b", array("row" => true));											
                                
								if($scorea > $scoreb){
									echo '<span class="green">|</span> ';
									
								}elseif($scorea < $scoreb){
									echo '<span class="red">|</span> ';
								}elseif($scorea == $scoreb){
									//echo '<span class="red">|</span> ';
								}else{
									echo "";
								}
								
                                if(($scoreb == 0)&&($scorea == 0)){
                                    echo "";
                                }elseif	($scoreb == 0){
                                    echo '<span class="team-a-s">'.$teama.' - '.$scorea."</span> : ".'<span class="team-b-s">'.$teamb.' - '.$scoreb.'</span> ';
                                }else{
                                    echo '<span class="team-a-s">'.$teama.' - '.$scorea."</span> : ".'<span class="team-b-s">'.$teamb.' - '.$scoreb.'</span> ';
                                }
                            ?>
                        </h2>
                        <h4 class="h4"><?php echo (types_render_field("start-time", array("style" => "text", "format" => "F j, Y"))); ?></h4>
                        
                            <?php
                                $stime = types_render_field("start-time", array("style" => "text", "format" => "H:i"));									
                                $etime = types_render_field("end-time", array("style" => "text", "format" => "H:i")); 
                                
                                echo '<p class="s-time">Starts at: '.$stime.'  </p>';
                                echo '<p class="e-time"> Ends at: '.$etime.' </p>';
                            ?>
                        
                        <p class=""><?php echo (types_render_field("details", array("row" => true))); ?></p>
                        
                    </div>
                <?php endwhile; ?>

            </div>
			<?php if ($query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
              <nav class="navigation paging-navigation">
                <div class="nav-links">
                    <div class="nav-previous">
                      <?php echo get_next_posts_link( 'Older Events', $query->max_num_pages ); // display older posts link ?>
                    </div>
                    <div class="nav-next">
                      <?php echo get_previous_posts_link( 'Newer Events' ); // display newer posts link ?>
                    </div>
                </div>
              </nav>
           <?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
