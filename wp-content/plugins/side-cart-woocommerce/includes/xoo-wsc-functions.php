<?php


function xoo_wsc_notice_html( $message, $notice_type = 'success' ){
	
	$classes = $notice_type === 'error' ? 'xoo-wsc-notice-error' : 'xoo-wsc-notice-success';

	$icon = $notice_type === 'error' ? 'xoo-wsc-icon-cross' : 'xoo-wsc-icon-check_circle';
	
	$html = '<li class="'.$classes.'"><span class="'.$icon.'"></span>'.$message.'</li>';
	
	return apply_filters( 'xoo_wsc_notice_html', $html, $message, $notice_type );
}


//Divi builder fix
function xoo_wsc_fix_for_divi_builder(){

	if ( isset( $_GET['et_fb'] ) && function_exists('xoo_wsc_frontend') ){
		remove_action( 'wp_footer', array( xoo_wsc_frontend(), 'cart_markup' ) );
		add_action( 'wp_head', array( xoo_wsc_frontend(), 'cart_markup' ), 15 );
	}

}
add_action( 'wp_head', 'xoo_wsc_fix_for_divi_builder'  );


/* Block theme fix */
add_action( 'wp_enqueue_scripts', function(){
	if( !function_exists('wc_current_theme_is_fse_theme') || !wc_current_theme_is_fse_theme() ) return;
	wp_enqueue_script( 'wc-cart-fragments' );
}, PHP_INT_MAX );

?>