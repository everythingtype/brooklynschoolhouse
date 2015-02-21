<?php

	$hide_on_page = get_sub_field( 'hide_on_page' );
	$palette = strtolower( get_sub_field( 'palette' ) );
	$block_slug = get_sub_field( 'block_slug' ); 

	if ( $hide_on_page == "hide") :
	?>

		<div <?php if ( $block_slug ) echo 'id="' . $block_slug . '"'; ?> class="lightbox palette-<?php echo $palette; ?>"><div class="box">

	<?php endif; ?>


<section class="creatives-block palette-<?php echo $palette; ?>">

	<div class="entry-content">

		<?php if ( $hide_on_page == "hide") : ?>
			<a class="closelightbox"><span>Close </span>&otimes;</a>
		<?php endif; ?>

		<div class="entry-padding">

		<h3><?php the_sub_field( 'title' ); ?></h3>
		<?php if ( get_sub_field( 'subtitle' ) ) : ?>
			<h4><?php the_sub_field( 'subtitle' ); ?></h4>
		<?php endif; ?>

		<?php if ( get_sub_field( 'section' ) ): ?>
			<?php while( has_sub_field( 'section' ) ): ?>
			<div class="creative"><div class="creativepadding">
				<?php
					$image = get_sub_field( 'section_image' );
					if ( $image ): ?>
						<div class="portrait"><img 
													srcset="<?php echo $image['sizes']['creative-l']; ?> 380w, 
													        <?php echo $image['sizes']['creative']; ?> 190w,
													        <?php echo $image['sizes']['creative-s']; ?> 95w"
													src="<?php echo $image['sizes']['creative']; ?>" alt="" /></div>
				<?php	endif; ?>
				<p class="creative-title"><?php the_sub_field( 'section_title' ); ?></p>
				<div class="qualifications">
					<?php the_sub_field( 'section_content' ); ?>
				</div>
			</div></div>
			<?php endwhile; ?>

		<?php endif; ?>
	</div></div>

</section>

<?php if ( $hide_on_page == "hide") : ?>
	</div></div>
<?php endif; ?>
