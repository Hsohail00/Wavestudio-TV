<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Loud Music
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-item">
		<?php if ( has_post_thumbnail() ) { ?>
			<div>
			    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
		<?php } ?>

		<div class="entry-container">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php loud_music_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->
