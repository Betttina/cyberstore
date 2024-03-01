<?php


add_filter( 'woocommerce_email_body_content', 'custom_email_body_content', 10, 3 );
function custom_email_body_content( $content, $email, $email_object ) {
	// Hämta ordernummer från e-postobjektet
	$order_number = $email_object->get_order()->get_order_number();

	// Anpassa innehållet med HTML och CSS-styling
	$custom_content = '<div style="background-color: #78c5c0; padding: 20px;">';
	$custom_content .= '<p style="font-size: 16px; color: #000000;">Tack för din beställning!</p>';
	$custom_content .= '<p style="font-size: 14px; color: #3e4e88;">Din order med ordernummer <strong>' . $order_number . '</strong> är nu under behandling.</p>';
	$custom_content .= '<p style="font-size: 14px; color: #362c83;">Vi kommer att uppdatera dig så snart din order har skickats.</p>';
	$custom_content .= '</div>';

	// Returnera det anpassade innehållet
	return $custom_content;
}


add_action( 'woocommerce_email_header', 'custom_email_header_style' );
function custom_email_header_style() {
	?>
	<style type="text/css">
        /* Anpassa utseendet på WooCommerce e-postmallens headerbild */
        #template_header_image img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
	        background-color: pink;
        }
	</style>
	<?php
}

/**
 * Add custom styling or content to the WooCommerce email header.
 */
function custom_email_header_content( $email_heading, $email ) {

	echo '<div style="background-color: background: #EDEDED; padding: 20px; text-align: center; border-radius: 7px; ">';
	echo '<h2 style="color: #333333;">' . esc_html( $email_heading ) . '</h2>';
	echo '</div>';
}
add_action( 'woocommerce_email_header', 'custom_email_header_content', 10, 2 );


/**
 * Add custom styling to the WooCommerce email order details.
 */
function custom_email_order_details_styling( $order, $sent_to_admin, $plain_text, $email ) {
	// Lägg till anpassad CSS-styling här
	if ( ! $plain_text ) {
		echo '<div style="background-color: #ffffff; border: 1px solid #e6e6e6; padding: 20px; margin-bottom: 20px;">';
		echo '<h2 style="color: #333333; margin-bottom: 10px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">Order Details</h2>';
		echo '</div>';
	}
}
add_action( 'woocommerce_email_order_details', 'custom_email_order_details_styling', 10, 4 );


add_filter( 'woocommerce_email_styles', 'custom_woocommerce_email_styles' );

function custom_woocommerce_email_styles( $css ) {
	$custom_css = "
        /* Add your custom CSS styles here */
        .woocommerce_email {
            background-color: red;
        }
        .woocommerce_email p {
            color: blue;
        }
    ";

	return $css . $custom_css;
}

