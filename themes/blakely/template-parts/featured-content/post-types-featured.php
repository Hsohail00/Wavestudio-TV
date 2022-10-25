<?php
/**
 * The template for displaying featured content items
 *
 * @package Blakely
 */

$number = get_theme_mod( 'blakely_featured_content_number', 3 );

if ( ! $number ) {
	// If number is 0, then this section is disabled
	return;
}

$args = array(
	'orderby'             => 'post__in',
	'ignore_sticky_posts' => 1 // ignore sticky posts
);

$post_list  = array();// list of valid post/page ids

$no_of_post = 0; // for number of posts

$args['post_type'] = 'featured-content';

for ( $i = 1; $i <= $number; $i++ ) {
	$blakely_post_id = '';

	$blakely_post_id =  get_theme_mod( 'blakely_featured_content_cpt_' . $i );

	if ( $blakely_post_id && '' !== $blakely_post_id ) {
		// Polylang Support.
		if ( class_exists( 'Polylang' ) ) {
			$blakely_post_id = pll_get_post( $blakely_post_id, pll_current_language() );
		}

		$post_list = array_merge( $post_list, array( $blakely_post_id ) );

		$no_of_post++;
	}
}

$args['post__in'] = $post_list;

if ( 0 === $no_of_post ) {
	return;
}

$args['posts_per_page'] = $no_of_post;
$loop     = new WP_Query( $args );

if ( $loop -> have_posts() ) :
	while ( $loop -> have_posts() ) :
		$loop -> the_post();

		get_template_part( 'template-parts/featured-content/content-featured' );

	endwhile;
	wp_reset_postdata();
endif;
