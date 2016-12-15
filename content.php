<?php if ( has_post_thumbnail() ) : ?>

	<div class="featured-media">
	
		<?php if ( is_sticky() ) : ?><span class="sticky-post"><?php _e('Sticky post', 'wilson'); ?></span><?php endif; ?>
	
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		
			<?php the_post_thumbnail( 'post-image' ); ?>
			
			<?php if ( ! empty( get_post( get_post_thumbnail_id() )->post_excerpt ) ) : ?>
							
				<div class="media-caption-container">
				
					<p class="media-caption"><?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?></p>
					
				</div>
				
			<?php endif; ?>
			
		</a>
				
	</div> <!-- .featured-media -->
		
<?php endif; ?>

<div class="post-inner">

	<div class="post-header">
		
	    <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>
	    
	    <?php wilson_meta(); ?>
	    
	</div> <!-- .post-header -->
										                                    	    
	<div class="post-content">
    
		<?php the_content(); ?>
					
		<?php wp_link_pages(); ?>
					        
	</div> <!-- .post-content -->
	            
	<div class="clear"></div>

</div> <!-- .post-inner -->