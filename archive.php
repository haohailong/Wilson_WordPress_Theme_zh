<?php get_header(); ?>
	
	<div class="content">
	
		<div class="page-title">
	
			<h4>
			
				<?php if ( is_day() ) : ?>
					<?php _e('Date', 'wilson'); ?><span class="name"><?php echo get_the_date(); ?></span>
				<?php elseif ( is_month() ) : ?>
					<?php _e('Month', 'wilson'); ?><span class="name"><?php echo get_the_date('F Y'); ?></span>
				<?php elseif ( is_year() ) : ?>
					<?php _e('Year', 'wilson'); ?><span class="name"><?php echo get_the_date('Y'); ?></span>
				<?php elseif ( is_category() ) : ?>
					<?php _e('Category', 'wilson'); ?><span class="name"><?php echo single_cat_title( '', false ); ?></span>
				<?php elseif ( is_tag() ) : ?>
					<?php _e('Tag', 'wilson'); ?><span class="name"><?php echo single_tag_title( '', false ); ?></span>
				<?php elseif ( is_author() ) : ?>
					<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
					<?php _e('Author', 'wilson'); ?><span class="name"><?php echo ($curauth->display_name); ?></span>
				<?php else : ?>
					<?php _e( 'Archive', 'wilson' ); ?>
				<?php endif; ?>
			
			</h4>
						
			<?php
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'tag_archive_meta', $tag_description );
			?>
			
		</div> <!-- /page-title -->
			
		<div class="posts">
	
			<?php if ( have_posts() ) : ?>
		
				<?php rewind_posts(); ?>
			
				<?php while ( have_posts() ) : the_post(); ?>
				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
						<?php get_template_part( 'content', get_post_format() ); ?>
						
					</div> <!-- /post -->
					
				<?php endwhile; ?>
							
		</div> <!-- /posts -->
					
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		
			<div class="archive-nav">
			
				<?php echo get_next_posts_link( __('Older<span> posts</span>', 'wilson')); ?>
							
				<?php echo get_previous_posts_link( __('Newer<span> posts</span>', 'wilson')); ?>
				
				<div class="clear"></div>
				
			</div> <!-- /post-nav archive-nav -->
						
		<?php endif; ?>
				
	<?php endif; ?>

	<?php get_footer(); ?>