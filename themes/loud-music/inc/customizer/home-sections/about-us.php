<?php
/**
 * Services options.
 *
 * @package Loud Music
 */

$default = loud_music_get_default_theme_options();

// Add About Us Section
$wp_customize->add_section( 'section_home_about_us',
	array(
		'title'      => __( 'About Us', 'loud-music' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Enable About Us Section
$wp_customize->add_setting('theme_options[enable_about_us_section]', 
	array(
	'default' 			=> $default['enable_about_us_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'loud_music_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_about_us_section]', 
	array(		
	'label' 	=> __('Enable About Us Section', 'loud-music'),
	'section' 	=> 'section_home_about_us',
	'settings'  => 'theme_options[enable_about_us_section]',
	'type' 		=> 'checkbox',	
	)
);


// Content Type
$wp_customize->add_setting('theme_options[about_us_content_type]', 
	array(
	'default' 			=> $default['about_us_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[about_us_content_type]', 
	array(
	'label'       => __('Content Type', 'loud-music'),
	'section'     => 'section_home_about_us',   
	'settings'    => 'theme_options[about_us_content_type]',		
	'type'        => 'select',
	'active_callback' => 'loud_music_about_us_active',
	'choices'	  => array(
			'about_us_page'	  => __('Page','loud-music'),
			'about_us_post'	  => __('Post','loud-music'),
		),
	)
);

// Page
$wp_customize->add_setting('theme_options[about_us_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[about_us_page]', 
	array(
	'label'       => sprintf( __('Select Page', 'loud-music')),
	'section'     => 'section_home_about_us',   
	'settings'    => 'theme_options[about_us_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'loud_music_about_us_page',
	)
);

// Posts
$wp_customize->add_setting('theme_options[about_us_post]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[about_us_post]', 
	array(
	'label'       => sprintf( __('Select Post', 'loud-music')),
	'section'     => 'section_home_about_us',   
	'settings'    => 'theme_options[about_us_post]',		
	'type'        => 'select',
	'choices'	  => loud_music_dropdown_posts(),
	'active_callback' => 'loud_music_about_us_post',
	)
);
