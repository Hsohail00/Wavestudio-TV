<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mero_music
 */

get_header();
?>

<div id="content-wrap" class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
					
			<?php $post_column = get_theme_mod( 'post_column', 3 ); ?>
			<div class="blog-archive grid col-<?php echo $post_column; ?> clear">
				<?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div><!-- .blog-archive -->

			<?php
			the_posts_pagination(
				array(
					'prev_text'          => mero_music_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'mero-music' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'mero-music' ) . '</span>' . mero_music_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mero-music' ) . ' </span>',
				)
			); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- .container -->

<?php
get_footer();