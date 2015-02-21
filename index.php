<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( have_rows('blocks') ):
		while ( have_rows('blocks') ) : the_row();
			get_template_part( 'content', get_row_layout() );
		endwhile;
	endif;
	?>

	</article>

</main>

<?php get_footer(); ?>
