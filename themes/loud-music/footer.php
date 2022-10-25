<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Loud Music
 */

/**
 *
 * @hooked loud_music_footer_start
 */
do_action( 'loud_music_action_before_footer' );

/**
 * Hooked - loud_music_footer_top_section -10
 * Hooked - loud_music_footer_section -20
 */
do_action( 'loud_music_action_footer' );

/**
 * Hooked - loud_music_footer_end. 
 */
do_action( 'loud_music_action_after_footer' );

wp_footer(); ?>

</body>  
</html>