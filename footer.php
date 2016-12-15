		<div class="footer section large-padding bg-dark">

			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>

				<div class="column column-1 left">

					<div class="widgets">

						<?php dynamic_sidebar( 'footer-a' ); ?>

					</div> <!-- .widgets -->

				</div> <!-- .column-1 -->

			<?php endif; // footer-a ?>

			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>

				<div class="column column-2 left">

					<div class="widgets">

						<?php dynamic_sidebar( 'footer-b' ); ?>

					</div> <!-- .widgets -->

				</div> <!-- .column-2 -->

			<?php endif; // footer-b ?>

			<div class="clear"></div>

		</div> <!-- .footer -->

		<div class="credits">

			<div class="credits-inner">

				<p class="credits-left">

					&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>

				</p>

				<p class="credits-right">

					<span><?php printf( __( 'Theme by <a href="%s">Anders Noren</a>', 'wilson'), 'http://www.andersnoren.se' ); ?></span> &mdash;  <span><?php printf( __( 'Modified by <a href="%s">Hailong Hao</a>', 'wilson'), 'http://haohailong.net' ); ?></span> &mdash; <a title="<?php _e('To the top', 'wilson'); ?>" class="tothetop"><?php _e('Up', 'wilson' ); ?> &uarr;</a>

				</p>

				<div class="clear"></div>

			</div> <!-- .credits-inner -->

		</div> <!-- .credits -->

	</div> <!-- .content -->

	<div class="clear"></div>

</div> <!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>
