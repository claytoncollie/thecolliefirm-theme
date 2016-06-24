<?php
/**
 * Add mime type for vcard
 *
 * @author Clayton Collie of Sheley Marketing
 * @link http://www.sheleymarketing.com
 *
 */ 
add_filter('upload_mimes', 'sm_custom_upload_mimes');
function sm_custom_upload_mimes ( $existing_mimes=array() ) {

	$existing_mimes['vcf'] = 'text/x-vcard';
	
	return $existing_mimes;
}