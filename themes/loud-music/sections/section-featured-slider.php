<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Loud Music
 */
    $slider_content_type        = loud_music_get_option( 'slider_content_type' );
    $number_of_slider_items     = loud_music_get_option( 'number_of_slider_items' );
    
    if( $slider_content_type == 'slider_page' ) :
        for( $i=1; $i<=$number_of_slider_items; $i++ ) :
            $featured_slider_posts[] = loud_music_get_option( 'slider_page_'.$i );
        endfor;  
    elseif( $slider_content_type == 'slider_post' ) :
        for( $i=1; $i<=$number_of_slider_items; $i++ ) :
            $featured_slider_posts[] = loud_music_get_option( 'slider_post_'.$i );
        endfor;
    endif;
    ?>
    <?php if( $slider_content_type == 'slider_page' ) : ?>
        <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": false, "fade": true }'>
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $featured_slider_posts ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
            );   

            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1; $j=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                    $featured_slider_subtitle[$j]   = loud_music_get_option( 'featured_slider_subtitle_'.$j );

                    $class='';
                    if ($i==0) {
                        $class='display-block';
                    } else{
                        $class='display-none';}
                    ?>
                        <article class="slick-item <?php echo esc_attr($class); ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <div class="overlay"></div>
                            <div class="wrapper">
                                <div class="featured-content-wrapper">
                                    <?php if( !empty( $featured_slider_subtitle[$j] ) ) : ?>
                                        <span class="slider-subtitle"><?php echo esc_html( $featured_slider_subtitle[$j] ); ?></span>
                                    <?php endif; ?>

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    </header>
                                    
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = loud_music_the_excerpt( 10 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->

                                    <div class="read-more">
                                        <?php $readmore_text = loud_music_get_option( 'readmore_text' );?>
                                        <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                    </div><!-- .read-more -->
                                </div><!-- .featured-content-wrapper -->
                            </div><!-- .wrapper -->
                        </article><!-- .slick-item -->
                    <?php endwhile;?>
                <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .featured-slider-wrapper -->

    <?php else : ?>
        <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": false, "fade": true }'>
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $featured_slider_posts ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );   

            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1; $j=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                    $featured_slider_subtitle[$j]   = loud_music_get_option( 'featured_slider_subtitle_'.$j );

                    $class='';
                    if ($i==0) {
                        $class='display-block';
                    } else{
                        $class='display-none';}
                    ?>
                        <article class="slick-item <?php echo esc_attr($class); ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <div class="overlay"></div>
                            <div class="wrapper">
                                <div class="featured-content-wrapper">
                                    <?php if( !empty( $featured_slider_subtitle[$j] ) ) : ?>
                                        <span class="slider-subtitle"><?php echo esc_html( $featured_slider_subtitle[$j] ); ?></span>
                                    <?php endif; ?>

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    </header>
                                    
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = loud_music_the_excerpt( 10 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->

                                    <div class="read-more">
                                        <?php $readmore_text = loud_music_get_option( 'readmore_text' );?>
                                        <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                    </div><!-- .read-more -->
                                </div><!-- .featured-content-wrapper -->
                            </div><!-- .wrapper -->
                        </article><!-- .slick-item -->
                    <?php endwhile;?>
                <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .featured-slider-wrapper -->
    <?php endif;
    