<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Modeling Lite
 */

get_header(); ?>

<div class="container">
    <div id="site-pagelayout">
        <section class="site-page-content">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'modeling-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn.....Dont worry... it happens to the best of us.', 'modeling-lite' ); ?></p>  
            </div><!-- .page-content -->
        </section>
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>