<?php    
/**
 *Music Club Lite Theme Customizer
 *
 * @package Music Club Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function music_club_lite_customize_register( $wp_customize ) {	
	
	function music_club_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function music_club_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'music_club_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'music-club-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('music_club_lite_layout_option',array(
		'title' => __('Site Layout','music-club-lite'),			
		'priority' => 1,
		'panel' => 	'music_club_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('music_club_lite_boxlayout',array(
		'sanitize_callback' => 'music_club_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'music_club_lite_boxlayout', array(
    	'section'   => 'music_club_lite_layout_option',    	 
		'label' => __('Check to Box Layout','music-club-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','music-club-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('music_club_lite_color_scheme',array(
		'default' => '#7643d2',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'music_club_lite_color_scheme',array(
			'label' => __('Color Scheme','music-club-lite'),			
			'description' => __('More color options in PRO Version','music-club-lite'),
			'section' => 'colors',
			'settings' => 'music_club_lite_color_scheme'
		))
	);	
	
	//Header Contact info
	$wp_customize->add_section('music_club_lite_hdr_contact_section',array(
		'title' => __('Header Contact info','music-club-lite'),				
		'priority' => null,
		'panel' => 	'music_club_lite_panel_area',
	));
	
	$wp_customize->add_setting('music_club_lite_header_contactno',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('music_club_lite_header_contactno',array(	
		'type' => 'text',
		'label' => __('Add phone number here','music-club-lite'),
		'section' => 'music_club_lite_hdr_contact_section',
		'setting' => 'music_club_lite_header_contactno'
	));	
	
	$wp_customize->add_setting('music_club_lite_show_header_contactno',array(
		'default' => false,
		'sanitize_callback' => 'music_club_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'music_club_lite_show_header_contactno', array(
	   'settings' => 'music_club_lite_show_header_contactno',
	   'section'   => 'music_club_lite_hdr_contact_section',
	   'label'     => __('Check To show This Section','music-club-lite'),
	   'type'      => 'checkbox'
	 ));//Show header contact info
	
	 
	 //Header social icons
	$wp_customize->add_section('music_club_lite_social_section',array(
		'title' => __('Header/Footer social icons','music-club-lite'),
		'description' => __( 'Add social icons link here to display icons in header and footer', 'music-club-lite' ),			
		'priority' => null,
		'panel' => 	'music_club_lite_panel_area', 
	));
	
	$wp_customize->add_setting('music_club_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('music_club_lite_fb_link',array(
		'label' => __('Add facebook link here','music-club-lite'),
		'section' => 'music_club_lite_social_section',
		'setting' => 'music_club_lite_fb_link'
	));	
	
	$wp_customize->add_setting('music_club_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('music_club_lite_twitt_link',array(
		'label' => __('Add twitter link here','music-club-lite'),
		'section' => 'music_club_lite_social_section',
		'setting' => 'music_club_lite_twitt_link'
	));
	
	$wp_customize->add_setting('music_club_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('music_club_lite_gplus_link',array(
		'label' => __('Add google plus link here','music-club-lite'),
		'section' => 'music_club_lite_social_section',
		'setting' => 'music_club_lite_gplus_link'
	));
	
	$wp_customize->add_setting('music_club_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('music_club_lite_linked_link',array(
		'label' => __('Add linkedin link here','music-club-lite'),
		'section' => 'music_club_lite_social_section',
		'setting' => 'music_club_lite_linked_link'
	));
	
	$wp_customize->add_setting('music_club_lite_show_socialsection',array(
		'default' => false,
		'sanitize_callback' => 'music_club_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'music_club_lite_show_socialsection', array(
	   'settings' => 'music_club_lite_show_socialsection',
	   'section'   => 'music_club_lite_social_section',
	   'label'     => __('Check To show This Section','music-club-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons Section 			
	
	// Slider Section		
	$wp_customize->add_section( 'music_club_lite_slidersection', array(
		'title' => __('Slider Section', 'music-club-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 697 pixel.','music-club-lite'), 
		'panel' => 	'music_club_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('music_club_lite_sdrpgoption1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('music_club_lite_sdrpgoption1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','music-club-lite'),
		'section' => 'music_club_lite_slidersection'
	));	
	
	$wp_customize->add_setting('music_club_lite_sdrpgoption2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('music_club_lite_sdrpgoption2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','music-club-lite'),
		'section' => 'music_club_lite_slidersection'
	));	
	
	$wp_customize->add_setting('music_club_lite_sdrpgoption3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('music_club_lite_sdrpgoption3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','music-club-lite'),
		'section' => 'music_club_lite_slidersection'
	));	// Slider Section	
	
	$wp_customize->add_setting('music_club_lite_sdrreadmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('music_club_lite_sdrreadmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','music-club-lite'),
		'section' => 'music_club_lite_slidersection',
		'setting' => 'music_club_lite_sdrreadmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('music_club_lite_showslide_section',array(
		'default' => false,
		'sanitize_callback' => 'music_club_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'music_club_lite_showslide_section', array(
	    'settings' => 'music_club_lite_showslide_section',
	    'section'   => 'music_club_lite_slidersection',
	     'label'     => __('Check To Show This Section','music-club-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 // About Section 
	$wp_customize->add_section('music_club_lite_aboutsection', array(
		'title' => __('About Section','music-club-lite'),
		'description' => __('Select Pages from the dropdown for why choose section','music-club-lite'),
		'priority' => null,
		'panel' => 	'music_club_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('music_club_lite_aboutpage',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'music_club_lite_aboutpage',array(
		'type' => 'dropdown-pages',			
		'section' => 'music_club_lite_aboutsection',
	));		
	
	$wp_customize->add_setting('show_music_club_lite_aboutpage',array(
		'default' => false,
		'sanitize_callback' => 'music_club_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_music_club_lite_aboutpage', array(
	    'settings' => 'show_music_club_lite_aboutpage',
	    'section'   => 'music_club_lite_aboutsection',
	    'label'     => __('Check To Show This Section','music-club-lite'),
	    'type'      => 'checkbox'
	));//Show about Section 
	 
	 
	 // Three column Services section
	$wp_customize->add_section('music_club_lite_3colservices_section', array(
		'title' => __('Top Three Services Section','music-club-lite'),
		'description' => __('Select pages from the dropdown for services section','music-club-lite'),
		'priority' => null,
		'panel' => 	'music_club_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('music_club_lite_servicescol1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'music_club_lite_servicescol1',array(
		'type' => 'dropdown-pages',			
		'section' => 'music_club_lite_3colservices_section',
	));		
	
	$wp_customize->add_setting('music_club_lite_servicescol2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'music_club_lite_servicescol2',array(
		'type' => 'dropdown-pages',			
		'section' => 'music_club_lite_3colservices_section',
	));
	
	$wp_customize->add_setting('music_club_lite_servicescol3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'music_club_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'music_club_lite_servicescol3',array(
		'type' => 'dropdown-pages',			
		'section' => 'music_club_lite_3colservices_section',
	));
	
	
	$wp_customize->add_setting('music_club_lite_show_3colservices_section',array(
		'default' => false,
		'sanitize_callback' => 'music_club_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'music_club_lite_show_3colservices_section', array(
	   'settings' => 'music_club_lite_show_3colservices_section',
	   'section'   => 'music_club_lite_3colservices_section',
	   'label'     => __('Check To Show This Section','music-club-lite'),
	   'type'      => 'checkbox'
	 ));//Show services section
	 
	 
		 
}
add_action( 'customize_register', 'music_club_lite_customize_register' );

function music_club_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .blogpost_lyout h2 a:hover,
        #sidebar ul li a:hover,								
        .blogpost_lyout h3 a:hover,					
        .recent-post h6:hover,
		.social-icons a:hover,       						
        .postmeta a:hover,
		.sitenav ul li a:hover, 
		.sitenav ul li.current-menu-item a,
		.sitenav ul li.current-menu-parent a.parent,
		.sitenav ul li.current-menu-item ul.sub-menu li a:hover,
        .button:hover,	
		.pagebx_3cols:hover h3 a,
		.nivo-caption .slide_more:hover,            
		.footer-wrapper h2 span,
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a        				
            { color:<?php echo esc_html( get_theme_mod('music_club_lite_color_scheme','#7643d2')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,		
        .learnmore,
		.footer-wrapper .social-icons a,
		.pagebx_3cols:hover .pagereadmore,												
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,       		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('music_club_lite_color_scheme','#7643d2')); ?>;}
			
		.nivo-caption .slide_more:hover,
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('music_club_lite_color_scheme','#7643d2')); ?>;}
			
		button:focus,
		input[type="button"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		a:focus      
            { outline: thin dotted <?php echo esc_html( get_theme_mod('music_club_lite_color_scheme','#7643d2')); ?>;}			
			
         	
    </style> 
<?php    
}
         
add_action('wp_head','music_club_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function music_club_lite_customize_preview_js() {
	wp_enqueue_script( 'music_club_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20191002', true );
}
add_action( 'customize_preview_init', 'music_club_lite_customize_preview_js' );