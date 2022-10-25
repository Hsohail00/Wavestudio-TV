<?php
/*
 * This is the child theme for MusicFocus theme.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
function blakely_light_enqueue_styles() {
    // Include parent theme CSS.
    wp_enqueue_style( 'blakely-style', get_template_directory_uri() . '/style.css', null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );
    
    // Include child theme CSS.
    wp_enqueue_style( 'blakely-light-style', get_stylesheet_directory_uri() . '/style.css', array( 'blakely-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/style.css' ) ) );

    // Load the rtl.
    if ( is_rtl() ) {
        wp_enqueue_style( 'blakely-rtl', get_template_directory_uri() . '/rtl.css', array( 'blakely-style' ), $version );
    }

    // Enqueue child block styles after parent block style.
    wp_enqueue_style( 'blakely-light-block-style', get_stylesheet_directory_uri() . '/assets/css/child-blocks.css', array( 'blakely-block-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-blocks.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'blakely_light_enqueue_styles' );

/**
 * Add child theme editor styles
 */
function blakely_light_editor_style() {
    add_editor_style( array(
            'assets/css/child-editor-style.css',
            blakely_fonts_url(),
        )
    );
}
add_action( 'after_setup_theme', 'blakely_light_editor_style', 11 );

/**
 * Enqueue editor styles for Gutenberg
 */
function blakely_light_block_editor_styles() {
    // Enqueue child block editor style after parent editor block css.
    wp_enqueue_style( 'blakely-light-block-editor-style', get_stylesheet_directory_uri() . '/assets/css/child-editor-blocks.css', array( 'blakely-block-editor-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-editor-blocks.css' ) ) );
}
add_action( 'enqueue_block_editor_assets', 'blakely_light_block_editor_styles', 11 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blakely_light_body_classes( $classes ) {
    // Added color scheme to body class.
    $classes['color-scheme'] = 'color-scheme-light';

    return $classes;
}
add_filter( 'body_class', 'blakely_light_body_classes', 100 );


/**
 * Include Promotion Headline
 */
require trailingslashit( get_stylesheet_directory() ) .  'inc/customizer/album.php';

function blakely_sections() {
    get_template_part('template-parts/header/header-media');
    get_template_part('template-parts/slider/display-slider');
    get_template_part('template-parts/hero-content/content-hero');
    get_template_part('template-parts/album/display-album');
    get_template_part('template-parts/services/display-services');
    get_template_part('template-parts/portfolio/display-portfolio');
    get_template_part('template-parts/testimonial/display-testimonial');
    get_template_part('template-parts/featured-content/display-featured');

}

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Blakely 1.0
 *
 * @see blakelylight_header_style()
 */
function blakely_light_custom_header_and_background() {
    $default_background_color = '#ffffff';
    $default_text_color       = '##59616c';

    /**
     * Filter the arguments used when adding 'custom-background' support in Blakely.
     *
     * @since Blakely 1.0
     *
     * @param array $args {
     *     An array of custom-background support arguments.
     *
     *     @type string $default-color Default color of the background.
     * }
     */
    add_theme_support( 'custom-background', apply_filters( 'blakely_custom_background_args', array(
        'default-color' => $default_background_color,
    ) ) );

    /**
     * Filter the arguments used when adding 'custom-header' support in Blakely.
     *
     * @since Blakely 1.0
     *
     * @param array $args {
     *     An array of custom-header support arguments.
     *
     *     @type string $default-text-color Default color of the header text.
     *     @type int      $width            Width in pixels of the custom header image. Default 1200.
     *     @type int      $height           Height in pixels of the custom header image. Default 280.
     *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
     *     @type callable $wp-head-callback Callback function used to style the header image and text
     *                                      displayed on the blog.
     *
     */
    add_theme_support( 'custom-header', apply_filters( 'blakely_custom_header_args', array(
        'default-image'          => get_stylesheet_directory_uri() . '/assets/images/header-image.jpg',
        'default-text-color'     => $default_text_color,
        'width'                  => 1920,
        'height'                 => 1080,
        'flex-height'            => true,
        'flex-width'            => true,
        'wp-head-callback'       => 'blakely_header_style',
        'video'                  => true,
    ) ) );

    register_default_headers( array(
        'default-image' => array(
            'url'           => '%s/assets/images/header-image.jpg',
            'thumbnail_url' => '%s/assets/images/header-image-275x155.jpg',
            'description'   => esc_html__( 'Default Header Image', 'blakely-light' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'blakely_light_custom_header_and_background' );
