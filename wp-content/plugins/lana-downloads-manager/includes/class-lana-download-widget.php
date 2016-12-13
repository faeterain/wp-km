<?php

/**
 * Class Lana_Download_Widget
 */
class Lana_Download_Widget extends WP_Widget{

	/**
	 * Lana Download Widget
	 * constructor
	 */
	public function __construct() {

		$widget_title       = __( 'Lana - Download', 'lana-downloads-manager' );
		$widget_description = __( 'Download button with counter.', 'lana-downloads-manager' );
		$widget_options     = array( 'description' => $widget_description );

		parent::__construct( 'lana_download', $widget_title, $widget_options );
	}

	/**
	 * Output Widget HTML
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		$lana_download = get_post( absint( $instance['download_id'] ) );

		if ( ! $lana_download ) {
			return;
		}

		/**
		 * Widget
		 * elements
		 */
		$before_widget = '<div class="thumbnail lana-download-container">';
		$after_widget  = '</div>';

		$before_caption = '<div class="caption text-center">';
		$after_caption  = '</div>';

		$before_title = '<h3 class="title">';
		$after_title  = '</h3>';

		$before_counter = '<p class="counter">';
		$after_counter  = '</p>';

		/**
		 * Featured Image
		 */
		if ( has_post_thumbnail( $lana_download ) && $instance['image_status'] ) {
			$thumbnail_id  = get_post_thumbnail_id( $lana_download );
			$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'large', true );
			$image         = '<img src="' . esc_attr( $thumbnail_url[0] ) . '" class="img-responsive" />';
		}

		/**
		 * Download Button
		 */
		$before_button = '<p><a class="btn btn-primary lana-download" href="' . esc_attr( lana_downloads_manager_get_download_url( $lana_download->ID ) ) . '" role="button">';
		$after_button  = '</a></p>';

		/**
		 * Output
		 * Widget
		 */
		echo $args['before_widget'];
		echo $before_widget;

		if ( isset( $image ) ) {
			echo $image;
		}

		echo $before_caption;

		if ( $instance['title_status'] ) {
			echo $before_title . $lana_download->post_title . $after_title;
		}

		if ( $instance['text_status'] ) {
			echo $args['before_text'] . wpautop( $lana_download->post_content ) . $args['after_text'];
		}

		echo $before_button . __( 'Download', 'lana-downloads-manager' ) . $after_button;

		echo $before_counter;
		echo __( 'Total downloads:', 'lana-downloads-manager' ) . ' ';
		echo lana_downloads_manager_get_download_count( $lana_download->ID );
		echo $after_counter;

		echo $after_caption;

		echo $after_widget;
		echo $args['after_widget'];
	}

	/**
	 * Output Widget Form
	 *
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array(
			'download_id' => '',
			'title_status'       => '',
			'text_status'        => '',
			'image_status'       => ''
		) );

		$instance['download_id'] = absint( $instance['download_id'] );
		$instance['title_status']       = absint( $instance['title_status'] );
		$instance['text_status']        = absint( $instance['text_status'] );
		$instance['image_status']       = absint( $instance['image_status'] );

		$args     = array(
			'post_type'      => 'lana-download',
			'post_status'    => 'publish',
			'posts_per_page' => - 1
		);
		$my_query = new WP_Query( $args );

		/**
		 * Empty
		 * Lana Downloads
		 */
		if ( ! $my_query->have_posts() ):
			?>
			<p>
			<span class="empty">
				<?php _e( 'No posts in Lana Downloads.', 'lana-downloads-manager' ); ?>
			</span>
			</p>
			<?php
			return;
		endif;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'download_id' ); ?>">
				<?php _e( 'File:', 'lana-downloads-manager' ); ?>
			</label>
			<br/>
			<select class="widefat" id="<?php echo $this->get_field_id( 'download_id' ); ?>"
			        name="<?php echo $this->get_field_name( 'download_id' ); ?>">
				<?php
				while( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<option
						value="<?php echo esc_attr( get_the_ID() ); ?>" <?php selected( $instance['download_id'], get_the_ID() ); ?>>
						#<?php echo get_the_ID(); ?> - <?php the_title(); ?>
					</option>
					<?php
				endwhile;
				?>
			</select>
			<?php wp_reset_query(); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title_status' ); ?>">
				<?php _e( 'Title:', 'lana-downloads-manager' ); ?>
			</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'title_status' ); ?>"
			        name="<?php echo $this->get_field_name( 'title_status' ); ?>">
				<option value="1" <?php selected( $instance['title_status'], '1' ); ?>>
					<?php _e( 'Enabled', 'lana-downloads-manager' ); ?>
				</option>
				<option value="0" <?php selected( $instance['title_status'], '0' ); ?>>
					<?php _e( 'Disabled', 'lana-downloads-manager' ); ?>
				</option>
			</select>

			<label for="<?php echo $this->get_field_id( 'text_status' ); ?>">
				<?php _e( 'Text:', 'lana-downloads-manager' ); ?>
			</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'text_status' ); ?>"
			        name="<?php echo $this->get_field_name( 'text_status' ); ?>">
				<option value="1" <?php selected( $instance['text_status'], '1' ); ?>>
					<?php _e( 'Enabled', 'lana-downloads-manager' ); ?>
				</option>
				<option value="0" <?php selected( $instance['text_status'], '0' ); ?>>
					<?php _e( 'Disabled', 'lana-downloads-manager' ); ?>
				</option>
			</select>

			<label for="<?php echo $this->get_field_id( 'image_status' ); ?>">
				<?php _e( 'Featured Image:', 'lana-downloads-manager' ); ?>
			</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'image_status' ); ?>"
			        name="<?php echo $this->get_field_name( 'image_status' ); ?>">
				<option value="1" <?php selected( $instance['image_status'], '1' ); ?>>
					<?php _e( 'Enabled', 'lana-downloads-manager' ); ?>
				</option>
				<option value="0" <?php selected( $instance['image_status'], '0' ); ?>>
					<?php _e( 'Disabled', 'lana-downloads-manager' ); ?>
				</option>
			</select>
		</p>
		<?php
	}

	/**
	 * Update Widget Data
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array|mixed|void
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['download_id']  = absint( $new_instance['download_id'] );
		$instance['title_status'] = absint( $new_instance['title_status'] );
		$instance['text_status']  = absint( $new_instance['text_status'] );
		$instance['image_status'] = absint( $new_instance['image_status'] );

		return apply_filters( 'lana_download_widget_update', $instance, $this );
	}
} 