<?php
/**
 * Default theme options.
 *
 * @package Loud Music
 */

if ( ! function_exists( 'loud_music_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function loud_music_get_default_theme_options() {

	$defaults = array();

	// Top Bar
	$defaults['show_header_contact_info'] 		= false;
    $defaults['show_header_social_links'] 		= false;
    $defaults['header_social_links']			= array();

    // Homepage Options
	$defaults['enable_frontpage_content'] 		= false;

	// Featured Slider Section
	$defaults['enable_featured_slider']			= false;
	$defaults['number_of_slider_items']			= 3;
	$defaults['slider_content_type']			= 'slider_page';

	// Our Services Section
	$defaults['enable_our_services_section']	= false;
	$defaults['number_of_items']				= 3;
	$defaults['services_content_type']			= 'services_page';

	// About Us Section
	$defaults['enable_about_us_section']		= false;
	$defaults['about_us_content_type']			= 'about_us_page';

	// Latest albums Section	
	$defaults['enable_latest_albums_section']	= false;
	$defaults['latest_albums_section_title']	= esc_html__( 'Latest Albums', 'loud-music' );
	$defaults['number_of_cs_items']				= 3;
	$defaults['cs_content_type']				= 'cs_page';

	// Cta Section	
	$defaults['enable_cta_section']	   			= false;
	$defaults['background_cta_section']			= esc_url(get_template_directory_uri()) .'/assets/images/default-header.jpg';
	$defaults['cta_description']	   	 		= esc_html__( 'Small hours of the morning', 'loud-music' );
	$defaults['cta_button_label']	   	 		= esc_html__( 'Buy Ticket Now', 'loud-music' );
	$defaults['cta_button_url']	   	 			= '#';

	// Blog Section
	$defaults['enable_blog_section']			= false;
	$defaults['blog_section_title']				= esc_html__( 'Latest News', 'loud-music' );
	$defaults['blog_category']	   				= 0; 
	$defaults['blog_number']					= 3;	

	//General Section
	$defaults['readmore_text']					= esc_html__('Read More','loud-music');
	$defaults['your_latest_posts_title']		= esc_html__('Blog','loud-music');
	$defaults['excerpt_length']					= 20;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'no-sidebar';
	$defaults['layout_options_page']			= 'no-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'loud-music' );

	// Pass through filter.
	$defaults = apply_filters( 'loud_music_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'loud_music_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function loud_music_get_option( $key ) {

		$default_options = loud_music_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;