<?php
use Lean\Load;
use Fashion\Modules\Articles\Category;

get_header();

global $cat;
$current = get_category( absint( $cat ) );
if ( empty( $current ) || is_null( $current ) ) {
	$categories = get_the_category();
	$current = empty( $categories ) ? null : $categories[0];
}

if ( is_null( $current ) || ! $current instanceof WP_Term ) {
	return;
}

$acf_id = sprintf( 'term_%s', $current->term_id );
$featured_post = get_field( 'category_featured_post', $acf_id );

if ( ! $featured_post ) {
	$articles = new Category([
		'no_found_rows' => true,
		'posts_per_page' => 1,
		'tax_query' => [
			[
				'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $current->term_id,
			],
		],
	]);
	$list = $articles->generate_list();
	$featured_post = empty( $list['data'] ) ? 0 : $list['data'][0];
}
?>

<div class='category-template' data-categories>

<?php
	Load::organism( 'hero-secondary/hero-secondary', [
		'post_id' => $featured_post,
	]);

	$exclude = [];
	if ( $featured_post ) {
		$exclude[] = $featured_post;
	}

	Load::organism( 'article/category-list', [
		'title' => single_cat_title( '', false ),
		'category_id' => $current->term_id,
		'exclude' => $exclude,
	]);
?>

</div>

<?php
get_footer();
