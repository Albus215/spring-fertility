<?php
/**
 * CTA With Curve
 *
 * @var array  $image
 * @var string $section_id
 * @var string $text
 */

$args = wp_parse_args($args, [
	'text'       => '',
	'image'      => [],
	'section_id' => '',
]);

$image = $args['image'];
$text = $args['text'];
$section_id = $args['section_id'];

?>
<section id="<?= $section_id ?>" class="pb__cta-w-curve">
	<div class="pb__cta-w-curve-img" style="background-image: url(<?= $image['url'] ?>)"></div>
	<div class="pb__cta-w-curve-txt">
		<div class="pb__cta-w-curve-txt-box"><?= do_shortcode($text) ?></div>
	</div>
</section>

