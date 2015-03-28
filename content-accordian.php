<section class="accordian-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">

		<h3><?php the_sub_field( 'title' ); ?></h3>

		<?php

		$subtitle = get_sub_field( 'subtitle' );
		if ( $subtitle ) :
			echo '<p class="subtitle">' . $subtitle . '</p>';
		endif;
		?>

		<?php if ( get_sub_field( 'section' ) ): ?>
			<div class="accordionwrap">
			<?php while ( has_sub_field( 'section' ) ): ?>
				<div class="accordionslide">

					<div class="accordionfold">

						<div class="content">
							<h4 class="trigger"><?php 
								the_sub_field( 'section_title' ); 
								$sectionsubtitle = get_sub_field( 'section_subtitle' ); 
								if ( $sectionsubtitle ) :
									echo ' &nbsp;<span>' . $sectionsubtitle . '</span>';
								endif;
							?></h4>
							<div class="target"><div class="targetpadding"><?php 

								$section_content = get_sub_field( 'section_content' ); 
								if ( $section_content ) : 
									echo $section_content;
								endif; 

								$section_byline = get_sub_field( 'section_byline' ); 
								if ( $section_byline ) :
									echo '<p class="byline">' . $section_byline . '</p>';
								endif; 

								$section_read_more_link = get_sub_field('section_read_more_link'); 
								if ( $section_read_more_link ) :
									echo '<p><a class="readmorelink" href="' . $section_read_more_link .'">Read more</a></p>';
								endif; 

							?></div></div>
						</div>

					</div>
				</div>
			<?php endwhile; ?>
			</div>

			<?php
			
			$follow_up_link = get_sub_field('follow_up_link'); 
			if ( $follow_up_link ) :
				echo '<p class="followuplink"><a class="material" href="' . $follow_up_link .'">' .  get_sub_field('follow_up_label') . '</a></p>';
			endif;
			
			?>
		<?php endif; ?>

		<?php get_template_part('parts/fabbutton'); ?>

	</div>

</section>
