<?php
/**
 * Album options
 *
 * @package Blakely_Light
 */

/**
 * Add album content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blakely_album_options( $wp_customize ) {

	$wp_customize->add_section( 'blakely_album', array(
			'title' => esc_html__( 'Album', 'blakely-light' ),
			'panel' => 'blakely_theme_options',
		)
	);

	// Add color scheme setting and control.
	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_album_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'blakely_sanitize_select',
			'choices'           => blakely_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'blakely-light' ),
			'section'           => 'blakely_album',
			'type'              => 'select',
		)
	);

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_album_section_image',
			'sanitize_callback' => 'blakely_sanitize_image',
			'custom_control'    => 'WP_Customize_Image_Control',
			'active_callback'   => 'blakely_is_album_active',
			'label'             => esc_html__( 'Background Image', 'blakely-light' ),
			'section'           => 'blakely_album',
		)
	);

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_album_title',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'blakely_is_album_active',
			'label'             => esc_html__( 'Headline', 'blakely-light' ),
			'section'           => 'blakely_album',
			'type'              => 'text',
		)
	);

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_album_description',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'blakely_is_album_active',
			'label'             => esc_html__( 'Sub Headline', 'blakely-light' ),
			'section'           => 'blakely_album',
			'type'              => 'textarea',
		)
	);

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_album_number',
			'default'           => 3,
			'sanitize_callback' => 'blakely_sanitize_number_range',
			'active_callback'   => 'blakely_is_album_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Items is changed', 'blakely-light' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of Items', 'blakely-light' ),
			'section'           => 'blakely_album',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	$number = get_theme_mod( 'blakely_album_number', 3 );

	//loop for album post content
	for ( $i = 1; $i <= $number ; $i++ ) {

		blakely_register_option( $wp_customize, array(
				'name'              => 'blakely_album_page_' . $i,
				'sanitize_callback' => 'blakely_sanitize_post',
				'active_callback'   => 'blakely_is_album_active',
				'label'             => esc_html__( 'Album Page', 'blakely-light' ) . ' ' . $i ,
				'section'           => 'blakely_album',
				'type'              => 'dropdown-pages',
			)
		);

	} // End for().

}
add_action( 'customize_register', 'blakely_album_options', 10 );

/** Active Callback Functions **/
if ( ! function_exists( 'blakely_is_album_active' ) ) :
	/**
	* Return true if album content is active
	*
	* @since 1.0
	*/
	function blakely_is_album_active( $control ) {
		$enable = $control->manager->get_setting( 'blakely_album_option' )->value();

		//return true only if previewed page on customizer matches the type of content option selected
		return ( blakely_check_section( $enable ) );
	}
endif;
