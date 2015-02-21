<section class="consumer-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<h3><?php the_sub_field( 'title' ); ?></h3>
		<?php $introduction = get_sub_field( 'introduction' ); ?>
		<?php if ( $introduction ) : ?>
			<div class="introduction"><?php echo $introduction; ?></div>
		<?php endif; ?>

		<?php if ( get_sub_field( 'percentages' ) ): ?>
			<div class="percentages">
				<?php while ( has_sub_field( 'percentages' ) ): ?>
					<div class="percentage"><dl>
						<dt class="description"><?php the_sub_field( 'number' ); ?></dt>
						<dd class="description"><?php the_sub_field( 'description' ); ?></dd>
					</dl></div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<span class="separator"></span>
	</div>

</section>
