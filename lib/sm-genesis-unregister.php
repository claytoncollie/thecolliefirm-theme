<?php
/**
 * Unregister certain genesis defaults
 *
 * @author Clayton Collie of Sheley Marketing
 * @link http://www.sheleymarketing.com
 *
 */
//Remove Genesis User meta fields
add_action( 'admin_init', 'sm_genesis_remove_user_profile_fields' );
function sm_genesis_remove_user_profile_fields() {
    remove_action( 'show_user_profile', 'genesis_user_options_fields' );
    remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
    remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
    remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
    remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
    remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );
    remove_action( 'show_user_profile', 'genesis_user_layout_fields' );
    remove_action( 'edit_user_profile', 'genesis_user_layout_fields' );
}

 
//Remove genesis script support
remove_post_type_support( 'post', 'genesis-scripts' );	// Posts
remove_post_type_support( 'page', 'genesis-scripts' );	// Pages

//* Remove Genesis in-post SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );

//* Remove Genesis Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );

//* Unregister content/sidebar layout setting
//genesis_unregister_layout( 'content-sidebar' );

//* Unregister sidebar/content layout setting
//genesis_unregister_layout( 'sidebar-content' );

//* Unregister content/sidebar/sidebar layout setting
genesis_unregister_layout( 'content-sidebar-sidebar' );

//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Unregister full-width content layout setting
//* genesis_unregister_layout( 'full-width-content' );

// Remove Genesis Page Templates
add_filter( 'theme_page_templates', 'sm_remove_genesis_page_templates' );
function sm_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}

//* Remove the edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );

//* Unregister primary sidebar
//unregister_sidebar( 'sidebar' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Unregister the header right widget area
unregister_sidebar( 'header-right' );

//* Unregister secondary navigation menu
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );

//* Unregister primary navigation menu
//add_theme_support( 'genesis-menus', array( 'secondary' => __( 'Secondary Navigation Menu', 'genesis' ) ) );