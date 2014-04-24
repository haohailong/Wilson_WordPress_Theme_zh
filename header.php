<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
																		
		<title><?php wp_title('|', true, 'right'); ?></title>
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>
	
		<div class="wrapper">
	
			<div class="sidebar">
							
				<div class="blog-header">
				
					<h1 class="blog-title">
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
					</h1>
					
					<h3 class="blog-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h3>
					
					<div class="nav-toggle toggle">
							
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						
						<div class="clear"></div>
					
					</div>

				</div> <!-- /blog-header -->
				
				<div class="blog-menu">
			
					<ul class="navigation">
					
						<?php if ( has_nav_menu( 'primary' ) ) {
																			
							wp_nav_menu( array( 
							
								'container' => '', 
								'items_wrap' => '%3$s',
								'theme_location' => 'primary', 
								'walker' => new wilson_nav_walker
															
							) ); } else {
						
							wp_list_pages( array(
							
								'container' => '',
								'title_li' => ''
							
							));
							
						} ?>
												
					 </ul>
					 
					 <div class="clear"></div>
					 
				</div> <!-- /blog-menu -->
				
				<div class="mobile-menu">
						 
					 <ul class="navigation">
					
						<?php if ( has_nav_menu( 'primary' ) ) {
																			
							wp_nav_menu( array( 
							
								'container' => '', 
								'items_wrap' => '%3$s',
								'theme_location' => 'primary', 
								'walker' => new wilson_nav_walker
															
							) ); } else {
						
							wp_list_pages( array(
							
								'container' => '',
								'title_li' => ''
							
							));
							
						} ?>
						
					 </ul>
					 
				</div> <!-- /mobile-menu -->
				
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

					<div class="widgets" role="complementary">
					
						<?php dynamic_sidebar( 'sidebar' ); ?>
						
					</div><!-- /widgets -->
					
				<?php else : ?>
		
					<div class="widgets" role="complementary">
					
						<div id="search" class="widget widget_search">
						
							<div class="widget-content">
							
				                <?php get_search_form(); ?>
				                
							</div>
							
		                </div> <!-- /widget_search -->
		                
		                <div class="widget widget_recent_entries">
		                
			                <div class="widget-content">
			                
				                <h3 class="widget-title"><?php _e("最新文章", "wilson") ?></h3>
				                
				                <ul>
									<?php
										$args = array( 'numberposts' => '5' );
										$recent_posts = wp_get_recent_posts( $args );
										foreach( $recent_posts as $recent ){
											echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
										}
									?>
								</ul>
								
							</div>
							
							<div class="clear"></div>
							
						</div> <!-- /widget_recent_entries -->
						
						<div class="widget widget_text">
		                
			                <div class="widget-content">
			                
			                	<h3 class="widget-title"><?php _e("文本小工具", "wilson") ?></h3>
			                
			                	<div class="textwidget">
			                	
			                		<p><?php _e("因为你没有添加任何小工具，因此默认显示这些小工具。你可以在 Wordpress 仪表盘 外观 > 小工具 添加小工具。", "wilson") ?></p>
								
								</div>	
								
							</div>
							
							<div class="clear"></div>
							
						</div> <!-- /widget_recent_entries -->
												
					</div> <!-- /widgets -->
					
				<?php endif; ?>
			
		
									
			</div> <!-- /sidebar -->