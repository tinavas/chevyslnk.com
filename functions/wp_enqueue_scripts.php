<?php

add_action('wp_enqueue_scripts', 'enqueue');
function enqueue(){
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');

	//Bootstrap
	wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', NULL, '3.3.4');

	//Fancybox
	wp_register_script('fancybox2', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.js', NULL, '2.1.4');

	//Flexslider
	wp_register_script('flexslider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', NULL, '2.5.0');

	//Sticky (menu)
	wp_register_script('sticky', get_stylesheet_directory_uri().'/js/jquery.sticky.js');

	//Google Map
	wp_register_script('google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
	wp_register_script('acf-map', get_stylesheet_directory_uri().'/js/acf-map.js');

	//jQuery UI
	wp_register_script('jquery-ui', '//code.jquery.com/ui/1.11.4/jquery-ui.js');

	//Theme Functions
	wp_register_script('functions', get_stylesheet_directory_uri() . '/js/functions.js');

//enqueue scripts
	wp_enqueue_script(array('jquery','bootstrap','fancybox2','functions'));

	//styles
	//Bootstrap Core CSS
	wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', NULL, '3.3.4');

	//Custom Fonts
	//wp_register_style('font-awesome', get_stylesheet_directory_uri().'/font-awesome/css/font-awesome.min.css');

	wp_register_style('fancybox2', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.css', NULL, '2.1.4');

	//Theme stylesheet
	wp_register_style('styles', get_stylesheet_uri());


//enqueue styles
	wp_enqueue_style(array('bootstrap','fancybox2','styles'));




//home
if (is_front_page() || is_home()){
	wp_enqueue_script('jquery-ui');
}

}