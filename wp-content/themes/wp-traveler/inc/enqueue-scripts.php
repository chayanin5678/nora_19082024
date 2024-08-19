<?php
/**
 * wp-traveler WordPress Theme, ordasvit.com
 * wp-traveler is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

/**
 * Header scripts for this theme
 *
 * @package WordPress
 * @subpackage wp_traveler
 */


function wp_traveler_rigistre_scripts()
{
	$os_uri = get_template_directory_uri();

	wp_register_script('wp_traveler_spincrement_script', $os_uri . '/js/spincrement.js', array('jquery') , false);
	wp_enqueue_script('wp_traveler_spincrement_script');

	wp_register_script('wp_traveler_custom_script', $os_uri . '/js/custom.js', array('jquery') , false);
	wp_enqueue_script('wp_traveler_custom_script');

	wp_register_script('wp_traveler_bootstrap_script', $os_uri . '/bootstrap/js/bootstrap.js', false);
	wp_enqueue_script('wp_traveler_bootstrap_script');

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

}
add_action('wp_enqueue_scripts', 'wp_traveler_rigistre_scripts');