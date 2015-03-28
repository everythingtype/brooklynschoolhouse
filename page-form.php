<?php

/*
Template Name: Form
*/

get_header(); 

if ( have_posts() ) : 
	while (have_posts()) : the_post(); ?>

<main id="main" class="site-main" role="main">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<section class="form-page">

			<div class="entry-content">
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
			</div>

		</div>
	</article>

</main>

<?php 

	endwhile;
endif;

get_footer(); ?>
