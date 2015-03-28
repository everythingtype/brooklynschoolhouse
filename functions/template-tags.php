<?php

function etc_creative_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'etc-creative' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'etc_creative_wp_title', 10, 2 );


function etc_column_slideshow( $images, $size ) {

	$output = '';

	if ( $images ): 

		$imagecount = count($images);

		if ( $imagecount > 1 ):

			$counter = 0;

			$output .= '<div class="flexslider"><ul class="slides">';

			foreach( $images as $image ):
				$counter++; 

				$output .= '<li><img src="' . $image['sizes'][$size] . '" alt="" />';
				$output .= '<figcaption><span class="counter">' . $counter . ' of ' . $imagecount . '</span>';

				if ( $image['caption'] ) :
					$output .= $image['caption'];
				endif;

				$output .= '</figcaption></li>';

			endforeach;

			$output .= '</ul></div>';

		else :

			// Single Image
			foreach( $images as $image ):

				$output .= '<figure><img src="' . $image['sizes'][$size] . '" alt="" />';

				if ( $image['caption'] ) :
					$output .= '<figcaption>' . $image['caption'] . '</figcaption>';
				endif;

				$output .= '</figure>';

			endforeach;

		endif;

	endif;

	echo $output;

}


function etc_column_images( $images, $size ) {
	if ( $images ):
		foreach( $images as $image ):
			echo '<figure>';
				echo '<img src="' . $image['sizes'][$size] . '">';
				if ( $image['caption'] ) :
	            	echo '<figcaption>' . $image['caption'] . '</figcaption>';
	            endif;
			echo '</figure>';
		endforeach;
	endif;
}


function is_page_or_subpage_of($slug) {

	global $post;

	if ( is_page() || is_search() ) :

		if ( is_page($slug) ) :

			return true;

		else :

			$targetid = get_ID_by_slug($slug);

			$ancestors = get_post_ancestors($post->ID);
			
			if (in_array($targetid, $ancestors)) return true;

		endif;

	endif;



}


function get_ID_by_slug($page_slug) {

	global $wpdb;

	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;


}

//This is a filter to change the default validation message that Gravity Forms generates
add_filter('gform_validation_message', 'change_validation_message', 10, 2);
function change_validation_message($message, $form)
{
    return "<div class='validation_error'>Hi there. There seems to have been a problem with your submission. Errors have been highlighted below...</div>";
}

?>