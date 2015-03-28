<section class="onecolumn-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<?php if ( get_sub_field( 'title' ) ) : ?>
			<h3><?php the_sub_field( 'title' ); ?></h3>
		<?php endif; ?>

		<?php the_sub_field( 'text' ); ?>

		<?php get_template_part('parts/fabbutton'); ?>

	</div>
</section>