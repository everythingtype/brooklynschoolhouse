<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-180.png" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-152.png" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-120.png" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-76.png" />
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-60.png" />
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
					<div class="topnav">
						<?php wp_nav_menu( array('theme_location'  => 'mainmenu' ) ); ?>
					</div>
					<p class="explore"><a href="#" class="navtoggle"><span>Menu</span></a></p>
				</div>
			</div>

		</div>

	</div>

	<div id="primary" class="content-area">
		<div class="headerspacer"></div>
