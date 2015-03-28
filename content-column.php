<?php

$columns = get_sub_field( 'columns' );
if ( '2' == $columns ) :
	$size = 'split-column';
else :
	$size = 'large';
endif;
?>
<section class="column-block columns-<?php echo $columns; ?> palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<?php if ( '2' == $columns ) : ?>
		<div class="column"><div class="firstpadding">
		<?php endif; ?>

			<?php etc_column_slideshow( get_sub_field( 'gallery' ), $size ); ?>

			<?php etc_column_images( get_sub_field( 'singlegallery' ), 'large' ); ?>

			<h3><?php the_sub_field( 'title' ); ?></h3>
			<?php if ( get_sub_field( 'subtitle' ) ) : ?>
				<h4><?php the_sub_field( 'subtitle' ); ?></h4>
			<?php endif; ?>

			<div><?php the_sub_field( 'editor' ); ?></div>

		<?php if ( '2' == $columns ) : ?>

		</div></div>

		<div class="column"><div class="secondpadding">

			<?php etc_column_slideshow( get_sub_field( 'gallery_2' ), $size ); ?>

			<?php etc_column_images( get_sub_field( 'singlegallery_2' ), 'large' ); ?>

			<h3><?php the_sub_field( 'title_2' ); ?></h3>
			<?php if ( get_sub_field( 'subtitle_2' ) ) : ?>
				<h4><?php the_sub_field( 'subtitle_2' ); ?></h4>
			<?php endif; ?>

			<div><?php the_sub_field( 'editor_2' ); ?></div>

		</div>

		<?php endif; ?>

		<?php get_template_part('parts/fabbutton'); ?>

</section>