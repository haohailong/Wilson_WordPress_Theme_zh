<?php if ( post_password_required() )
	return;
?>

	<?php if ( have_comments() ) : ?>
	
		<div class="comments">
				
			<h2 class="comments-title">
			
				<?php echo count($wp_query->comments_by_type['comment']) . ' ';
				echo _n( '条评论' , '条评论' , count($wp_query->comments_by_type['comment']), 'wilson' ); ?>
				
			</h2>
	
			<ol class="commentlist">
			    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'wilson_comment' ) ); ?>
			</ol>
			
			<?php if (!empty($comments_by_type['pings'])) : ?>
			
				<div class="pingbacks">
				
					<div class="pingbacks-inner">
				
						<h3 class="pingbacks-title">
						
							<?php echo count($wp_query->comments_by_type['pings']) . ' ';
							echo _n( 'Pingback', 'Pingbacks', count($wp_query->comments_by_type['pings']), 'wilson' ); ?>
						
						</h3>
					
						<ol class="pingbacklist">
						    <?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'wilson_comment' ) ); ?>
						</ol>
						
					</div>
					
				</div>
			
			<?php endif; ?>
				
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			
				<div class="comment-nav-below" role="navigation">
									
					<div class="post-nav-older"><?php previous_comments_link( __( '&laquo; <span> 较早的评论</span>', 'wilson' ) ); ?></div>
					
					<div class="post-nav-newer"><?php next_comments_link( __( '<span> 较新的评论</span> &raquo;', 'wilson' ) ); ?></div>
					
					<div class="clear"></div>
					
				</div> <!-- /comment-nav-below -->
				
			<?php endif; ?>
			
		</div><!-- /comments -->
		
	<?php endif; ?>
	
	<?php if ( ! comments_open() && !is_page() ) : ?>
	
		<p class="nocomments"><?php _e( '该页评论已关闭。', 'wilson' ); ?></p>
		
	<?php endif; ?>
	
	<?php $comments_args = array(
	
		'comment_notes_before' => 
			'<p class="comment-notes">' . __( '你的 Email 地址不会被公开。', 'wilson' ) . '</p>',
	
		'comment_field' => 
			'<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="6" required>' . '</textarea></p>',
		
		'fields' => apply_filters( 'comment_form_default_fields', array(
		
			'author' =>
				'<p class="comment-form-author">' .
				'<input id="author" name="author" type="text" placeholder="' . __('姓名','wilson') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />' . '<label for="author">Author</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
			
			'email' =>
				'<p class="comment-form-email">' . '<input id="email" name="email" type="text" placeholder="' . __('Email','wilson') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /><label for="email">Email</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
			
			'url' =>
			'<p class="comment-form-url">' . '<input id="url" name="url" type="text" placeholder="' . __('网址','wilson') . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">Website</label></p>')
		),
	);
	
	comment_form($comments_args);
	
	?>