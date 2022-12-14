<?php 
/**
 * Template part for displaying About Section
 *
 *@package Loud Music
 */
    $latest_albums_section_title    = loud_music_get_option( 'latest_albums_section_title' );
    $number_of_cs_items             = loud_music_get_option( 'number_of_cs_items' );
    $cs_content_type                = loud_music_get_option( 'cs_content_type' );

    if( $cs_content_type == 'cs_page' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $latest_albums_posts[] = loud_music_get_option( 'latest_albums_page_'.$i );
        endfor;  
    elseif( $cs_content_type == 'cs_post' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $latest_albums_posts[] = loud_music_get_option( 'latest_albums_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if(!empty($latest_albums_section_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($latest_albums_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $cs_content_type == 'cs_page' ) : ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $latest_albums_posts ),
                'post__in'      => $latest_albums_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    
                    <article>
                        <div class="featured-album-wrapper">
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                                <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        $excerpt = loud_music_the_excerpt( 20 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </div><!-- .featured-album-wrapper -->
                    </article>

                  <?php endwhile;?>
                <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $latest_albums_posts ),
                'post__in'      => $latest_albums_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>     
                    
                    <article>
                        <div class="featured-album-wrapper">
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                                <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        $excerpt = loud_music_the_excerpt( 20 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </div><!-- .featured-album-wrapper -->
                    </article>

                  <?php endwhile; ?>
                <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;
