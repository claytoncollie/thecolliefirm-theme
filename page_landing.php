<?php
/**
 * Template Name: Landing
 *
 * @author Clayton Collie of Sheley Marketing
 * @package The Collie Firm Theme
 */

//* Add custom body class to the head
add_filter( 'body_class', 'collie_add_body_class' );
function collie_add_body_class( $classes ) {
   $classes[] = 'landing';
   return $classes;
}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Run the Genesis loop
genesis();