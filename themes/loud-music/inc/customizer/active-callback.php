<?php
/**
 * Active callback functions.
 *
 * @package Loud Music
 */

function loud_music_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_slider]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function loud_music_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[slider_content_type]' )->value();
    return ( loud_music_slider_active( $control ) && ( 'slider_page' == $content_type ) );
}

function loud_music_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[slider_content_type]' )->value();
    return ( loud_music_slider_active( $control ) && ( 'slider_post' == $content_type ) );
}

function loud_music_our_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_our_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function loud_music_our_services_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( loud_music_our_services_active( $control ) && ( 'services_page' == $content_type ) );
}

function loud_music_our_services_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( loud_music_our_services_active( $control ) && ( 'services_post' == $content_type ) );
}

function loud_music_about_us_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_about_us_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function loud_music_about_us_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_us_content_type]' )->value();
    return ( loud_music_about_us_active( $control ) && ( 'about_us_page' == $content_type ) );
}

function loud_music_about_us_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_us_content_type]' )->value();
    return ( loud_music_about_us_active( $control ) && ( 'about_us_post' == $content_type ) );
}

function loud_music_latest_albums_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_latest_albums_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function loud_music_latest_albums_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cs_content_type]' )->value();
    return ( loud_music_latest_albums_active( $control ) && ( 'cs_page' == $content_type ) );
}

function loud_music_latest_albums_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cs_content_type]' )->value();
    return ( loud_music_latest_albums_active( $control ) && ( 'cs_post' == $content_type ) );
}

function loud_music_cta_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_cta_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function loud_music_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_blog_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

/**
 * Active Callback for top bar section
 */
function loud_music_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function loud_music_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}