<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if (!defined('ABSPATH')) {
	exit;
}

// Get order billing first name
$billing_first_name = $order->get_billing_first_name();

// Get order number
$order_number = $order->get_order_number();

// Get order date
$order_date = $order->get_date_created()->format('F j, Y');

// Get order items
$order_items = $order->get_items();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Your Order Update</title>
    <style>
        /* Styles for the email container */
        .email-container {
            font-family: Calibri, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            color: #333;
        }

        /* Styles for the main content area */
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 9px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Heading styles */
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Text styles */
        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        /* Order details styles */
        .order-details {
            margin-top: 20px;
        }

        /* Order number styles */
        .order-number {
            font-weight: bold;
        }

        .footer-div{
            background-color:black;
        }

        /* Footer styles */
        .footer {
            color: #999;
            font-size: 14px;
        }

        .contact-font {
            font-family: Roboto, sans-serif;
            font-style: italic;
            text-align: center;
            color: rgb(111,111,111);
        }


        /* Order details styles */
        .order-details {
            margin-top: 20px;
        }

        /* Order number styles */
        .order-number {
            font-weight: bold;
        }


        /* Product image styles */
        .product-image {
            max-width: 100px;
            margin-right: 10px;
        }


        .social-buttons {
            margin: auto;
            font-size: 0;
            text-align: center;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .social-button {
            display: inline-block;
            background-color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            margin: 0 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
            opacity: .99;
            border-radius: 50%;
            box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.05);
            -webkit-transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
            transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
        }
        .social-button:before {
            content: '';
            background-color: #000;
            width: 120%;
            height: 120%;
            position: absolute;
            top: 90%;
            left: -110%;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
            transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
        }
        .social-button .fa {
            font-size: 38px;
            vertical-align: middle;
            -webkit-transform: scale(0.8);
            transform: scale(0.8);
            -webkit-transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
            transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
        }
        /* //Facbook */
        .social-button.facebook:before {
            background-color: #3B5998;
        }
        .social-button.facebook .fa {
            color: #3B5998;
        }

        /* //Twitter */
        .social-button.twitter:before {
            background-color: #55acee;
        }
        .social-button.twitter .fa {
            color: #55acee;
        }

        /* //Google Plus */
        .social-button.google:before {
            background-color: #53ccff;
        }
        .social-button.google .fa {
            color: #dd4b39;
        }

        .social-button:focus:before, .social-button:hover:before {
            top: -10%;
            left: -10%;
        }
        .social-button:focus .fa, .social-button:hover .fa {
            color: #fff;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

    </style>
</head>
<body>

<!-- Email container -->
<div class="email-container">
    <!-- Content -->
    <div class="content">
        <!-- Greeting -->
        <h1>Hello, <?php echo esc_html($billing_first_name); ?></h1>
        <!-- Order details -->
        <div class="order-details">
            <p>We've received your order #<span class="order-number"><?php echo esc_html($order_number); ?></span> and it is now being processed.</p>
            <p>Order Date: <?php echo esc_html($order_date); ?></p>
            <!-- Product details -->

	        <?php if (!empty($order_items)) : ?>
                <h2>Ordered Items:</h2>
                <ul>
			        <?php foreach ($order_items as $item_id => $item) :
				        $product = $item->get_product();
				        $product_id = $product->get_id();
				        $product_image_id = $product->get_image_id();
				        $product_image_url = wp_get_attachment_image_url($product_image_id, 'full');
				        $product_name = $product->get_name();
				        ?>
                        <li>
                            <!-- Display the product image -->
					        <?php if ($product_image_url) : ?>
                                <img src="<?php echo esc_url($product_image_url); ?>" alt="<?php echo esc_attr($product_name); ?>" class="product-image">
					        <?php endif; ?>
                            <!-- Display the product name -->
					        <?php echo esc_html($product_name); ?>
                        </li>
			        <?php endforeach; ?>
                </ul>
	        <?php endif; ?>


        </div>
    </div>
    <!-- Footer -->
    <footer>
    <div class="footer-div">
    <p class="footer">Thank you for shopping with us! Cyber store</p>
        <img
                src="<?php echo
			    get_template_directory_uri();
			    ?>/resources/images/image%201.png" alt="white-logo" style="margin: 2rem 0 2rem 0;">
    </div>
    </footer>
</div>




        <div>
            <h3 class="contact-font">Stay in touch<h3>

                    <div class="social-buttons">
                        <a class="social-button facebook" href="#">
                            <i class="fa fa-facebook">
                            </i>
                        </a>

                        <a class="social-button twitter" href="#">
                            <i class="fa fa-twitter">
                            </i>
                        </a>

                        <a class="social-button google" href="#">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>

                    <p class="p-footer">Email sent by cyberstore.com <br>
                        Copyright © 2024 Cyber Store AB. All rights reserved</p>
        </div>

    </footer>
</div>
</body>
</html>
