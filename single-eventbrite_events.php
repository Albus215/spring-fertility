<?php
/* Template Name: Single Eventbrite Events */
use Lean\Load;

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		Load::organism( 'event/event-post', [
			'image' => get_the_post_thumbnail_url(),
			'title' => get_the_title(),
			'date' => date('M d, Y / g:iA', get_field('start_ts')),
			'location' => get_field( 'venue_address' ),
			'description' => get_field( 'event_item_short_description' ),
			'content' => apply_filters( 'the_content', get_post_field( 'post_content' ) ),
			'cta' => 'Register For Free',//get_field( 'event_item_cta' ),
			'cta_url' => get_field( 'iee_event_link' ),
		] );
	}
}

get_footer();
