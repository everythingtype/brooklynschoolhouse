<section class="twocolumn-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<?php if (  get_sub_field( 'title' ) ) : ?>
			<h3><?php the_sub_field( 'title' ); ?></h3>
		<?php endif; ?>

		<?php if (  get_sub_field( 'subtitle' ) ) : ?>
			<h4><?php the_sub_field( 'subtitle' ); ?></h4>
		<?php endif; ?>

		<?php while ( has_sub_field( 'item' ) ): ?>
			<div class="item">
				<?php if ( get_sub_field( 'image' ) ) : ?>
					<div class="image"><div class="imagepadding"><div class="imagebox">
						<div class="ratio"></div>
							<?php
								$images = null;
								$images[] = get_sub_field( 'image' ); 
								etc_column_images( $images, 'large' ); 
							?>
					</div></div></div>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
					<div class="text"><div class="textpadding">
						<?php the_sub_field( 'text' ); ?>
					</div></div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>

		<?php get_template_part('parts/fabbutton'); ?>

	</div>

</section>