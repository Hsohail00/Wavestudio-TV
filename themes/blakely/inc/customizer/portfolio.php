<?php
/**
 * Add Portfolio Settings in Customizer
 *
 * @package Blakely
 */

/**
 * Add portfolio options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blakely_portfolio_options( $wp_customize ) {
	// Add note to Jetpack Portfolio Section
	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_jetpack_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Blakely_Note_Control',
			'label'             => sprintf( esc_html__( 'For Portfolio Options for Blakely Theme, go %1$shere%2$s', 'blakely' ),
				 '<a href="javascript:wp.customize.section( \'blakely_portfolio\' ).focus();">',
				 '</a>'
			),
			'section'           => 'jetpack_portfolio',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	$wp_customize->add_section( 'blakely_portfolio', array(
			'panel'    => 'blakely_theme_options',
			'title'    => esc_html__( 'Portfolio', 'blakely' ),
		)
	);

	
	$action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    blakely_register_option( $wp_customize, array(
            'name'              => 'blakely_portfolio_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Blakely_Note_Control',
          	'active_callback'   => 'blakely_is_ect_portfolio_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Portfolio, install %1$sEssential Content Types%2$s Plugin with Portfolio Type Enabled', 'blakely' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'blakely_portfolio',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_portfolio_option',
			'default'           => 'disabled',
			'active_callback'   => 'blakely_is_ect_portfolio_active',
			'sanitize_callback' => 'blakely_sanitize_select',
			'choices'           => blakely_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'blakely' ),
			'section'           => 'blakely_portfolio',
			'type'              => 'select',
		)
	);

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Blakely_Note_Control',
			'active_callback'   => 'blakely_is_portfolio_active',
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'blakely' ),
				 '<a href="javascript:wp.customize.control( \'jetpack_portfolio_title\' ).focus();">',
				 '</a>'
			),
			'section'           => 'blakely_portfolio',
			'type'              => 'description',
		)
	);

	blakely_register_option( $wp_customize, array(
			'name'              => 'blakely_portfolio_number',
			'default'           => 6,
			'sanitize_callback' => 'blakely_sanitize_number_range',
			'active_callback'   => 'blakely_is_portfolio_active',
			'label'             => esc_html__( 'Number of items to show', 'blakely' ),
			'section'           => 'blakely_portfolio',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
		);

	$number = get_theme_mod( 'blakely_portfolio_number', 6 );

	for ( $i = 1; $i <= $number ; $i++ ) {
		//for CPT
		blakely_register_option( $wp_customize, array(
				'name'              => 'blakely_portfolio_cpt_' . $i,
				'sanitize_callback' => 'blakely_sanitize_post',
				'active_callback'   => 'blakely_is_portfolio_active',
				'label'             => esc_html__( 'Portfolio', 'blakely' ) . ' ' . $i ,
				'section'           => 'blakely_portfolio',
				'type'              => 'select',
				'choices'           => blakely_generate_post_array( 'jetpack-portfolio' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'blakely_portfolio_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'blakely_is_portfolio_active' ) ) :
	/**
	* Return true if portfolio is active
	*
	* @since Blakely 1.0
	*/
	function blakely_is_portfolio_active( $control ) {
		$enable = $control->manager->get_setting( 'blakely_portfolio_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( blakely_is_ect_portfolio_active( $control ) && blakely_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'blakely_is_ect_portfolio_inactive' ) ) :
    /**
    *
    * @since Blakely 1.0
    */
    function blakely_is_ect_portfolio_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;

if ( ! function_exists( 'blakely_is_ect_portfolio_active' ) ) :
    /**
    *
    * @since Blakely 1.0
    */
    function blakely_is_ect_portfolio_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;