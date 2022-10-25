<?php    
/**
 *Modeling Lite Theme Customizer
 *
 * @package Modeling Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modeling_lite_customize_register( $wp_customize ) {	
	
	function modeling_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function modeling_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'modeling_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'modeling-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
		'title' => __('Site Layout','modeling-lite'),			
		'priority' => 1,
		'panel' => 	'modeling_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
		'sanitize_callback' => 'modeling_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	'section'   => 'layout_option',    	 
		'label' => __('Check to Box Layout','modeling-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','modeling-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
		'default' => '#ff3333',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','modeling-lite'),			
			'description' => __('More color options in PRO Version','modeling-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);	
	
	// Slider Section		
	$wp_customize->add_section( 'hdr_slider_options', array(
		'title' => __('Header Slider Section', 'modeling-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 700 pixel.','modeling-lite'), 
		'panel' => 	'modeling_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('hdrsliderpage1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('hdrsliderpage1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','modeling-lite'),
		'section' => 'hdr_slider_options'
	));	
	
	$wp_customize->add_setting('hdrsliderpage2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('hdrsliderpage2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','modeling-lite'),
		'section' => 'hdr_slider_options'
	));	
	
	$wp_customize->add_setting('hdrsliderpage3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('hdrsliderpage3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','modeling-lite'),
		'section' => 'hdr_slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('hdrslider_readmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('hdrslider_readmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','modeling-lite'),
		'section' => 'hdr_slider_options',
		'setting' => 'hdrslider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_hdrslider',array(
		'default' => false,
		'sanitize_callback' => 'modeling_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_hdrslider', array(
	    'settings' => 'show_hdrslider',
	    'section'   => 'hdr_slider_options',
	     'label'     => __('Check To Show This Section','modeling-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // Welcome section 
	$wp_customize->add_section('welcomepanel_section', array(
		'title' => __('Welcome Section','modeling-lite'),
		'description' => __('Select Pages from the dropdown for welcome section','modeling-lite'),
		'priority' => null,
		'panel' => 	'modeling_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('welcomepanel_page',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'welcomepanel_page',array(
		'type' => 'dropdown-pages',			
		'section' => 'welcomepanel_section',
	));		
	
	$wp_customize->add_setting('show_welcomepanel_page',array(
		'default' => false,
		'sanitize_callback' => 'modeling_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_welcomepanel_page', array(
	    'settings' => 'show_welcomepanel_page',
	    'section'   => 'welcomepanel_section',
	    'label'     => __('Check To Show This Section','modeling-lite'),
	    'type'      => 'checkbox'
	));//Show welcome Section 
	 
	 // four boxes Services panel
	$wp_customize->add_section('four_circle_boxes_section', array(
		'title' => __('Four Circle Column Services Section','modeling-lite'),
		'description' => __('Select pages from the dropdown for three column services section','modeling-lite'),
		'priority' => null,
		'panel' => 	'modeling_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('servicesbox_title',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('servicesbox_title',array(	
		'type' => 'text',
		'label' => __('Add Read more button name here','modeling-lite'),
		'section' => 'four_circle_boxes_section',
		'setting' => 'servicesbox_title'
	)); 
	
	$wp_customize->add_setting('circlepagebox1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'circlepagebox1',array(
		'type' => 'dropdown-pages',			
		'section' => 'four_circle_boxes_section',
	));		
	
	$wp_customize->add_setting('circlepagebox2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'circlepagebox2',array(
		'type' => 'dropdown-pages',			
		'section' => 'four_circle_boxes_section',
	));
	
	$wp_customize->add_setting('circlepagebox3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'circlepagebox3',array(
		'type' => 'dropdown-pages',			
		'section' => 'four_circle_boxes_section',
	));
	
	$wp_customize->add_setting('circlepagebox4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'modeling_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'circlepagebox4',array(
		'type' => 'dropdown-pages',			
		'section' => 'four_circle_boxes_section',
	));
	
	
	$wp_customize->add_setting('show_circlebox',array(
		'default' => false,
		'sanitize_callback' => 'modeling_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_circlebox', array(
	   'settings' => 'show_circlebox',
	   'section'   => 'four_circle_boxes_section',
	   'label'     => __('Check To Show This Section','modeling-lite'),
	   'type'      => 'checkbox'
	 ));//Show services Section	
	 
	 
	  //Header social icons
	$wp_customize->add_section('ftr_social_sec',array(
		'title' => __('Footer social icons','modeling-lite'),
		'description' => __( 'Add social icons link here to display icons in footer', 'modeling-lite' ),			
		'priority' => null,
		'panel' => 	'modeling_lite_panel_area', 
	));
	
	$wp_customize->add_setting('fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
		'label' => __('Add facebook link here','modeling-lite'),
		'section' => 'ftr_social_sec',
		'setting' => 'fb_link'
	));	
	
	$wp_customize->add_setting('twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
		'label' => __('Add twitter link here','modeling-lite'),
		'section' => 'ftr_social_sec',
		'setting' => 'twitt_link'
	));
	
	$wp_customize->add_setting('gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('gplus_link',array(
		'label' => __('Add google plus link here','modeling-lite'),
		'section' => 'ftr_social_sec',
		'setting' => 'gplus_link'
	));
	
	$wp_customize->add_setting('linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('linked_link',array(
		'label' => __('Add linkedin link here','modeling-lite'),
		'section' => 'ftr_social_sec',
		'setting' => 'linked_link'
	));
	
	$wp_customize->add_setting('show_ftr_socialicons',array(
		'default' => false,
		'sanitize_callback' => 'modeling_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_ftr_socialicons', array(
	   'settings' => 'show_ftr_socialicons',
	   'section'   => 'ftr_social_sec',
	   'label'     => __('Check To show This Section','modeling-lite'),
	   'type'      => 'checkbox'
	 ));//Show footer Social icons Section 		 
	
		 
}
add_action( 'customize_register', 'modeling_lite_customize_register' );

function modeling_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .recent_articles h2 a:hover,
        #sidebar ul li a:hover,								
        .recent_articles h3 a:hover,					
        .recent-post h6:hover,					
        .four-circle-boxes:hover .button,									
        .postmeta a:hover,
        .button:hover,
		.welcome_titlecolumn h3 span,
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,      
        .four-circle-boxes:hover h3 a,
        .header-top a:hover,
        .header-menu ul li a:hover, 
        .header-menu ul li.current-menu-item a,
        .header-menu ul li.current-menu-parent a.parent,
        .header-menu ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('color_scheme','#ff3333')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .learnmore,
		.nivo-caption .slide_more,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
        .four-circle-boxes .thumbbx,	
        .social-icons a:hover,			
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('color_scheme','#ff3333')); ?>;}	
			
		button:focus,
		input[type="button"]:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="week"]:focus,
		input[type="datetime"]:focus,
		input[type="time"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		#site-holder a:focus        
            { outline:thin dotted <?php echo esc_html( get_theme_mod('color_scheme','#ff3333')); ?>;}			
         	
    </style> 
<?php                
}
         
add_action('wp_head','modeling_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function modeling_lite_customize_preview_js() {
	wp_enqueue_script( 'modeling_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'modeling_lite_customize_preview_js' );