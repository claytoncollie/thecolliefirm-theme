<?php
/**
 * This file adds the Home Page to the The Collie Firm Theme.
 *
 * @author Clayton Collie of Sheley Marketing
 * @package The Collie Firm Theme
 */

add_action( 'genesis_meta', 'collie_home_genesis_meta' );
function collie_home_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-bottom' ) ) {

		//* Force full-width-content layout setting
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home top widgets
		add_action( 'genesis_after_header', 'collie_home_top_widgets' );
		
		//* Add home bottom widgets
		add_action( 'genesis_loop', 'collie_home_bottom_widgets' );

	}
}

function collie_home_top_widgets() {
	if( is_active_sidebar('home-top') ) {
		genesis_widget_area( 'home-top', array(
			'before' => '<div class="home-top widget-area">',
			'after'  => '</div>',
		) );
	}	
}

function collie_home_bottom_widgets() {
	if( is_active_sidebar('home-bottom') ) {
		genesis_widget_area( 'home-bottom', array(
			'before' => '<div class="home-bottom widget-area">',
			'after'  => '</div>',
		) );
	}
}

genesis();