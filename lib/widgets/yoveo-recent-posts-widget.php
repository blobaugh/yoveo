<?php

class YoveoRecentPostsWidget extends WP_Widget {

	private $mDefaultArgs = array(
	    'numberposts' => 4,
	    'category' => 0,
	    'post_status' => 'publish',
	    'post_type' => 'posts',
	    // The rest are at the defaults from http://codex.wordpress.org/Function_Reference/wp_get_recent_posts
	    'offset' => 0,
	    'orderby' => 'post_date',
	    'order' => 'DESC',
	    'include' => '',
	    'exclude' => '',
	    'meta_key' => '',
	    'meta_value' => '',
	    'suppress_filters' => true
	);

	function __construct() {
		// Instantiate the parent object
		parent::__construct('YoveoRecentPostsWidget', 'Yoveo Recent Posts');
	}

	function widget($args, $instance) {
		$instance = wp_parse_args($instance, $this->mDefaultArgs);

		$posts = wp_get_recent_posts( $instance);
		// Widget output
		echo '<div class="yoveo-recent-posts-widget">';
		echo '<h2>recent posts</h2>';

		foreach( $posts AS $post ) {
			echo "<p>{$post['post_title']}</p>";
		}
		echo '</div>';
	}

	function form($instance) {
		$instance = wp_parse_args($instance, $this->mDefaultArgs);
		$post_types = get_post_types(array('public' => true), 'objects');
		$categories = get_categories();

		?>
		<p>
			<?php _e('Post Type: '); ?>
			<select class="widefat" name="<?php echo $this->get_field_name('post_type'); ?>">
				<?php

				foreach ($post_types as $post_type) {
					?>
					<option value="<?php echo esc_attr($post_type->name); ?>" <?php selected($post_type->name, $instance['post_type']); ?>><?php echo esc_html($post_type->labels->singular_name); ?></option>
					<?php
				}
				?>
			</select>
		</p>

		<p>
		<?php
		_e('Category: ');
		wp_dropdown_categories( array(
		    'hierarchical'	=> true,
		    'depth'		=> 10,
		    'show_count'	=> true,
		    'class'		=> 'widefat',
		    'name'		=> $this->get_field_name('category'),
		    'selected'		=> $instance['category'],
		));

		echo '</p><p>';
		_e('Number of Posts: ');
		?>
		<input class="widefat" id="<?php echo $this->get_field_id( 'numberposts' ); ?>" name="<?php echo $this->get_field_name( 'numberposts' ); ?>" type="text" value="<?php echo esc_attr( $instance['numberposts'] ); ?>" />
		</p>
		<?php
	}

}

function myplugin_register_widgets() {
	register_widget('YoveoRecentPostsWidget');
}

add_action('widgets_init', 'myplugin_register_widgets');