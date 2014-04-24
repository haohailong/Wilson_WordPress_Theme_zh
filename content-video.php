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
			
			<?php if( is_sticky() && !has_post_thumbnail() ) { ?> 
			
				<span class="date-sep"> / </span>
			
				<?php _e('Sticky', 'wilson'); ?>
			
			<?php } ?>
			
			<?php if ( current_user_can( 'manage_options' ) ) { ?>
			
				<span class="date-sep"> / </span>
							
				<?php edit_post_link(__('Edit', 'wilson')); ?>
			
			<?php } ?>
									
		</div>
	    
	</div> <!-- /post-header -->
										                                    	    
	<div class="post-content">
		    		            			            	                                                                                            
		<?php the_content(); ?>
				
		<?php wp_link_pages(); ?>
					        
	</div> <!-- /post-content -->
	            
	<div class="clear"></div>

</div> <!-- /post-inner -->