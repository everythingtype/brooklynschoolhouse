<?php

$url = get_permalink( $id );

?>

<?php if ( !is_404() ) : ?>

<div class="pagenav"><div class="pagenavmargin">
	<div class="prev"><?php echo previous_page_not_post('<span class="arrow">&larr;</span><span class="label"><small>Previous</small> %title</span>', 'expand'); ?></div>
	<?php if ( !is_page('contact-us') ) : ?>
		<div class="next"><?php echo next_page_not_post('<span class="arrow">&rarr;</span><span class="label"><small>Next</small> %title</span>', 'expand'); ?></div>
	<?php endif; ?>
</div></div>

<div class="footer"><div class="footermargin">

		<h3>Brooklyn <span>Schoolhouse</span></h3>

		<div class="footermenu">
			<?php wp_nav_menu( array('theme_location'  => 'mainmenu' ) ); ?>
		</div>

		<div class="footercontact">
			<p>156 Gates Avenue<br />
			Brooklyn, New York 11238<br />
			718&ndash;395&ndash;5415<br />
			<a class="email" href="mailto:info@brooklynschoolhouse.nyc">info@brooklynschoolhouse.nyc</a></p>
			<p class="facebook"><a href="https://www.facebook.com/brooklynschoolhouse">Facebook</a></p>
		</div>



	<div class="smallprint">

		<p>&copy; <?php echo date('Y')?> Brooklyn Schoolhouse</p>

		<p>Site by <a href="http://etc-nyc.com">ETC</a></p>


	</div>

</div></div>
<?php endif; ?>

</div><!-- content-area -->

<div id="navlightbox" class="lightbox"><div class="box">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'mainmenu' ) ); ?>
	</div>
</div></div>

<?php wp_footer(); ?>

</body>
</html>
