<?php
/**
 * Our Services options.
 *
 * @package Loud Music
 */

$default = loud_music_get_default_theme_options();

// Add Our Services Section
$wp_customize->add_section( 'section_our_services',
	array(
		'title'      => __( 'Our Services', 'loud-music' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Enable Our Services Section
$wp_customize->add_setting('theme_options[enable_our_services_section]', 
	array(
	'default' 			=> $default['enable_our_services_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'loud_music_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_our_services_section]', 
	array(		
	'label' 	=> __('Enable Our Services Section', 'loud-music'),
	'section' 	=> 'section_our_services',
	'settings'  => 'theme_options[enable_our_services_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_items]', 
	array(
	'default' 			=> $default['number_of_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_items]', 
	array(
	'label'       => __('Number Of Items', 'loud-music'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'loud-music'),
	'section'     => 'section_our_services',   
	'settings'    => 'theme_options[number_of_items]',		
	'type'        => 'number',
	'active_callback' => 'loud_music_our_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[services_content_type]', 
	array(
	'default' 			=> $default['services_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[services_content_type]', 
	array(
	'label'       => __('Content Type', 'loud-music'),
	'section'     => 'section_our_services',   
	'settings'    => 'theme_options[services_content_type]',		
	'type'        => 'select',
	'active_callback' => 'loud_music_our_services_active',
	'choices'	  => array(
			'services_page'	  	=> __('Page','loud-music'),
			'services_post'	  	=> __('Post','loud-music'),
		),
	)
);

$number_of_items = loud_music_get_option( 'number_of_items' );

for( $i=1; $i<=$number_of_items; $i++ ){

	// Icon
	$wp_customize->add_setting('theme_options[our_services_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[our_services_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Icon #%1$s', 'loud-music'), $i),
		'description' => sprintf( __('Please input icon as eg: fab fa-buffer. Find Font Aawesome icons %1$shere%2$s', 'loud-music'), '<a href="' . esc_url( 'https://fontawesome.com/icons' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_our_services',   
		'settings'    => 'theme_options[our_services_icon_'.$i.']',		
		'active_callback' => 'loud_music_our_services_active',			
		'type'        => 'text',
		)
	);

	// Page
	$wp_customize->add_setting('theme_options[our_services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'loud_music_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[our_services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'loud-music'), $i),
		'section'     => 'section_our_services',   
		'settings'    => 'theme_options[our_services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'loud_music_our_services_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[our_services_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'loud_music_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[our_services_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'loud-music'), $i),
		'section'     => 'section_our_services',   
		'settings'    => 'theme_options[our_services_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => loud_music_dropdown_posts(),
		'active_callback' => 'loud_music_our_services_post',
		)
	);
}