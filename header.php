<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>
	
		<div class="wrapper">
	
			<div class="sidebar">
							
				<div class="blog-header">
				
					<?php if ( get_theme_mod( 'wilson_logo' ) ) : ?>
					
						<a class="blog-logo" href='<?php echo home_url(); ?>' title='<?php bloginfo( 'name' ); ?> &mdash; <?php bloginfo( 'description' ); ?>' rel='home'>
				        	<img src="<?php echo esc_url( get_theme_mod( 'wilson_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				        </a>
					
					<?php else : ?>
				
						<h1 class="blog-title">
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?> &mdash; <?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						
						<h3 class="blog-description"><?php bloginfo( 'description' ); ?></h3>
					
					<?php endif; ?>

				</div> <!-- .blog-header -->
				
				<div class="nav-toggle toggle">
				
					<p>
						<span class="show"><?php _e( 'Show menu', 'wilson' ); ?></span>
						<span class="hide"><?php _e( 'Hide menu', 'wilson' ); ?></span>
					</p>
				
					<div class="bars">
							
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						
						<div class="clear"></div>
						
					</div> <!-- .bars -->
				
				</div> <!-- .nav-toggle -->
				
				<div class="blog-menu">
			
					<ul class="navigation">
					
						<?php if ( has_nav_menu( 'primary' ) ) {
																			
							wp_nav_menu( array( 
								'container'      => '', 
								'items_wrap'     => '%3$s',
								'theme_location' => 'primary', 
								'walker'         => new wilson_nav_walker					
							) ); 
                            
                        } else {
						
							wp_list_pages( array(
								'container' => '',
								'title_li'  => ''
							) );
							
						} ?>
												
					 </ul> <!-- .navigation -->
					 
					 <div class="clear"></div>
					 
				</div> <!-- .blog-menu -->
				
				<div class="mobile-menu">
						 
					 <ul class="navigation">
					
						<?php if ( has_nav_menu( 'primary' ) ) {
																			
                            wp_nav_menu( array( 
                                'container'      => '', 
                                'items_wrap'     => '%3$s',
                                'theme_location' => 'primary', 
                                'walker'         => new wilson_nav_walker
                            ) ); 

                        } else {

                            wp_list_pages( array(
                                'container' => '',
                                'title_li'  => ''
                            ) );
							
						} ?>
						
					 </ul>
					 
				</div> <!-- .mobile-menu -->
				
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

					<div class="widgets" role="complementary">
					
						<?php dynamic_sidebar( 'sidebar' ); ?>
						
					</div><!-- .widgets -->
					
				<?php endif; ?>
									
			</div> <!-- .sidebar -->