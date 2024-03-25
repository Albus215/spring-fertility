<?php

use Lean\Load;

$featured_post = get_posts([
	'numberposts' => 1,
	'meta_key'    => 'post_featured',
	'meta_value'  => 1,
]);

// first exclude press-releases
$press = get_category_by_slug('press-releases');
$all = intval(get_option('default_category'));

get_header();

?>
	<section class="o__videos" data-href="#all-videos">
		<?php
		Load::organism('hero-blog/hero-blog', [
			'categories' => get_categories(),
		]);

		Load::organism('videos/categories', [
			'categories' => get_categories(['exclude' => [$press->term_id, $all]]),
		]);

		Load::organism('search-on-page/search-section');

		$blog_query_args = [
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'numberposts'      => -1,
			'category__not_in' => $press->term_id,
			'orderby'          => [
				'menu_order' => 'ASC',
				'date'       => 'DESC',
			],
		];

		// first - group posts by cats
		$blog_posts_arr = [];
		$blog_posts_cats = get_categories([
//	'orderby' => 'name',
//	'order'   => 'ASC',
'exclude' => [$press->term_id],
		]);

		if (!empty($blog_posts_cats)) {
			foreach ($blog_posts_cats as $cat) {
				/** @var $cat WP_Term */
				if ($cat->term_id !== $all) {
					$blog_posts_arr[] = [
						'category_id'    => $cat->term_id,
						'category_title' => $cat->name,
						'category_posts' => get_posts(array_merge(
							$blog_query_args,
							[
								'cat' => $cat->term_id,
							]
						)),
					];
				}
			}
		} else {
			$blog_posts_arr[] = [
				'category_id'    => $all,
				'category_title' => 'All',
				'category_posts' => get_posts($blog_query_args),
			];
		}

		// then - display posts by cats
		Load::organism('videos/groups-list', [
			'groups' => $blog_posts_arr,
		]);


		?>
	</section>
<?php

Load::organism('videos/cta');

// ---
// Old Version
// ---
//if ( empty( $featured_post ) ) {
//	Load::organism( 'blog/blog-featured', [
//		'post' => $posts[0],
//	] );
//} else {
//	Load::organism( 'blog/blog-featured', [
//		'post' => $featured_post[0],
//	] );
//}
//
//Load::organism( 'blog/blog-list', [
//	'posts' => $blog_posts,
//	'featured_post_id' => empty( $featured_post ) ? $posts[0]->ID : $featured_post[0]->ID,
//] );
//
//Load::organism( 'blog/blog-pagination' );
// ---
// Old Version END
// ---

get_footer();
