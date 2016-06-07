<?php
/**
 * This file adds the Home Page to the The Collie Firm Theme.
 *
 * @author Clayton Collie of Sheley Marketing
 * @package The Collie Firm Theme
 * @subpackage Customizations
 */

add_action( 'genesis_meta', 'collie_home_genesis_meta' );
function collie_home_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-bottom' ) ) {

		//* Force full-width-content layout setting
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Add collie-pro-home body class
		add_filter( 'body_class', 'collie_body_class' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home top widgets
		add_action( 'genesis_after_header', 'collie_home_top_widgets' );
		
		//* Add home bottom widgets
		add_action( 'genesis_loop', 'collie_home_bottom_widgets' );

	}
}

function collie_body_class( $classes ) {

		$classes[] = 'collie-home';
		return $classes;
		
}

function collie_home_top_widgets() {

	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	
}

function collie_home_bottom_widgets() {
	
	genesis_widget_area( 'home-bottom', array(
		'before' => '<div class="home-bottom widget-area">',
		'after'  => '</div>',
	) );

}

genesis();
