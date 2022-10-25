<?php
/**
 *Music Club Lite About Theme
 *
 * @package Music Club Lite
 */

//about theme info
add_action( 'admin_menu', 'music_club_lite_abouttheme' );
function music_club_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'music-club-lite'), __('About Theme Info', 'music-club-lite'), 'edit_theme_options', 'music_club_lite_guide', 'music_club_lite_mostrar_guide');   
} 

//Info of the theme
function music_club_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'music-club-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Music Club Lite is an incredibly sleek and resourceful, a creative and modern, clean and fresh, minimalist and polished, feature-rich and easy to use, highly responsive music WordPress theme. This theme is a powerful framework that allows passionate and ambitious musicians to craft their own professional music websites. This theme is perfect for musical projects, bands, radio, orchestra, studios and more. This theme can also be used for nightclubs, musicians, singers, artists, DJs, music magazines, record labels and all similar music industry projects.','music-club-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'music-club-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'music-club-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'music-club-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'music-club-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'music-club-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'music-club-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'music-club-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'music-club-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'music-club-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="http://www.gracethemesdemo.com/music-club/" target="_blank"><?php esc_html_e('Live Demo', 'music-club-lite'); ?></a> |           
            <a href="http://www.gracethemesdemo.com/documentation/music-club/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'music-club-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>