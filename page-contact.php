<?php
/**
 * Template Name: Contact
 *
 *
 * @author Clayton Collie of Sheley Marketing
 * @package The Collie Firm Theme
*/
		
// Force Sidebar-Content Layout
add_filter( 'genesis_site_layout', '__genesis_return_sidebar_content' );

// Schema
add_filter( 'genesis_attr_body', 'sm_schema_office', 20 );
add_filter( 'genesis_attr_entry', 'sm_schema_office', 20 );
add_filter( 'genesis_attr_entry-title', 'sm_itemprop_name', 20 );
add_filter( 'genesis_attr_entry-content', 'sm_itemprop_description', 20 );
add_filter( 'genesis_post_title_output', 'sm_title_link_schema', 20 );
add_filter( 'genesis_attr_content', 'sm_schema_empty', 20 );
	
// Add map to contact page right below the navigation menu
add_action( 'genesis_after_header', 'collie_google_maps', 15);
function collie_google_maps() { 

	?>

    <div class="map">
        <div id="map_leeds" style="width: 100%; height: 400px">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.8165152363777!2d-96.802944084391!3d32.79712409026633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e992fd50c69f9%3A0x9557fe7ad6449729!2sThe+Collie+Firm%2C+PLLC!5e0!3m2!1sen!2sus!4v1466789929618" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>          
    </div>
        
	<?php 

}

//* Run the Genesis loop
genesis();