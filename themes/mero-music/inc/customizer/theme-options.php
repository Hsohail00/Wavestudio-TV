<?php
/**
 * Theme Options.
 *
 * @package mero_music
 */

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'mero-music' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Sidebar section
$wp_customize->add_section('section_sidebar', array(    
	'title'       => __('Sidebar Options', 'mero-music'),
	'panel'       => 'theme_option_panel'    
));

// Page Sidebar Option
$wp_customize->add_setting('page_sidebar', 
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_music_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('page_sidebar', 
	array(		
	'label' 	=> __('Page Sidebar', 'mero-music'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'page_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'mero-music'),						
		'right-sidebar' => __( 'Right Sidebar', 'mero-music'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'mero-music'),	
		),	
	)
);

// Single Post Sidebar Option
$wp_customize->add_setting('single_post_sidebar', 
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_music_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('single_post_sidebar', 
	array(		
	'label' 	=> __('Single Post Sidebar', 'mero-music'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'single_post_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'mero-music'),						
		'right-sidebar' => __( 'Right Sidebar', 'mero-music'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'mero-music'),	
		),	
	)
);

// Blog Sidebar Option
$wp_customize->add_setting('blog_sidebar', 
	array(
	'default' 			=> 'no-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_music_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('blog_sidebar', 
	array(		
	'label' 	=> __('Blog Sidebar', 'mero-music'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'blog_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'mero-music'),						
		'right-sidebar' => __( 'Right Sidebar', 'mero-music'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'mero-music'),	
		),	
	)
);

// Archive Sidebar Option
$wp_customize->add_setting('archive_sidebar', 
	array(
	'default' 			=> 'no-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_music_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('archive_sidebar', 
	array(		
	'label' 	=> __('Archive Sidebar', 'mero-music'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'archive_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'mero-music'),						
		'right-sidebar' => __( 'Right Sidebar', 'mero-music'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'mero-music'),	
		),	
	)
);

// Excerpt Length
$wp_customize->add_section('section_excerpt_length', 
	array(    
	'title'       => __('Excerpt Length', 'mero-music'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'excerpt_length', array(
	'default'           => '15',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_music_sanitize_number_range',
	'transport'         => 'refresh',
) );

$wp_customize->add_control( 'excerpt_length', array(
	'label'       => __( 'Excerpt Length', 'mero-music' ),
	'description' => __( 'Note: Min 5 & Max 100.', 'mero-music' ),
	'section'     => 'section_excerpt_length',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 5, 'max' => 100, 'style' => 'width: 55px;' ),
) );

// Post Column Option
$wp_customize->add_section('section_post_column', 
	array(    
	'title'       => __('Post Column Option', 'mero-music'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'post_column', array(
	'default'           => '3',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_music_sanitize_number_range',
	'transport'         => 'refresh',
) );

$wp_customize->add_control( 'post_column', array(
	'label'       => __( 'Select Column Number', 'mero-music' ),
	'description' => __( 'Note: Min 1 & Max 5.', 'mero-music' ),
	'section'     => 'section_post_column',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 5, 'style' => 'width: 55px;' ),
) );

// Enable Header Image on Front Page
$wp_customize->add_setting( 'enable_frontpage_header_image', array(
	'default'             => false,
	'type'                => 'theme_mod',
	'capability'          => 'edit_theme_options',
	'sanitize_callback'   => 'mero_music_sanitize_checkbox',
) );

$wp_customize->add_control( 'enable_frontpage_header_image', array(
	'label'       	=> esc_html__( 'Enable Header Image on Front Page', 'mero-music' ),
	'section'     	=> 'header_image',
	'type'        	=> 'checkbox',
) );