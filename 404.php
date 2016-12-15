<?php get_header(); ?>

<div class="content">

	<div class="posts">

		<div class="post">

			<div class="post-inner">

				<div class="post-header">

		        	<h1 class="post-title"><?php _e( 'Error 404', 'wilson' ); ?></h1>

		        </div> <!-- .post-header -->

		        <div class="post-content">

		            <p><?php _e( "你试图打开的页面似乎不存在，你仍然可以利用下面的搜索框继续查找：", "wilson" ); ?></p>

		            <?php get_search_form(); ?>

		        </div> <!-- .post-content -->

			</div> <!-- .post-inner -->

		</div> <!-- .post -->

	</div> <!-- .posts -->

<?php get_footer(); ?>
