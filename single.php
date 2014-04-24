<?php get_header(); ?>

<div class="content">
											        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="posts">
	
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php if ( has_post_thumbnail() ) : ?>
				
						<div class="featured-media">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							
								<?php the_post_thumbnail('post-image'); ?>
								
								<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
										
									</div>
									
								<?php endif; ?>
								
							</a>
									
						</div> <!-- /featured-media -->
							
					<?php endif; ?>
					
					<?php $videourl = get_post_meta($post->ID, 'videourl', true); if ( $videourl != '' ) : ?>

						<div class="featured-media">
						
							<?php if (strpos($videourl,'.mp4') !== false) : ?>
				
								<video controls>
								  <source src="<?php echo $videourl; ?>" type="video/mp4">
								</video>
																						
							<?php else : ?>
								
								<?php 
								
									$embed_code = wp_oembed_get($videourl); 
									
									echo $embed_code;
									
								?>
									
							<?php endif; ?>
							
						</div>
					
					<?php endif; ?>
			
				<div class="post-inner">

				<div class="post-header">
					
				    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				    
				    <div class="post-meta">
					
						<span class="post-date"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_time(get_option('date_format')); ?></a></span>
						
						<span class="date-sep"> / </span>
							
						<span class="post-author"><?php the_author_posts_link(); ?></span>
						
						<span class="date-sep"> / </span>
						
						<?php comments_popup_link( '<span class="comment">' . __( '0 Comments', 'wilson' ) . '</span>', __( '1 Comment', 'wilson' ), __( '% Comments', 'wilson' ) ); ?>
						
						<?php if ( current_user_can( 'manage_options' ) ) { ?>
						
							<span class="date-sep"> / </span>
										
							<?php edit_post_link(__('Edit', 'wilson')); ?>
						
						<?php } ?>
												
					</div> <!-- /post-meta -->
				    
				</div> <!-- /post-header -->
													                                    	    
				<div class="post-content">
					    		            			            	                                                                                            
					<?php the_content(); ?>
							
					<?php wp_link_pages(); ?>
								        
				</div> <!-- /post-content -->
				            
				<div class="clear"></div>
				
			</div> <!-- /post-inner -->
			
		</div> <!-- /post -->
		
	</div> <!-- /posts -->
								
	<div class="post-meta-bottom">
	
		<div class="post-cat-tags">
														
			<p class="post-categories"><span><?php _e('Categories:', 'wilson') ?></span> <?php the_category(', '); ?></p>
			
			<?php if( has_tag()) { ?><p class="post-tags"><span><?php _e('Tags:', 'wilson') ?></span> <?php the_tags('', ', '); ?></p><?php } ?>
		
		</div> <!-- /post-cat-tags -->
										
		<div class="archive-nav post-nav">
									
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			
				<a class="post-nav-older" title="<?php _e('Previous post:', 'wilson'); echo ' ' . get_the_title($prev_post); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
				
				&laquo; <?php echo get_the_title($prev_post); ?>
				
				</a>
		
			<?php endif; ?>
			
			<?php
			$next_post = get_next_post();
			if (!empty( $next_post )): ?>
				
				<a class="post-nav-newer" title="<?php _e('Next post:', 'wilson'); echo ' ' . get_the_title($next_post); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
				
				<?php echo get_the_title($next_post); ?> &raquo;
				
				</a>
		
			<?php endif; ?>
										
			<div class="clear"></div>
		
		</div> <!-- /post-nav -->
							
	</div> <!-- /post-meta-bottom -->
	
	<?php comments_template( '', true ); ?> 
				
	<?php endwhile; else: ?>

		<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "wilson"); ?></p>
	
	<?php endif; ?>   

<?php get_footer(); ?>