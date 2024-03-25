<?php
/* Template Name: Single Events */
use Lean\Load;

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		Load::organism( 'event/event-post', [
			'image' => get_the_post_thumbnail_url(),
			'title' => get_the_title(),
			'date' => get_field( 'event_item_date' ),
			'location' => get_field( 'event_item_location' ),
			'description' => get_field( 'event_item_short_description' ),
			'content' => apply_filters( 'the_content', get_post_field( 'post_content' ) ),
			'cta' => get_field( 'event_item_cta' ),
			'cta_url' => get_field( 'event_item_cta_url' ),
		] );
	}
}

get_footer();
