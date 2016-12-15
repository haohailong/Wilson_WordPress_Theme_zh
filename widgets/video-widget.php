<?php 

// Video widget for Wilson WordPress theme

class wilson_video_widget extends WP_Widget {

	function __construct() {
        $widget_ops = array( 
            'classname'   => 'wilson_video_widget', 
            'description' => __( 'Displays a video of your choosing.', 'wilson' ) 
        );
        
        parent::__construct( 'wilson_video_widget', __( 'Video Widget', 'wilson' ), $widget_ops );
    }
	
	function widget( $args, $instance ) {
	
		// Outputs the content of the widget
		extract( $args ); // Make before_widget, etc available.
		
		$widget_title = apply_filters( 'widget_title', $instance['widget_title'] );
		$video_url = $instance['video_url'];
		
		echo $before_widget;
		
		if ( ! empty( $widget_title ) ) {
		
			echo $before_title . $widget_title . $after_title;
			
		} 
			
        if ( strpos( $video_url, '.mp4' ) !== false ) : ?>

            <video controls>
              <source src="<?php echo $video_url; ?>" type="video/mp4">
            </video>

            <?php 
        
        else :

            $embed_code = wp_oembed_get( $video_url ); 
            echo $embed_code;

        endif;
							
        echo $after_widget; 
	}
	
	
	function update( $new_instance, $old_instance ) {
		//update and save the widget
		return $new_instance;
	}
	
	function form ($instance ) {
	
		// Get the options into variables, escaping html characters on the way
		$widget_title = $instance['widget_title'];
		$video_url = $instance['video_url'];
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Title', 'wilson' ); ?>:
			<input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" class="widefat" value="<?php echo $widget_title; ?>" /></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'video_url' ); ?>"><?php  _e( 'Video URL', 'wilson' ); ?>:
			<input id="<?php echo $this->get_field_id( 'video_url' ); ?>" name="<?php echo $this->get_field_name( 'video_url' ); ?>" type="text" class="widefat" value="<?php echo $video_url; ?>" /></label>
		</p>
						
		<?php
	}
}
register_widget( 'wilson_video_widget' ); ?>