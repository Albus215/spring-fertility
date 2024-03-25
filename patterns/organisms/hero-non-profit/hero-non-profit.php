<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'post_id' => '',
]);

?>

<div class="o__hero-nonprofit">
	<div class="o__hero-nonprofit-background"
		alt="Mama Rescue"
		style="background-image: url( ' <?php esc_url( the_field( 'non_profit_hero_image', $args['post_id'] ) ); ?> ' );">
		
	</div>
	<div class="o__hero-nonprofit-text">
		<h2 class="o__hero-nonprofit-title"><?php the_field( 'non_profit_hero_title', $args['post_id'] ); ?></h2>
		<p><?php esc_html( the_field( 'non_profit_hero_text', $args['post_id'] ) ); ?></p>
	</div>

	<div class="o__hero-non-profit-scroll">
		<span class="js-hero-scroll"><?php use_icon( 'arrow_down', 'icon-arrow-down' ); ?></span>
	</div>

</div>

