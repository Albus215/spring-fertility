<?php
global $post;

$args = wp_parse_args($args, [
	'title'                 => '',
	'type_background_image' => false,
]);

$typeBgImg = !empty($args['type_background_image']) ?
	$args['type_background_image']['url'] :
	get_field('blog_press_list_hero', $post->ID);

?>

<div class="o__hero-press">
	<div class="o__hero-press-background"
		 style="background-image: url(' <?php echo esc_url($typeBgImg); ?> ');">
	</div>

	<div class="o__hero-press-text">

		<h1 class="o__hero-press-title"><b><?php echo esc_html($args['title']); ?></b></h1>

	</div>
</div>
