<?php
/**
 *Modeling Lite About Theme
 *
 * @package Modeling Lite
 */

//about theme info
add_action( 'admin_menu', 'modeling_lite_abouttheme' );
function modeling_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'modeling-lite'), __('About Theme Info', 'modeling-lite'), 'edit_theme_options', 'modeling_lite_guide', 'modeling_lite_mostrar_guide');   
} 

//Info of the theme
function modeling_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'modeling-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Modeling Lite WordPress theme has been developed to help fashion or model agency owners create a professional online website. This free model agency WordPress theme can be used to create an elegant website for fashion, model portfolio, personal, creative projects, photographers, music artists, entertainers and design agencies.','modeling-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'modeling-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'modeling-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'modeling-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'modeling-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'modeling-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'modeling-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'modeling-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'modeling-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'modeling-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( MODELING_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'modeling-lite'); ?></a> |         
            <a href="<?php echo esc_url( MODELING_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'modeling-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>