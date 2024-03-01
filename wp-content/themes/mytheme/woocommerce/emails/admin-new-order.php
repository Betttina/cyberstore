<?php

/**
 * Admin new order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-new-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates\Emails\HTML
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked WC_Emails::email_header() Output the email header
 */


?>
<?php /* translators: %s: Customer billing full name */ ?>
    <h1 style="font-size:3rem;color:#000000; font-family:Calibri,sans-serif;">Order confirmation</h1>
    <p><?php printf( esc_html__( 'You’ve received the following order from %s:', 'woocommerce' ),
			$order->get_formatted_billing_full_name() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            $order->get_order_number(); ?></p>


<div style="background-color:#EDEDED;height:100vh; border-radius: 9px; align-items: center;
    justify-content: center;">
	<h1 style="color:#434649;">
		<?php
 printf( esc_html__( 'You’ve received the following order from Cyber Store AB %s:', 'woocommerce' ),
			$order->get_billing_country() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            $order->get_shipping_first_name();
		    $order->get_billing_email();
?>
	</h1>
    <div style="width:auto; height:7rem; background-color: #353535; border-radius:9px; margin-left:3rem;  "><img
                src="<?php echo
        get_template_directory_uri();
	    ?>/resources/images/image%201.png" alt="white-logo" style="margin: 2rem 0 2rem 0;">



        <div style="width:36rem; height: 40rem; background-color: #FFFFFE; border-style: dashed; border-radius: 9px;
        align-items: center; --navigation-layout-wrap justify-content: center;">
            <?php do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email ); ?>

        </div>


        <div style="width: auto; height: 5rem; background-color: pink;">
          <?php  do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email ); ?>
        </div>

        <div style=" width: auto; height: 5rem; background-color: #3d4145">
          <?php  do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email ); ?>
        </div>

    </div>


</div>


<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */


/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */


/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */


/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
