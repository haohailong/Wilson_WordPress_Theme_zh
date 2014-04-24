<?php
/*
Template Name: Archive template
*/
?>

<?php get_header(); ?>

<div class="content">
		
	<div class="posts">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="post">
			
				<div class="post-inner">
														
					<div class="post-header">
												
					    <h2 class="post-title"><?php the_title(); ?></h2>
					    				    
				    </div> <!-- /post-header -->
				   				        			        		                
					<div class="post-content">
								                                        
						<?php the_content(); ?>
						
						<div class="archive-box">
					
							<div class="archive-col">
												
								<h3><?php _e('Last 30 Posts', 'wilson') ?></h3>
								            
					            <ul>
						            <?php $archive_30 = get_posts('numberposts=30');
						            foreach($archive_30 as $post) : ?>
						                <li>
						                	<a href="<?php the_permalink(); ?>">
						                		<?php the_title();?> 
						                		<span>(<?php the_time(get_option('date_format')); ?>)</span>
						                	</a>
						                </li>
						            <?php endforeach; ?>
					            </ul>
					            
					            <h3><?php _e('Archives by Categories', 'wilson') ?></h3>
					            
					            <ul>
					                <?php wp_list_categories( 'title_li=', 'wilson' ); ?>
					            </ul>
					            
					            <h3><?php _e('Archives by Tags', 'wilson') ?></h3>
					            
					            <ul>
					                <?php $tags = get_tags();
					                
					                if ($tags) {
					                    foreach ($tags as $tag) {
					                 	   echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'wilson' ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li> ';
					                    }
					                } ?>
					            </ul>
				            
				            </div> <!-- /archive-col -->
				            
				            <div class="archive-col">
				            
				            	<h3><?php _e('Contributors', 'wilson') ?></h3>
				            	
				            	<ul>
				            		<?php wp_list_authors(); ?> 
				            	</ul>
				            	
				            	<h3><?php _e('Archives by Year', 'wilson') ?></h3>
				            	
				            	<ul>
				            	    <?php wp_get_archives('type=yearly'); ?>
				            	</ul>
				            	
				            	<h3><?php _e('Archives by Month', 'wilson') ?></h3>
				            	
				            	<ul>
				            	    <?php wp_get_archives('type=monthly'); ?>
				            	</ul>
				            
					            <h3><?php _e('Archives by Day', 'wilson') ?></h3>
					            
					            <ul>
					                <?php wp_get_archives('type=daily'); ?>
					            </ul>
				            
				            </div> <!-- /archive-col -->
				            
				            <div class="clear"></div>
		            
			            </div> <!-- /archive-box -->
			            
			            <?php if ( current_user_can( 'manage_options' ) ) : ?>
																		
							<p><?php edit_post_link( __('Edit', 'wilson') ); ?></p>
						
						<?php endif; ?>
															            			                        
					</div> <!-- /post-content -->
											
					<div class="clear"></div>
									
				</div> <!-- /post-inner -->
	
			</div> <!-- /post -->
			
			<?php comments_template( '', true ); ?>
		
		<?php endwhile; else: ?>

			<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "wilson"); ?></p>
	
		<?php endif; ?>
	
	</div> <!-- /posts -->
	
<?php get_footer(); ?>