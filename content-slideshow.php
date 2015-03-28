<section class="slideshow-block palette-<?php echo strtolower( get_sub_field( 'palette' ) ); ?>">

	<div class="entry-content">
		<?php
		$images = get_sub_field( 'gallery' );
		if ( $images ): 
			$imagecount = count($images);

			if ( $imagecount > 1 ) :
				$counter = 0; ?>

			    <div class="flexslider">
			        <ul class="slides">
			            <?php foreach( $images as $image ): ?>
			                <li>
			                	<figure>
			                    	<img 
										srcset="<?php echo $image['sizes']['slideshow-l']; ?> 2880w, 
										        <?php echo $image['sizes']['slideshow']; ?> 1440w,
										        <?php echo $image['sizes']['slideshow-s']; ?> 720w"
										src="<?php echo $image['sizes']['slideshow']; ?>" 
									/>
									<figcaption>
										<span class="counter"><?php $counter++; echo $counter; ?> of <?php echo $imagecount; ?></span>
										<?php echo $image['caption']; ?>
									</figcaption>
			                	</figure>
			                </li>
			            <?php endforeach; ?>
			        </ul>
			    </div>

		<?php else :
			foreach( $images as $image ): ?>
			<div class="singleslide">
				<figure>
                	<img 
						srcset="<?php echo $image['sizes']['slideshow-l']; ?> 2880w, 
						        <?php echo $image['sizes']['slideshow']; ?> 1440w,
						        <?php echo $image['sizes']['slideshow-s']; ?> 720w"
						src="<?php echo $image['sizes']['slideshow']; ?>" 
					/>
					<?php if ($image['caption'] ) : ?>
						<figcaption><?php echo $image['caption']; ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
        <?php endforeach;
			endif;
		endif; ?>

	<?php get_template_part('parts/fabbutton'); ?>

	</div>

</section>