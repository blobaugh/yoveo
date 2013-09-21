<?php

/**
 * @todo Add title
 *
 */
class YoveoUsersWidget extends WP_Widget {

	private $mDefaultArgs = array(
	    'show_option_all' => null, // string
	    'show_option_none' => null, // string
	    'hide_if_only_one_author' => null, // string
	    'orderby' => 'display_name',
	    'order' => 'ASC',
	    'include' => null, // string
	    'exclude' => null, // string
	    'multi' => false,
	    'show' => 'display_name',
	    'echo' => true,
	    'selected' => false,
	    'include_selected' => false,
	    //'name' => 'user', // string
	    'id' => null, // integer
	    'class' => null, // string
	    'blog_id' => 1,
	    'who' => null // string
	);

	function __construct() {
		// Instantiate the parent object
		parent::__construct('YoveoUsersWidget', 'Yoveo Users');
	}

	function widget($args, $instance) {
		$instance = wp_parse_args($instance, $this->mDefaultArgs);

		$user = get_userdata( $instance['users'] );
		// Widget output
		echo '<div class="yoveo-user-widget">';
		echo '<h2>About Me</h2>';

		echo get_avatar( $user->ID, '240' );

		echo $user->display_name;
		echo '</div>';
	}

	function form($instance) {
		$instance = wp_parse_args($instance, $this->mDefaultArgs);
		$instance['name'] = $this->get_field_name('users');
		$instance['selected'] = $instance['users'];

		echo '<p>';
		_e('User: ');
		wp_dropdown_users( $instance );
		echo '</p>';
	}

}

function yoveo_register_user_widget() {
	register_widget('YoveoUsersWidget');
}

add_action('widgets_init', 'yoveo_register_user_widget');