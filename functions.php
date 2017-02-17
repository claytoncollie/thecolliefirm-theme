<?php
/**
 * This file adds the Front Page to the The Collie Firm Theme.
 *
 * @author Clayton Collie of Sheley Marketing
 * @package The Collie Firm Theme
 * @subpackage Customizations
 */


//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'collie', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'collie' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'The Collie Firm Theme', 'collie' ) );
define( 'CHILD_THEME_URL', 'http://www.thecolliefirm.com' );
define( 'CHILD_THEME_VERSION', '1.0.1' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'collie_load_scripts' );
function collie_load_scripts() {

	wp_enqueue_script( 'collie-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,700', array(), CHILD_THEME_VERSION );
	
}

//* Force full-width-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add new image sizes
add_image_size( 'home-top', 750, 600, TRUE );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'height'          => 180,
	'width'           => 1062,
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer',
) );

// Formating for blog home, post, and archive pages all associated with posts post type
add_action('genesis_meta','collie_blog_single_post');

// Add fatured image a fter header on pages that has post thumbnail
add_action('genesis_after_header','collie_featured_image');

//* Remove the entry footer markup (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add home top widgets
add_action( 'genesis_header', 'collie_utility_bar_widget', 6 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'utility-bar',
	'name'        => __( 'Utility Bar', 'collie' ),
	'description' => __( 'Above site-header to show contact information', 'collie' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-top',
	'name'        => __( 'Home - Top', 'collie' ),
	'description' => __( 'This is the top section of the homepage.', 'collie' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom',
	'name'        => __( 'Home - Bottom', 'collie' ),
	'description' => __( 'This is the bottom section of the homepage.', 'collie' ),
) );


//* Custom functions
//------------------------------------------------------------------------------------------------------

//* Footer
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/sm-footer.php' );

//* vCard mime type
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/sm-vcard-mime-type.php' );

//* Remove Genesis specific functions
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/sm-genesis-unregister.php' );

//* Schema helper functions
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/genesis-schema-helper.php' );

//* Post admin columns
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/sm-columns-post.php' );

//* Page admin columns
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/sm-columns-page.php' );

//* Custom widget for contact info with attorney schema
require_once( trailingslashit( get_stylesheet_directory() ) . '/lib/widget-contact.php' );

//--------------------------------------------------------------------------------------

function collie_utility_bar_widget() {

	genesis_widget_area( 'utility-bar', array(
		'before' => '<div class="utility-bar">',
		'after'  => '</div>',
	) );
	
}

function collie_blog_single_post() {
	if( is_home() || is_singular('post') || is_archive() ) {
		//* Force content-sidebar layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
	}
}

//* Customize the post info function
add_filter( 'genesis_post_info', 'collie_post_info_filter' );
function collie_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link] [post_categories before="in "]';
	return $post_info;
}

function collie_featured_image() {
	if( is_singular('page') && has_post_thumbnail() ) {
		echo '<div class="featured-image"><div class="wrap">'.get_the_post_thumbnail(get_the_ID(), 'collie_banner').'</div></div>';
	}
}