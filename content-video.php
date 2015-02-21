<?php

$oembed = get_sub_field('oembed');

if ( $oembed ) : ?>

<section class="video-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

<div class="videocontent">

	<?php 

		$image = get_sub_field( 'image' ); 

		if ( $image ) : 

			echo do_shortcode('[fve]' . $oembed . '[/fve]');

			echo '<div class="videoimage" style="background-image: url(' . $image['url'] . ');"><div class="playbutton"></div></div>';


		else :

			echo do_shortcode('[fve]' . $oembed . '[/fve]');

		endif; 

	?>

</div>

<?php if ( get_sub_field( 'caption' ) ) : ?>
	<div class="caption">
		<?php the_sub_field( 'caption' ); ?>
	</div>
<?php endif; ?>

</section>

<?php endif; ?>