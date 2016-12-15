<div class="post-inner">

	<div class="post-header">
		
	    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	    
	    <?php wilson_meta(); ?>
	    
	</div> <!-- .post-header -->
										                                    	    
	<div class="post-content">

		<?php the_content(); ?>
				
		<?php wp_link_pages(); ?>
					        
	</div> <!-- .post-content -->
	            
	<div class="clear"></div>

</div> <!-- .post-inner -->