<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'hero_img' => '',
	'hero_title' => '',
	'hero_txt' => '',
	'hero_bg_dark' => false,
	'hero_short' => false,
]);

$heroBgClass = $args['hero_bg_dark'] ? ' o__hero-general-background-dark ' : '';
$heroClass = $args['hero_short'] ? ' o__hero-general-short ' : '';

?>

<div class="o__hero-general <?= $heroClass ?>">
	<div class="o__hero-general-background <?= $heroBgClass ?>"
		style="background-image: url( ' <?php echo esc_url( $args['hero_img'] ); ?> ' );">
	</div>
	<div class="o__hero-general-text">
		<div class="o__hero-general-title"><?php echo $args['hero_title']; ?></div>
		<div class="o__hero-general-txt"><?php echo $args['hero_txt']; ?></div>
	</div>
</div>
