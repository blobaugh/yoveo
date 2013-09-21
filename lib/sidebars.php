<?php


// Register Sidebars
function yoveo_front_page_sidebars()  {

	$args = array(
		'id'            => 'front-page-main',
		'name'          => __( 'Front Page Main', 'text_domain' ),
		'description'   => __( 'Main widget area on the front page', 'text_domain' ),
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );


	$args = array(
		'id'            => 'front-page-right',
		'name'          => __( 'Front Page Right', 'text_domain' ),
		'description'   => __( 'Right side widget area on the front page', 'text_domain' ),
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'yoveo_front_page_sidebars' );


