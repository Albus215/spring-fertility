<?php
use Lean\Load;

$args = [];

$args = array(
	'post_type' => [ 'events','page','knowledge','test','treatment','testimonials', 'post' ],
	'posts_per_page' => 50,
	's' => urldecode( get_search_query() ),
);

$query = new WP_Query( $args );

if ( function_exists( 'relevanssi_do_query' ) ) {
	relevanssi_do_query( $query );
}

$posts_ids = [];

while ( $query->have_posts() ) {
	$query->the_post();
	$id = get_the_ID();
	if (get_post_type() === 'knowledge') {
		if (!empty(get_field('knowledgebase_topic', $id))) {
			$posts_ids[] = $id;
		}
	} else {
		$posts_ids[] = $id;
	}
}

get_header();

/* Static FE */
Load::organism( 'search/search-results', [
	'posts_ids' => $posts_ids,
] );

get_footer();
