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
												
								<h3><?php _e('最新的 30 篇', 'wilson') ?></h3>
								            
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
					            
					            <h3><?php _e('按分类归档', 'wilson') ?></h3>
					            
					            <ul>
					                <?php wp_list_categories( 'title_li=', 'wilson' ); ?>
					            </ul>
					            
					            <h3><?php _e('按标签归档', 'wilson') ?></h3>
					            
					            <ul>
					                <?php $tags = get_tags();
					                
					                if ($tags) {
					                    foreach ($tags as $tag) {
					                 	   echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "查看所有 %s 中的贴子", 'wilson' ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li> ';
					                    }
					                } ?>
					            </ul>
				            
				            </div> <!-- /archive-col -->
				            
				            <div class="archive-col">
				            
				            	<h3><?php _e('贡献者', 'wilson') ?></h3>
				            	
				            	<ul>
				            		<?php wp_list_authors(); ?> 
				            	</ul>
				            	
				            	<h3><?php _e('年度归档', 'wilson') ?></h3>
				            	
				            	<ul>
				            	    <?php wp_get_archives('type=yearly'); ?>
				            	</ul>
				            	
				            	<h3><?php _e('月度归档', 'wilson') ?></h3>
				            	
				            	<ul>
				            	    <?php wp_get_archives('type=monthly'); ?>
				            	</ul>
				            
					            <h3><?php _e('每日归档', 'wilson') ?></h3>
					            
					            <ul>
					                <?php wp_get_archives('type=daily'); ?>
					            </ul>
				            
				            </div> <!-- /archive-col -->
				            
				            <div class="clear"></div>
		            
			            </div> <!-- /archive-box -->
			            
			            <?php if ( current_user_can( 'manage_options' ) ) : ?>
																		
							<p><?php edit_post_link( __('编辑', 'wilson') ); ?></p>
						
						<?php endif; ?>
															            			                        
					</div> <!-- /post-content -->
											
					<div class="clear"></div>
									
				</div> <!-- /post-inner -->
	
			</div> <!-- /post -->
			
			<?php comments_template( '', true ); ?>
		
		<?php endwhile; else: ?>

			<p><?php _e("找不到满足要求的文章或页面，请重试。", "wilson"); ?></p>
	
		<?php endif; ?>
	
	</div> <!-- /posts -->
	
<?php get_footer(); ?>