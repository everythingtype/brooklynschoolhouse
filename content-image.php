<?php

$image = get_sub_field( 'image' );
if ( $image ):

?>
<section class="image-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<figure>
		<img 
			srcset="<?php echo $image['sizes']['image-l']; ?> 2880w, 
			        <?php echo $image['sizes']['image']; ?> 1440w,
			        <?php echo $image['sizes']['image-s']; ?> 720w"
			src="<?php echo $image['sizes']['image']; ?>" 
			alt="" 
		/>

		<?php if ( get_sub_field( 'caption' ) ) : ?>
			<figcaption><?php the_sub_field( 'caption' ); ?></figcaption>
		<?php endif; ?>
	</figure>

	<?php get_template_part('parts/fabbutton'); ?>

</section>
<?php endif; ?>
