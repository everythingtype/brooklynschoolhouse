<?php

function etc_creative_scripts() {

	$version = "b";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	// JS
	
	wp_enqueue_script("jquery");

	$froogaloopjs = get_template_directory_uri() . '/js/froogaloop.min.js';
	wp_register_script('froogaloopjs',$froogaloopjs, false, $version);
	wp_enqueue_script( 'froogaloopjs',array('jquery') );

	$flexsliderjs = get_template_directory_uri() . '/js/jquery.flexslider-min.js';
	wp_register_script('flexsliderjs',$flexsliderjs, false, $version);
	wp_enqueue_script( 'flexsliderjs',array('jquery') );

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);
	wp_enqueue_script( 'layoutjs',array('jquery') );

	// CSS

	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
    wp_register_style('fontscss',$fontscss, false, $version);
    wp_enqueue_style( 'fontscss');

	$flexslidercss = get_template_directory_uri() . '/css/flexslider.css';
    wp_register_style('flexslidercss',$flexslidercss, false, $version);
    wp_enqueue_style( 'flexslidercss');

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);
	wp_enqueue_style( 'themecss');

}
add_action( 'wp_print_styles', 'etc_creative_scripts' );


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


// Includes

require get_template_directory() . '/functions/template-tags.php';

