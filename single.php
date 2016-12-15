<?php get_header(); ?>

<div class="content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="posts">

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( has_post_thumbnail() ) : ?>

					<div class="featured-media">

						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">

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

                        <h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                        <?php wilson_meta(); ?>

                    </div> <!-- .post-header -->

                    <div class="post-content">

                        <?php the_content(); ?>

                        <?php wp_link_pages(); ?>

                    </div> <!-- .post-content -->

                    <div class="clear"></div>

                </div> <!-- .post-inner -->

            </div> <!-- .post -->

        </div> <!-- .posts -->

        <div class="post-meta-bottom">

            <div class="post-cat-tags">

                <p class="post-categories"><span><?php _e( '分类：', 'wilson' ); ?></span> <?php the_category( ', ' ); ?></p>

                <?php the_tags( '<p class="post-tags">' . __( '标签：', 'wilson' ) . ' ', ', ', '</p>'); ?>

            </div> <!-- .post-cat-tags -->

            <div class="archive-nav post-nav">

                <?php
                $prev_post = get_previous_post();
                if ( ! empty( $prev_post ) ): ?>

                    <a class="post-nav-older" title="<?php _e( '前一篇：', 'wilson' ); echo ' ' . get_the_title( $prev_post ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                        <?php echo '&laquo; ' . get_the_title( $prev_post ); ?>
                    </a>

                <?php endif; ?>

                <?php
                $next_post = get_next_post();
                if ( ! empty( $next_post ) ): ?>

                    <a class="post-nav-newer" title="<?php _e('后一篇：', 'wilson'); echo ' ' . get_the_title( $next_post ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
                        <?php echo get_the_title( $next_post ) . ' &raquo;'; ?>
                    </a>

                <?php endif; ?>

                <div class="clear"></div>

            </div> <!-- .post-nav -->

        </div> <!-- .post-meta-bottom -->

	   <?php comments_template( '', true ); ?>

	<?php endwhile; else: ?>

		<p><?php _e( "找不到满足要求的文章或页面，请重试。", "wilson" ); ?></p>

	<?php endif; ?>

<?php get_footer(); ?>
