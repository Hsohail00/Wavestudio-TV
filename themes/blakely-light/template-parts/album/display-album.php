<?php
/**
 * The template for displaying album content
 *
 * @package Blakely_Light
 */

$enable_content = get_theme_mod( 'blakely_album_option', 'disabled' );

if ( ! blakely_check_section( $enable_content ) ) {
	// Bail if album content is disabled.
	return;
}

$blakely_title       = get_theme_mod( 'blakely_album_title' );
$blakely_description = get_theme_mod( 'blakely_album_description' );
$background_image    = get_theme_mod( 'blakely_album_section_image' );

$classes[]   = 'album-section';
$classes[]   = 'section';
$classes[]   = 'text-align-left';

if ( ! $blakely_title && ! $blakely_description ) {
	$classes[] = 'no-section-heading';
}

if ( $background_image ) {
	$classes[] = 'has-background-image';
}
?>

<div id="album-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( $blakely_title || $blakely_description ) : ?>
			<div class="section-heading-wrapper">

				<?php if ( $blakely_title ) : ?>
					<div class="section-title-wrapper">
						<h2 class="section-title"><?php echo wp_kses_post( $blakely_title ); ?></h2>
					</div><!-- .page-title-wrapper -->
				<?php endif; ?>

				<?php if ( $blakely_description ) : ?>
					<div class="section-description">
						<p>
							<?php
							echo wp_kses_post( $blakely_description );
							?>
						</p>
					</div><!-- .section-description -->
				<?php endif; ?>
			</div><!-- .section-heading-wrapper -->
		<?php endif; ?>

		<div class="section-content-wrapper layout-three">
			<?php get_template_part( 'template-parts/album/post-types-album' );	?>
		</div><!-- .album-wrapper -->
	</div><!-- .wrapper -->
</div><!-- #album-section -->
