<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Modeling Lite
 */
$show_ftr_socialicons 	  	= get_theme_mod('show_ftr_socialicons', false);
?>

<div class="footer-wrapper">
   <div class="container footercolumn">               
			   
            
             <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                <div class="widget-column-4">  
                    <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                </div>
           <?php endif; ?>  
            <div class="clear"></div>
            </div><!--end .container-->
            
        	<div class="container">            	
                <div class="design-by">
                
                 <?php if( $show_ftr_socialicons != ''){ ?> 
                   <div class="social-icons">                   
                   <?php $fb_link = get_theme_mod('fb_link');
                    if( !empty($fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $twitt_link = get_theme_mod('twitt_link');
                    if( !empty($twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $gplus_link = get_theme_mod('gplus_link');
                    if( !empty($gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $linked_link = get_theme_mod('linked_link');
                    if( !empty($linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
                  <?php } ?>                  
               </div><!--end .social-icons--> 
             <?php } ?> 
                
				  <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'modeling-lite');?>  <?php esc_html_e('Theme by Grace Themes','modeling-lite'); ?>  
                  
                  
                </div>
                 <div class="clear"></div>
            </div><!--end .container-->           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
</body>
</html>