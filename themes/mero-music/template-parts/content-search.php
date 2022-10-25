<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mero_music
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>
	<div class="blog-post-item">
		<div class="featured-image">
			<?php mero_music_post_thumbnail(); ?>
		</div><!-- .featured-image -->

		<div class="entry-container">
			<div class="category-meta">
				<?php mero_music_entry_footer(); ?>
			</div><!-- .category-meta -->
			
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<?php 
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
						mero_music_posted_by();
						mero_music_posted_on();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php $excerpt = get_the_excerpt();
			
			if ( !empty($excerpt) ) { ?>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div><!-- .entry-content -->
			<?php } ?>
		</div><!-- .entry-container -->
	</div><!-- .blog-post-item -->
</article><!-- #post-<?php the_ID(); ?> -->