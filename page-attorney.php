<?php
/*
Template Name: Attorney
*/
add_action( 'genesis_meta', 'collie_page_attorney_genesis_meta' );
function collie_page_attorney_genesis_meta() {
		
		// Force Sidebar-Content Layout
		add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

		// Schema
		add_filter( 'genesis_attr_body', 'sm_schema_person', 20 );
	    add_filter( 'genesis_attr_entry', 'sm_schema_person', 20 );
	    add_filter( 'genesis_attr_entry-title', 'sm_itemprop_name', 20 );
	    add_filter( 'genesis_attr_entry-content', 'sm_itemprop_description', 20 );
	    add_filter( 'genesis_post_title_output', 'sm_title_link_schema', 20 );
	    add_filter( 'genesis_attr_content', 'sm_schema_empty', 20 );
		
}

//* Run the Genesis loop
genesis();