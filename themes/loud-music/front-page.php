<?php
/**
 * The template for displaying home page.
 * @package Loud Music
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = loud_music_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $enable_featured_slider = loud_music_get_option( 'enable_featured_slider' );
                if( true ==$enable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'our-services' ) { ?>
                <?php $enable_our_services_section = loud_music_get_option( 'enable_our_services_section' );
                if( true ==$enable_our_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about-us' ) { ?>
                <?php $enable_about_us_section = loud_music_get_option( 'enable_about_us_section' );
                if( true ==$enable_about_us_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'latest-albums' ) { ?>
                <?php $enable_latest_albums_section = loud_music_get_option( 'enable_latest_albums_section' );
                if(true ==$enable_latest_albums_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section blog-posts-wrapper">         
                        <div class="wrapper">               
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $enable_cta_section   = loud_music_get_option( 'enable_cta_section' );
                $background_cta_section     = loud_music_get_option( 'background_cta_section' );
                if( true ==$enable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">                        
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'blog' ) { ?>
                <?php $enable_blog_section = loud_music_get_option( 'enable_blog_section' );
                if(true ==$enable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif;
            }
        }
    }
    if( true == loud_music_get_option('enable_frontpage_content') ) { ?>
        <div class="wrapper page-section">
            <?php include( get_page_template() ); ?>
        </div>
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 