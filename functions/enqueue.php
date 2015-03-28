<?php

function etc_creative_scripts() {

	$version = "l";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');


	// Register JS
	
	wp_enqueue_script("jquery");

	$froogaloopjs = get_template_directory_uri() . '/js/froogaloop.min.js';
	wp_register_script('froogaloopjs',$froogaloopjs, false, $version);

	$flexsliderjs = get_template_directory_uri() . '/js/jquery.flexslider-min.js';
	wp_register_script('flexsliderjs',$flexsliderjs, false, $version);

	$scrolltojs = get_template_directory_uri() . '/js/jquery.scrollTo.min.js';
	wp_register_script('scrolltojs',$scrolltojs, false, $version);

	$localScrolljs = get_template_directory_uri() . '/js/jquery.localScroll.min.js';
	wp_register_script('localScrolljs',$localScrolljs, false, $version);

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);

	$homepagejs = get_template_directory_uri() . '/js/homepage.js';
	wp_register_script('homepagejs',$homepagejs, false, $version);



	// Register CSS

	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
    wp_register_style('fontscss',$fontscss, false, $version);

	$flexslidercss = get_template_directory_uri() . '/css/flexslider.css';
    wp_register_style('flexslidercss',$flexslidercss, false, $version);

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);


	// Enqueue

	wp_enqueue_script( 'froogaloopjs',array('jquery') );
	wp_enqueue_script( 'flexsliderjs',array('jquery') );
	wp_enqueue_script( 'layoutjs',array('jquery') );

    wp_enqueue_style( 'fontscss');
    wp_enqueue_style( 'flexslidercss');
	wp_enqueue_style( 'themecss');


	if ( is_front_page() ) :
		wp_enqueue_script( 'scrolltojs',array('jquery') );
		wp_enqueue_script( 'localScrolljs',array('jquery','scrolltojs') );
		wp_enqueue_script( 'homepagejs',array('jquery','scrolltojs','localScrolljs') );
	endif;

}
add_action( 'wp_print_styles', 'etc_creative_scripts' );


// Override Gravity Forms styles
function etc_gravityforms_enqueue(){

	$version = "a";

	wp_dequeue_style( 'gforms_formsmain_css' );

	$csm_formsmain = get_template_directory_uri() . '/css/gforms-formsmain.css';
	wp_register_style('csm_formsmain',$csm_formsmain, false, $version);
	wp_enqueue_style( 'csm_formsmain');	

}
add_action("gform_enqueue_scripts_1", "etc_gravityforms_enqueue", 10, 2);

?>