<?php

/**
 * Add columns for custom post type - page
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.sheleymarketing.com
 * @since      1.0.0

**/

// Set or unset columns
add_filter( 'manage_page_posts_columns', 'sm_set_custom_edit_page_columns' );
function sm_set_custom_edit_page_columns($columns) {
    $columns['featured_image'] = __( 'Featured Image', 'collie' );
    return $columns;
}

// Call functions on certain columns
add_action( 'manage_page_posts_custom_column' , 'sm_custom_page_column', 10, 2 );
function sm_custom_page_column( $column, $post_id ) {
    
    global $post;

    switch ( $column ) {

        case 'featured_image' :
		
            if( has_post_thumbnail($post_id) ) {
                echo get_the_post_thumbnail( $post_id , 'thumbnail' );
            }
            
        break;			
    }
}