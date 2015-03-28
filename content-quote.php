<section class="quote-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<?php if (  get_sub_field( 'title' ) ) : ?>
			<h3><?php the_sub_field( 'title' ); ?></h3>
		<?php endif; ?>

		<?php while ( has_sub_field( 'section' ) ): ?>

			<?php if ( get_sub_field( 'section_content' ) ) : ?>
			<blockquote>
				<p><?php the_sub_field( 'section_content' ); ?></p>
				<?php if ( get_sub_field( 'section_byline' ) ) : ?>
					<cite class="byline"><?php the_sub_field( 'section_byline' ); ?></cite>
				<?php endif; ?>
			</blockquote>
			<?php endif; ?>

		<?php endwhile; ?>

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

		if ( $linkhref != "" ) : 
			$read_more_link_text = get_sub_field( 'read_more_link_text' ); ?>
			<p class="morelink"><a href="<?php echo $linkhref; ?>"><?php echo $read_more_link_text; ?></a></p>
		<?php endif; ?>

		<?php get_template_part('parts/fabbutton'); ?>

	</div>

</section>