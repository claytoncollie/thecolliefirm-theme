<?php

/**
 * Add columns for custom post type - post
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.sheleymarketing.com
 * @since      1.0.0

**/

// Set or unset columns
add_filter( 'manage_posts_columns', 'sm_set_custom_edit_post_columns' );
function sm_set_custom_edit_post_columns($columns) {
	
    $columns['featured_image'] = __( 'Image', 'sm' );

    return $columns;
}

// Call functions on certain columns
add_action( 'manage_posts_custom_column' , 'sm_custom_post_column', 10, 2 );
function sm_custom_post_column( $column, $post_id ) {
    
    global $post;

    switch ( $column ) {

        case 'featured_image' :
		
            echo get_the_post_thumbnail( $post_id , array( 75, 75 ) );
            
            break;
			
    }
}