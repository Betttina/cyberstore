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





/* to get product images for email */
/**
 * @snippet       Product Thumbnails @ WooCommerce Order Emails
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @community     https://businessbloomer.com/club/
 */

add_filter( 'woocommerce_email_order_items_args', 'bbloomer_order_with_product_images', 9999 );

function bbloomer_order_with_product_images( $args ) {
	$args['show_image'] = true;
	return $args;
}