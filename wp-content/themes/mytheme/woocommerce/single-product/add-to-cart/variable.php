<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
$image_url = get_template_directory_uri() . '/assets/images/brons.png';

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

    <form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
		<?php do_action( 'woocommerce_before_variations_form' ); ?>

		<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
            <p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
		<?php else : ?>
            <div class="variations">
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
                    <div class="variation">
                        <h2 class="label"><?php echo wc_attribute_label( $attribute_name ); ?></h2>
                        <div class="toggle-buttons">
							<?php foreach ( $options as $option ) : ?>
								<?php
								// images for color options
								$image_url = '';

								if ( 'Gold' === $option ) {
									$image_url = get_template_directory_uri() . '/assets/images/gold.png';
								} elseif ( 'Silver' === $option ) {
									$image_url = get_template_directory_uri() . '/assets/images/silver.png';
								} elseif ( 'Bronze' === $option ) {
									$image_url = get_template_directory_uri() . '/assets/images/brons.png';
								}
								?>

                                <button class="toggle-button" data-variation="<?php echo esc_attr( $option ); ?>">
									<?php if ( empty( $image_url ) ) : ?>
										<?php echo esc_html( $option ); ?>
									<?php else : ?>
                                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $option ); ?>" />
									<?php endif; ?>
                                </button>
							<?php endforeach; ?>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>


			<?php do_action( 'woocommerce_after_variations_table' ); ?>

            <div class="single_variation_wrap">
				<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
				?>
            </div>
		<?php endif; ?>

		<?php do_action( 'woocommerce_after_variations_form' ); ?>
    </form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
