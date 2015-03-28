<?php

$background = "";

$backgroundcolor = get_sub_field( 'background_color' );

if ( $backgroundcolor ) :
	$background = 'background-color: ' . $backgroundcolor . '; ';
endif;

$color="";
$textcolor = get_sub_field( 'text_color' );
if ( $textcolor ) :
	$color = 'color: ' . $textcolor . '; ';
	$fillcolor = $textcolor;
else: 
	$fillcolor = '#ffffff';
endif;

$style = '';
if ( $color != "" || $background != "" ) :
	$style = 'style="' . $background . $color . '"';
endif;

?>

<section class="supertext-block" <?php echo $style; ?>>
<div class="entry-content">

<?php $image = get_sub_field( 'image' );
	if ( $image ): ?>
	<img 
		srcset="<?php echo $image['sizes']['image-l']; ?> 2880w, 
		        <?php echo $image['sizes']['image']; ?> 1440w,
		        <?php echo $image['sizes']['image-s']; ?> 720w"
		src="<?php echo $image['sizes']['image']; ?>" 
		alt="" 
	/>	<?php else : ?>
		<div class="noimage"></div>
	<?php endif; ?>

		<?php if ( get_sub_field( 'content' ) ) : ?>
			<h2><span><?php the_sub_field( 'content' ); ?></span></h2>
		<?php endif; ?>

		<?php

		$linkhref = "";
		$read_more_link_style = get_sub_field( 'read_more_link_style' );

		if ( $read_more_link_style == 'internal' ) :
			$read_more_link = get_sub_field('read_more_link_internal');
			if ( $read_more_link ) :
				$linkhref = $read_more_link;
			endif;
		elseif ( $read_more_link_style == 'external' ) :
			$read_more_link = get_sub_field('read_more');
			if ( $read_more_link ) :
				$linkhref = $read_more_link;
			endif;
		endif;

		if ( $linkhref != "" ) : ?>
			<p class="morelink"><a href="<?php echo $linkhref; ?>">Read More <span>&roarr;</span></a></p>
		<?php endif; ?>

	<?php get_template_part('parts/fabbutton'); ?>

</div></section><!-- .entry-content, #block-->
