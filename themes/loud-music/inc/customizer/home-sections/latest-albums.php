<?php
/**
 * latest_albums options.
 *
 * @package Loud Music
 */

$default = loud_music_get_default_theme_options();

// Add Section
$wp_customize->add_section( 'section_home_latest_albums',
	array(
		'title'      => __( 'Latest Albums', 'loud-music' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Enable Latest Albums Section
$wp_customize->add_setting('theme_options[enable_latest_albums_section]', 
	array(
	'default' 			=> $default['enable_latest_albums_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'loud_music_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_latest_albums_section]', 
	array(		
	'label' 	=> __('Enable Latest Albums Section', 'loud-music'),
	'section' 	=> 'section_home_latest_albums',
	'settings'  => 'theme_options[enable_latest_albums_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[latest_albums_section_title]', 
	array(
	'default'           => $default['latest_albums_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_albums_section_title]', 
	array(
	'label'       => __('Section Title', 'loud-music'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[latest_albums_section_title]',	
	'active_callback' => 'loud_music_latest_albums_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_cs_items]', 
	array(
	'default' 			=> $default['number_of_cs_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_items]', 
	array(
	'label'       => __('Number Of Items', 'loud-music'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'loud-music'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[number_of_cs_items]',		
	'type'        => 'number',
	'active_callback' => 'loud_music_latest_albums_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[cs_content_type]', 
	array(
	'default' 			=> $default['cs_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'loud_music_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[cs_content_type]', 
	array(
	'label'       => __('Content Type', 'loud-music'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[cs_content_type]',		
	'type'        => 'select',
	'active_callback' => 'loud_music_latest_albums_active',
	'choices'	  => array(
			'cs_page'	  => __('Page','loud-music'),
			'cs_post'	  => __('Post','loud-music'),
		),
	)
);

$number_of_cs_items = loud_music_get_option( 'number_of_cs_items' );

for( $i=1; $i<=$number_of_cs_items; $i++ ){

	// Page
	$wp_customize->add_setting('theme_options[latest_albums_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'loud_music_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[latest_albums_page_'.$i.']', 
		array(
		'label'       => __('Select Page', 'loud-music'),
		'section'     => 'section_home_latest_albums',   
		'settings'    => 'theme_options[latest_albums_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'loud_music_latest_albums_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[latest_albums_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'loud_music_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[latest_albums_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'loud-music'), $i),
		'section'     => 'section_home_latest_albums',   
		'settings'    => 'theme_options[latest_albums_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => loud_music_dropdown_posts(),
		'active_callback' => 'loud_music_latest_albums_post',
		)
	);
}