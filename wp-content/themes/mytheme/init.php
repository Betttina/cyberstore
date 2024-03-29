<?php

function mytheme_enqueue(){

	$theme_directory = get_template_directory_uri();
	wp_enqueue_style("mystyle", $theme_directory . "/resources/styles/app.scss");
	wp_enqueue_script("app", $theme_directory . "/resources/scripts/app.js");

}

add_action('wp_enqueue_scripts', 'mytheme_enqueue');



function mytheme_init(){
	$menu = array(
		'primary_menu' => 'primary_menu',
		'secondary_menu' => 'secondary_menu',
		'footer_service' => 'footer_service',
		'footer_buyer' => 'footer_buyer',
		'footer_social' => 'footer_social'
	);
	register_nav_menus($menu);
}

add_action('after_setup_theme', 'mytheme_init');