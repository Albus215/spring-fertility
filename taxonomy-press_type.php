<?php

use Lean\Load;

get_header();

$qobj = get_queried_object();

$press = new WP_Query([
	'posts_per_page' => 50,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_type'      => 'press',
	'tax_query'      => [
		[
			'taxonomy' => 'press_type',
			'field'    => 'slug',
			'terms'    => $qobj->slug,
		],
	],
]);

$qobjAtts = get_field('attributes', $qobj);
Load::organism('hero-press/hero-press', [
	'title'                 => $qobj->name,
	'type_background_image' => !empty($qobjAtts['background_image']) ? $qobjAtts['background_image'] : false,
]);

Load::organism('press-list/press-cats', [
	'title' => $qobj->name,
]);

Load::organism('press-list/press-list', [
	'posts' => $press,
]);

Load::organism('blog/blog-pagination');

get_footer();
