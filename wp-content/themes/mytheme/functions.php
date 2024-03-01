<?php

require_once("Vite.php");
require_once("init.php");
require_once("email.php");
require_once("social_media.php");


/* Font Awesome icons */
function enqueue_font_awesome() {
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v6.5.1/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );

function mytheme_section_setting($args){
	$option_name = $args["option_name"];
	$option_type = $args["option_type"];
	$option_value = get_option($args["option_name"]);
	echo '<input type="' . $option_type . '" id="' . $option_name . '" name="' . $option_name . '" value="'. $option_value .'"/>';

}