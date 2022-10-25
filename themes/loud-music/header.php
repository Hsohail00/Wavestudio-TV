<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Loud Music
 */
/**
* Hook - loud_music_action_doctype.
*
* @hooked loud_music_doctype -  10
*/
do_action( 'loud_music_action_doctype' );
?>
<head>
<?php
/**
* Hook - loud_music_action_head.
*
* @hooked loud_music_head -  10
*/
do_action( 'loud_music_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - loud_music_action_before.
*
* @hooked loud_music_page_start - 10
*/
do_action( 'loud_music_action_before' );

/**
*
* @hooked loud_music_header_start - 10
*/
do_action( 'loud_music_action_before_header' );

/**
*
*@hooked loud_music_site_branding - 10
*@hooked loud_music_header_end - 15 
*/
do_action('loud_music_action_header');

/**
*
* @hooked loud_music_content_start - 10
*/
do_action( 'loud_music_action_before_content' );

/**
 * Banner start
 * 
 * @hooked loud_music_banner_header - 10
*/
do_action( 'loud_music_banner_header' );  
