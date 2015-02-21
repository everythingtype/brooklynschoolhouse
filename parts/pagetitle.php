<?php if ( !is_404() ) : ?>

<div class="pagetitle">
	<div class="prev"><?php echo previous_page_not_post('<span>&loarr;</span> Previous', 'expand'); ?></div>
	<div class="next"><?php echo next_page_not_post('Next <span>&roarr;</span>', 'expand'); ?></div>
	<h1><?php the_etc_breadcrumbs(); ?></h1>
</div>

<?php endif; ?>