<?php 
/**
 * Template part for displaying About Section
 *
 *@package Loud Music
 */
?>
    <?php 
        $cta_description        = loud_music_get_option( 'cta_description' );
        $cta_button_label       = loud_music_get_option( 'cta_button_label' );
        $cta_button_url         = loud_music_get_option( 'cta_button_url' );
    ?>

    <div class="overlay"></div>
    <div class="wrapper">
        <?php if ( !empty($cta_description ) )  :?>
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html($cta_description); ?></h2>
            </div><!-- .section-header -->
        <?php endif;?>

        <?php if ( !empty($cta_button_label ) && !empty($cta_button_url ) )  :?>
            <div class="read-more">
                <a href="<?php echo esc_url($cta_button_url); ?>" class="btn"><?php echo esc_html($cta_button_label); ?></a>
            </div><!-- .read-more -->
        <?php endif;?>
    </div><!-- .wrapper -->

