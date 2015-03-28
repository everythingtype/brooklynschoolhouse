<?php

// Includes

require get_template_directory() . '/functions/enqueue.php';
require get_template_directory() . '/functions/template-tags.php';


function etc_creative_setup() {

	add_theme_support( 'html5', array(
		'gallery', 'caption'
	) );

	add_image_size( 'image-l', '2880', '9999', false );
	add_image_size( 'image', '1440', '9999', false ); 
	add_image_size( 'image-s', '720', '9999', false );

	add_image_size( 'slideshow-l', '2880', '1680', true );
	add_image_size( 'slideshow', '1440', '840', true );
	add_image_size( 'slideshow-s', '720', '420', true );

	add_image_size( 'split-column-l', '990', '800', true );
	add_image_size( 'split-column', '495', '400', true );
	add_image_size( 'split-column-s', '247', '200', true );

	add_image_size( 'creative-l', '380', '460', true );
	add_image_size( 'creative', '190', '230', true );
	add_image_size( 'creative-s', '95', '115', true );

}
add_action( 'after_setup_theme', 'etc_creative_setup' );

// Menus
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	register_nav_menu( 'mainmenu', __( 'Main Menu' ) );
}



