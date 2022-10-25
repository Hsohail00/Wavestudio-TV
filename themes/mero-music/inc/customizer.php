<?php
/**
 * Mero Music Theme Customizer
 *
 * @package mero_music
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mero_music_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load sanitize functions.
	include get_template_directory() . '/inc/sanitize.php';

	include get_template_directory() . '/inc/upsell/upsell-section.php';

	// Load theme options.
	include get_template_directory() . '/inc/customizer/theme-options.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'mero_music_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'mero_music_customize_partial_blogdescription',
		) );
	}

	$wp_customize->register_section_type( 'mero_music_Customize_Upsell_Section' );

	// Register section.
	$wp_customize->add_section(
		new mero_music_Customize_Upsell_Section(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Mero Music Pro', 'mero-music' ),
				'pro_text' => esc_html__( 'Buy Pro', 'mero-music' ),
				'pro_url'  => 'https://kantipurthemes.com/downloads/mero-music-pro/',
				'priority' => 10,
			)
		)
	);
}
add_action( 'customize_register', 'mero_music_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mero_music_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mero_music_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mero_music_customize_preview_js() {
	wp_enqueue_script( 'mero-music-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mero_music_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function mero_music_customizer_control_scripts() {

	wp_enqueue_style( 'mero-music-customize-controls', get_template_directory_uri() . '/assets/css/customize-controls.css', '', '1.0.0' );

	wp_enqueue_script( 'mero-music-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'mero_music_customizer_control_scripts', 0 );