<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="<?php bloginfo('language'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright <?php bloginfo('name');?> <?php echo date('Y');?>. All Rights Reserved.">
<meta name="google-site-verification" content="JLxaR3TNIUorblykzvrETee-3iogzbTUTsb1eA_Rk-s" />
	<title><?php echo wp_title();?></title>
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<h3 class="hidden"><?php bloginfo('name')?> – <?php bloginfo('description');?></h3>

<header id="header" role="banner">
	<div class="container">
		<a class="navbar-brand" href="<?php echo esc_url( home_url() ) ?>">
			<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/Chevys-Fresh-Mex-Lincoln-Nebraska-logo-white.png" alt="Chevys Fresh Mex logo">
		</a>
		<nav class="navbar navbar-default" role="navigation">
			<h2>Primary Navigation</h2>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar top-bar"></span>
	            <span class="icon-bar middle-bar"></span>
	            <span class="icon-bar bottom-bar"></span>
	        </button>
	        <div id="togo" class="pull-right">
				<h3>Get it to Go</h3>
				<a href="tel:4024650181">402.465.0181</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse navbar-ex1-collapse">
			<?php wp_nav_menu( array(
				  'menu' => 'main',
				  'depth' => 2,
				  'container' => false,
				  'menu_class' => 'nav navbar-nav',
				  'walker' => new wp_bootstrap_navwalker())
				); ?>

			</div>
		</nav>
	</div>
</header>