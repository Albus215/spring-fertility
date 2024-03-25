<?php

$args = wp_parse_args($args, [
	'categories' => [],
	'title' => get_the_title(get_option('page_for_posts')),
]);

?>

<div class="o__hero-blog">
	<div class="o__hero-blog-background"
		 style="background-image: url(' <?php esc_url(the_field('blog_press_list_hero', get_option('page_for_posts'))); ?> ');">
	</div>
	<div class="o__hero-blog-text">
		<h1 class="o__hero-blog-title"><b><?php echo esc_html($args['title']); ?></b></h1>
<!--		<div class="o__hero-blog-categories">-->
<!--			<ul>-->
<!--				--><?php
//				wp_list_categories([
//					'orderby' => 'name',
//					'show_option_none' => '',
//					'show_count' => false,
//					'title_li' => false,
//					'exclude' => [1, hide_pressreleases($args)],
//				]);
//				?>
<!--			</ul>-->
<!--		</div>-->
	</div>
</div>
