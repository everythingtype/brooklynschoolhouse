<?php


function the_etc_subpages($page_slug) {

	$output = '';

	$menuitemid = get_ID_by_slug($page_slug);

	$children = get_children(array(
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $menuitemid,
		'post_type' => 'page',
		'numberposts' => -1,
		'post_status' => 'publish'
	)); 

	if ( $children ) :

		foreach ($children as $child) :

			$itemurl = get_permalink($child->ID);
			$output .= '<li><a href="' . $itemurl . '">' . $child->post_title . '</a></li>';

		endforeach;

	endif;


	if ( $output != '' ) :
		echo '<ul>' . $output . '</ul>';
	endif;


}


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

function the_etc_breadcrumbs() {

	global $post;

	$output = '';

	if ( is_page('homepage') ) :
		$output .= 'Welcome';
	elseif ( is_page('why-does-creativity-matter') ) :
		$output .= '<span class="chapternumber">1</span> Why self-expression matters';
	elseif ( is_page('what-is-creativity') ) :
		$output .= '<span class="chapternumber">2</span> Expanding our perspective';
	elseif ( is_page('how-do-our-consumers-use-it') ) :
		$output .= '<span class="chapternumber">3</span> Self-expression and our consumers';
	elseif ( is_page('where-will-we-find-creative-spirits') ) :
		$output .= '<span class="chapternumber">4</span> Creative self-expression by country';
	elseif ( is_page('resources') ) :
		$output .= '<span class="chapternumber">5</span> Resources';
	else :

		if ( is_page_or_subpage_of('why-does-creativity-matter') ) :
			$output .= '<a href="' . get_permalink( get_page_by_path( 'why-does-creativity-matter' ) ) . '"><span class="chapternumber">1</span> Why self-expression matters</a> ';
		elseif ( is_page_or_subpage_of('what-is-creativity') ) :
			$output .= '<a href="' . get_permalink( get_page_by_path( 'what-is-creativity' ) ) . '"><span class="chapternumber">2</span> Expanding our perspective</a> ';
		elseif ( is_page_or_subpage_of('how-do-our-consumers-use-it') ) :
			$output .= '<a href="' . get_permalink( get_page_by_path( 'how-do-our-consumers-use-it' ) ) . '"><span class="chapternumber">3</span> Self-expression and our consumers</a> ';
		elseif ( is_page_or_subpage_of('where-will-we-find-creative-spirits') ) :
			$output .= '<a href="' . get_permalink( get_page_by_path( 'where-will-we-find-creative-spirits' ) ) . '"><span class="chapternumber">4</span> Creative self-expression by country</a> ';
		elseif ( is_page_or_subpage_of('resources') ) :
			$output .= '<a href="' . get_permalink( get_page_by_path( 'resources' ) ) . '"><span class="chapternumber">5</span> Resources</a> ';
		endif;

		$ancestorid = wp_get_post_parent_id( $post->ID );

		if ( $ancestorid != 0 ) :

			$ancestor = get_post($ancestorid, ARRAY_A);
		    $ancestorslug = $ancestor['post_name'];

			if ( $ancestorslug != 'why-does-creativity-matter' && $ancestorslug != 'what-is-creativity' && $ancestorslug != 'how-do-our-consumers-use-it' && $ancestorslug != 'where-will-we-find-creative-spirits' && $ancestorslug != 'resources' ) :

				$output .= '<span class="dot">•</span> <a href="' . get_permalink( $ancestor['ID'] ) . '">' . $ancestor['post_title'] . '</a> ';

			endif;

		endif;

		$output .= '<span class="dot">•</span> ' . get_the_title();

	endif;

	echo $output;


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


?>