<?php
use Lean\Load;

include 'home.php'; die();
// coud be restored
$featured_post = get_posts(array(
	'numberposts' => 1,
	'meta_key' => 'post_featured',
	'meta_value' => 1,
));

$press = get_category_by_slug( 'press-releases' );
$blog_posts = new WP_Query( array(
	'category__not_in' => $press->term_id,
) );

get_header();

Load::organism( 'hero-blog/hero-blog', [
	'categories' => get_categories(),
] );

if ( empty( $featured_post ) ) {
	Load::organism( 'blog/blog-featured', [
		'post' => $posts[0],
	] );
} else {
	Load::organism( 'blog/blog-featured', [
		'post' => $featured_post[0],
	] );
}

Load::organism( 'blog/blog-list', [
	'posts' => $blog_posts,
	'featured_post_id' => empty( $featured_post ) ? $posts[0]->ID : $featured_post[0]->ID,
] );

Load::organism( 'blog/blog-pagination' );

get_footer();
