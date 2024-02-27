<?php

/*
Template Name: Alla produkter
*/

get_header();

echo '<div class="product-list">';

// Hämta alla produkter
$args     = array(
	'post_type'      => 'product',
	'posts_per_page' => - 1 // Visa alla produkter
);
$products = new WP_Query( $args );

// Loopa igenom produkterna
if ( $products->have_posts() ) :
	while ( $products->have_posts() ) : $products->the_post();
		wc_get_template_part( 'content', 'product' ); // Visa produktens innehåll
	endwhile;
else :
	echo __( 'Inga produkter hittades', 'textdomain' );
endif;

echo '</div>';

get_footer();
