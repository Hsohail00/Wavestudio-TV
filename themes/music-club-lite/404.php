<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Music Club Lite
 */

get_header(); ?>

<div class="sitefixer">
    <div id="design_innerpage">
        <section class="design_contentarea">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'music-club-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn.....Dont worry... it happens to the best of us.', 'music-club-lite' ); ?></p>  
            </div><!-- .page-content -->
        </section>
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>