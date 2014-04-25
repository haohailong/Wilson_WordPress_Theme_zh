<?php get_header(); ?>
	
<div class="content">

	<?php if ( have_posts() ) : ?>
	
		<div class="page-title">
		
			<h4>
		
				<?php _e( '搜索', 'wilson'); ?>
				<span class="name"><?php echo ' "' . get_search_query() . '"'; ?></span>
			
			</h4>
			
		</div> <!-- /page-title -->
				
		<div class="posts">
	
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											
					<?php get_template_part( 'content', get_post_format() ); ?>						
				
				</div> <!-- /post -->
				
			<?php endwhile; ?>
						
		</div> <!-- /posts -->
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		
			<div class="post-nav archive-nav">
			
				<?php echo get_next_posts_link( __('&laquo; <span>较早的内容</span>', 'wilson')); ?>
							
				<?php echo get_previous_posts_link( __('<span>较新的内容</span> &raquo;', 'wilson')); ?>
				
				<div class="clear"></div>
				
			</div>
			
		<?php endif; ?>
	
	<?php else : ?>
	
		<div class="page-title">
		
			<h4>
		
				<?php _e( '搜索', 'wilson'); ?>
				<span class="name"><?php echo ' "' . get_search_query() . '"'; ?></span>
			
			</h4>
			
		</div>
		
		<div class="posts">
					
			<div class="post">
			
				<div class="post-inner">
						
					<div class="post-content">
					
						<p><?php _e('没必要找到你要的结果，再试试吧。', 'wilson'); ?></p>
						
						<?php get_search_form(); ?>
					
					</div> <!-- /post-content -->
				
				</div> <!-- /post-inner -->
				
				<div class="clear"></div>
			
			</div> <!-- /post -->
		
		</div> <!-- /posts -->
	
	<?php endif; ?>
		
<?php get_footer(); ?>