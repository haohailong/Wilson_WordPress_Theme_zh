<?php
/*
Template Name: Archive template
*/
?>

<?php get_header(); ?>

<div class="content">

	<div class="posts">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="post">

				<div class="post-inner">

					<div class="post-header">

					    <h1 class="post-title"><?php the_title(); ?></h1>

				    </div> <!-- .post-header -->

					<div class="post-content">

						<?php the_content(); ?>

						<div class="archive-box">

                            <h3><?php _e( '最新的 30 篇文章', 'wilson' ); ?></h3>

                            <ul>
                                <?php

                                $posts = get_posts( 'numberposts=30' );

                                foreach( $posts as $post ) { ?>

                                    <li>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_title();?>
                                            <span>(<?php the_time( get_option( 'date_format' ) ); ?>)</span>
                                        </a>
                                    </li>

                                <?php } ?>

                            </ul>

                            <h3><?php _e( '按分类检索', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_list_categories( 'title_li=' ); ?>
                            </ul>

                            <h3><?php _e( '按标签检索', 'wilson' ); ?></h3>

                            <ul>

                                <?php $tags = get_tags();

                                if ( $tags ) {
                                    foreach ( $tags as $tag ) {
                                       echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( '查看所有 %s 中的贴子', 'wilson' ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li>';
                                    }
                                }

                                wp_reset_query(); ?>

                            </ul>

                            <h3><?php _e( '作者', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_list_authors(); ?>
                            </ul>

                            <h3><?php _e( '按年份检索', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_get_archives( 'type=yearly' ); ?>
                            </ul>

                            <h3><?php _e( '按月检索', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_get_archives( 'type=monthly' ); ?>
                            </ul>

                            <h3><?php _e( '每日存档', 'wilson' ) ?></h3>

                            <ul>
                                <?php wp_get_archives( 'type=daily' ); ?>
                            </ul>

			            </div> <!-- .archive-box -->

			            <?php if ( current_user_can( 'manage_options' ) ) : ?>

							<p><?php edit_post_link( __( '编辑', 'wilson' ) ); ?></p>

						<?php endif; ?>

					</div> <!-- .post-content -->

					<div class="clear"></div>

				</div> <!-- .post-inner -->

			</div> <!-- .post -->

			<?php if ( comments_open() ) : ?>

				<?php comments_template( '', true ); ?>

			<?php endif; ?>

		<?php endwhile; else: ?>

			<p><?php _e( "找不到满足要求的文章或页面，请重试。", "wilson" ); ?></p>

		<?php endif; ?>

	</div> <!-- .posts -->

<?php get_footer(); ?>
