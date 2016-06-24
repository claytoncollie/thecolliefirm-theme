<?php
/**
 * Customize the footer
 *
 * @author Clayton Collie of Sheley Marketing
 * @link http://www.sheleymarketing.com
 *
 */
add_filter( 'genesis_footer_output', 'sm_footer_creds_filter' );
function sm_footer_creds_filter( $creds ) {
	
	$creds = '[footer_copyright] All Rights Reserved';
	$site_title = get_bloginfo('name');
	$made_by = '<a target="_blank" href="http://sheleymarketing.com/hello">Made by Sheley Marketing</a>';
	$login = do_shortcode( '[footer_loginout]' );
	
	return '<div class="credits"><span class="copyright">'.$creds.'</span><span class="title">'.$site_title.'</span><span class="login">'.$login.'</span></div><div class="made-by">'.$made_by.'</div>';
}


