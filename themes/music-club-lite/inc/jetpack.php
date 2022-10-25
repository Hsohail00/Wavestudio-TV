<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Music Club Lite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function music_club_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'sitefixer' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'music_club_lite_jetpack_setup' );
