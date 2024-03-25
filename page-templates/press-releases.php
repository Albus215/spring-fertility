<?php

use Lean\Load;

/**
 * Template Name: Press releases
 */

global $post;

get_header();

$press_query_args = [
	'posts_per_page' => 50,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_type' => 'press',
];

Load::organism('hero-press/hero-press', [
	'title' => get_the_title($post->ID),
]);

Load::organism('press-list/press-cats', [
	'title' => get_the_title($post->ID),
]);

$press_posts_cats = get_terms([
	'orderby' => 'name',
	'order' => 'ASC',
	'taxonomy' => 'press_type',
	'hide_empty' => false,
]);
$press_posts_arr = [];
foreach ($press_posts_cats as $cat) {
	/** @var $cat WP_Term */
	$press_posts_arr[] = [
		'id' => $cat->term_id,
		'title' => $cat->name,
		'posts' => new WP_Query(array_merge(
			$press_query_args,
			[
				'tax_query' => [
					[
						'taxonomy' => 'press_type',
						'field' => 'id',
						'terms' => [$cat->term_id],
					],
				],
			]
		)),
	];
}
// then - display posts by cats
foreach ($press_posts_arr as $posts_i => $posts) {
	?>
	<div class="container">
		<h2 class="o__blog-cat-big-title"><b><?= $posts['title'] ?></b></h2>
	</div>
	<?php
	Load::organism('press-list/press-list', [
		'posts' => $posts['posts'],
	]);
	if ($posts_i == 0) Load::organism('blog/blog-cta-springtips');
}

Load::organism('blog/blog-pagination');

get_footer();
