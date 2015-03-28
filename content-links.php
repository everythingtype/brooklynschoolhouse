<?php

if ( get_sub_field( 'link_square' ) ): 

	$counter = "odd";

?>
<section class="links-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content"><div class="entry-padding">

		<?php while( has_sub_field( 'link_square' ) ):

				$linksrc = "";

				$link_type = get_sub_field( 'link_type' );

				if ( $link_type == "internal" ) :

					$internal_link = get_sub_field( 'internal_link' );
					$linksrc = $internal_link;

				elseif ( $link_type == "external" ) :

					$external_link = get_sub_field( 'external_link' );
					$linksrc = $external_link;

				elseif ( $link_type == "block" ) :

					$block_link = get_sub_field( 'block_link' );
					$linksrc = '#' . $block_link;

				endif;

				if ( $linksrc != "" ) :

					$output = "";

					$image = get_sub_field( 'link_image' );

					if ( $image ) :
						$output .= '<img ';
						$output .= 'srcset="'. $image['sizes']['split-column-l'] . ' 990w, '; 
						$output .=  $image['sizes']['split-column'] . ' 495w, ';
						$output .= $image['sizes']['split-column-s'] . ' 247w" ';
						$output .= 'src="' . $image['sizes']['split-column'] . '" alt="" />';
					endif;

					$hoverimage = get_sub_field( 'hover_image' );

					if ( $hoverimage ) :
						$output .= '<img class="hoverimage" ';
						$output .= 'srcset="'. $hoverimage['sizes']['split-column-l'] . ' 990w, '; 
						$output .=  $hoverimage['sizes']['split-column'] . ' 495w, ';
						$output .= $hoverimage['sizes']['split-column-s'] . ' 247w" ';
						$output .= 'src="' . $hoverimage['sizes']['split-column'] . '" alt="" />';
					endif;

					$link_text = get_sub_field( 'link_text' );

					if ( $link_text ) : 
						$output .= '<div class="linktext">' . $link_text . '</div>';
					endif;

					if ( $output != "" ) :

						$link_color = get_sub_field( 'link_color' );

						if ( $link_color ) : 
							$style = ' style="color: ' . $link_color . ';"';
						else :
							$style = '';
						endif;

						echo '<div class="linkcolumn"><div class="padding'. $counter .'"><a'. $style .' href="' . $linksrc . '" class="linktype-' . $link_type . '">' . $output . '</a></div></div>';

						if ( $counter == "odd" ) :
							$counter = "even";
						else :
							$counter = "odd";
						endif;

					endif;


				endif;

			?>


		<?php endwhile; ?>

	</div></div>

	<?php get_template_part('parts/fabbutton'); ?>

</section>

<?php endif; ?>
