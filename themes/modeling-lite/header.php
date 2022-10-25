<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Modeling Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#site-pagelayout">
<?php esc_html_e( 'Skip to content', 'modeling-lite' ); ?>
</a>
<?php
$show_hdrslider 	  		= get_theme_mod('show_hdrslider', false);
$show_circlebox 	  	    = get_theme_mod('show_circlebox', false);
$show_welcomepanel_page	    = get_theme_mod('show_welcomepanel_page', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_hdrslider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?>">       
<div class="hdrblack">
<div class="container">    
  <div class="logo">
        <?php modeling_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
  </div><!-- logo -->
  <div class="head-rightpart">
  <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','modeling-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="header-menu">                   
        <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
       </div><!--.header-menu -->  
 </div><!-- .head-rightpart --> 
<div class="clear"></div>  

</div><!-- container --> 
</div><!-- .hdrblack -->  
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($show_hdrslider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('hdrsliderpage'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('hdrsliderpage'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p> 
    <?php
    $hdrslider_readmore = get_theme_mod('hdrslider_readmore');
    if( !empty($hdrslider_readmore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($hdrslider_readmore); ?></a>
    <?php } ?>       
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
 if( $show_welcomepanel_page != ''){ ?>  
<section id="welcome-panel">
<div class="container">                               
<?php 
if( get_theme_mod('welcomepanel_page',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('welcomepanel_page',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
   
     <div class="welcome_titlecolumn"><h3><?php the_title(); ?></h3></div>                              
     <div class="welcome_contentcolumn">      
      <?php the_content();  ?>       
    </div>                                      
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #how it work-section -->
<?php } ?>


<?php if( $show_circlebox != ''){ ?>  
<section id="four_cirle_services">
<div class="container"> 
	<?php
    $servicesbox_title = get_theme_mod('servicesbox_title');
    if( !empty($servicesbox_title) ){ ?>
      <h2 class="section_title"><?php echo esc_html($servicesbox_title); ?></h2>
    <?php } ?> 
                                              
<?php 
for($n=1; $n<=4; $n++) {    
if( get_theme_mod('circlepagebox'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('circlepagebox'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
	<div class="four-circle-boxes <?php if($n % 4 == 0) { echo "last_column"; } ?>">                                    
		<?php if(has_post_thumbnail() ) { ?>
		<div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>
		<div class="four-pagecontent">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<p><?php echo esc_html( wp_trim_words( get_the_content(), 16, '...' ) );  ?></p>   
		                                  
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- .services-section-one section-->                      	      
<?php } ?>

<?php } ?>