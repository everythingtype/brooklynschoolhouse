<?php

$url = get_permalink( $id );

?>

<?php if ( !is_404() ) : ?>

<div class="footer">

	<?php get_template_part('parts/pagetitle'); ?>

	<div class="smallprint">

		<p>&copy; Brooklyn Schoolhouse <?php echo date('Y')?></p>

		<ul>
			<li class="print"><span aria-hidden="true" class="icon-print"></span><a href="">Print</a></li>
			<li class="email"><span aria-hidden="true" class="icon-email"></span><a href="mailto:?subject=<?php the_title(); ?>&amp;body=Hi,%0d%0A%0d%0AI thought you might find this page interesting: %0d%0A%0d%0A<?php echo $url; ?>">E-mail</a></li>
		</ul>

	</div>

</div>
<?php endif; ?>

</div><!-- content-area -->

<div id="navlightbox" class="lightbox"><div class="box">
	<div class="nav">
		<ul>
			<li>No nav yet!</li>
		</ul>
	</div>
</div></div>

<?php wp_footer(); ?>

</body>
</html>
