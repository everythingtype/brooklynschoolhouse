<section class="glosssary-block">

	<div class="entry-content">
		<h3><?php the_sub_field( 'title' ); ?></h3>
		<?php if ( get_sub_field( 'section' ) ): ?>
			<dl>
			<?php while( has_sub_field( 'section' ) ): ?>
				<div class="accordionfold">
					<dt class="trigger"><?php the_sub_field( 'section_title' ); ?></dt>
					<dd class="target"><p><?php the_sub_field( 'section_content' ); ?></p></dd>
				</div>
			<?php endwhile; ?>
			</dl>
		<?php endif; ?>
	</div>

</section>