<section class="accordian-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<h3><?php the_sub_field( 'title' ); ?></h3>

		<?php if ( get_sub_field( 'section' ) ): ?>
			<div class="accordionwrap">
			<?php while ( has_sub_field( 'section' ) ): ?>
				<div class="accordionslide">

					<div class="accordionfold">

						<div class="content">
							<h4 class="trigger"><?php the_sub_field( 'section_title' ); ?></h4>
							<div class="target">
								<div class="section-content">
									<?php the_sub_field( 'section_content' ); ?>
								</div>
								<p class="byline"><?php the_sub_field( 'section_byline' ); ?></p>
							</div>
						</div>

					</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>

</section>
