<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Music Club Lite
 */
 $music_club_lite_show_socialsection = get_theme_mod('music_club_lite_show_socialsection', false);
?>

<div class="footer-wrapper"> 
      <div class="sitefixer footer"> 
           <div class="ftr_textlogo">
                <h2><?php bloginfo('name'); ?></h2>                
           </div>
           
           <?php wp_nav_menu( array('theme_location' => 'footer') ); ?> 
           
           <?php if( $music_club_lite_show_socialsection != ''){ ?> 
             <div class="social-icons">                                                
                   <?php $music_club_lite_fb_link = get_theme_mod('music_club_lite_fb_link');
                    if( !empty($music_club_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($music_club_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $music_club_lite_twitt_link = get_theme_mod('music_club_lite_twitt_link');
                    if( !empty($music_club_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($music_club_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $music_club_lite_gplus_link = get_theme_mod('music_club_lite_gplus_link');
                    if( !empty($music_club_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($music_club_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $music_club_lite_linked_link = get_theme_mod('music_club_lite_linked_link');
                    if( !empty($music_club_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($music_club_lite_linked_link); ?>"></a>
                  <?php } ?>                  
           </div><!--end .social-icons--> 
        <?php } ?> 
           
           
      </div><!--end .sitefixer-->

        <div class="footer-copyright"> 
            <div class="sitefixer">            	
                <div class="design-by">
				  <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'music-club-lite');?>
                  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-music-wordpress-theme', 'music-club-lite' ) ); ?>" target="_blank">
				    <?php printf( __( 'Theme by %s', 'music-club-lite' ), 'Grace Themes' ); ?>
                  </a>
                </div>
             </div><!--end .sitefixer-->             
        </div><!--end .footer-copyright-->  
                     
     </div><!--end #footer-wrapper-->
</div><!--#end sitelayout_type-->

<?php wp_footer(); ?>
</body>
</html>