<?php
/**
 * Home Page Options.
 *
 * @package Loud Music
 */

$default = loud_music_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'loud-music' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/slider.php';
require get_template_directory() . '/inc/customizer/home-sections/our-services.php';
require get_template_directory() . '/inc/customizer/home-sections/about-us.php';
require get_template_directory() . '/inc/customizer/home-sections/latest-albums.php';
require get_template_directory() . '/inc/customizer/home-sections/cta.php';
require get_template_directory() . '/inc/customizer/home-sections/blog.php';

