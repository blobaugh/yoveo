<?php
// Register Theme Features
function yoveo_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	$formats = array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', );
	add_theme_support( 'post-formats', $formats );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'yoveo_theme_features' );