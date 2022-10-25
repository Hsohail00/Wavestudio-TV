<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Loud Music
 */

    $about_us_content_type     = loud_music_get_option( 'about_us_content_type' );

    if( $about_us_content_type == 'about_us_page' ) :
        $about_us_posts[] = loud_music_get_option( 'about_us_page');
    elseif( $about_us_content_type == 'about_us_post' ) :
        $about_us_posts[] = loud_music_get_option( 'about_us_post');
    endif;
    ?>

    <?php if( $about_us_content_type == 'about_us_page' ) : ?>
        <div class="section-content">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $about_us_posts ),
                'post__in'      => $about_us_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                if ($loop->have_posts()) : $loop->the_post(); ?>        
                
                    <article>
                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <a href="<?php echo the_permalink();?>" class="post-thumbnail-link"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="section-header">
                                <h2 class="section-title"><a href="<?php echo the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = loud_music_the_excerpt( 50 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->

                            <div class="read-more">
                                <?php $readmore_text = loud_music_get_option( 'readmore_text' );?>
                                <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                            </div><!-- .read-more -->
                        </div><!-- .entry-container -->
                    </article>

                <?php endif;?>
            <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div>

    <?php else: ?>
        <div class="section-content">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $about_us_posts ),
                'post__in'      => $about_us_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                while ($loop->have_posts()) : $loop->the_post(); ?>  
                
                <article>
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php echo the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="section-header">
                            <h2 class="section-title"><a href="<?php echo the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = loud_music_the_excerpt( 50 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->

                        <div class="read-more">
                            <?php $readmore_text = loud_music_get_option( 'readmore_text' );?>
                            <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                        </div><!-- .read-more -->
                    </div><!-- .entry-container -->
                </article>

                <?php endwhile;?>
            <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif;