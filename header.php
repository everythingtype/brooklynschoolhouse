<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
<meta name="msapplication-TileColor" content="#000000"/> 
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

<?php wp_head(); ?>

</head>

<body <?php if ( is_404() ) echo 'class="is404"'; ?>>

	<div class="fixedheader">

		<div class="toptitle">
			<div class="header">
				<div class="sitetitle">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="guide">Brooklyn Schoolhouse</span></a></h1>
					<p class="explore"><a href="" class="navtoggle"><span class="label">Explore</span> <span class="icon">&varr;</span></a></p>
				</div>
			</div>

			<?php get_template_part('parts/pagetitle'); ?>

		</div>

	</div>

	<div id="primary" class="content-area">
		<div class="headerspacer"></div>
