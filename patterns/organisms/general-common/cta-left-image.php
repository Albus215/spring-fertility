<?php
/**
 * CTA with image on the left
 */

$args = wp_parse_args($args, [
	'content' => '',
	'image' => [],
	'button' => [],
]);
$content = $args['content'];
$image = $args['image'];
$button = $args['button'];

?>

<div class="o__cta-limg container">
	<div class="o__cta-limg__img-col col-sm-12 col-md-6">
		<img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
	</div>
	<div class="o__cta-limg__txt-col col-sm-12 col-md-6">
		<div class="o__cta-limg__txt-wrap">
			<?php if (!empty($content)) : ?>
				<?= do_shortcode($content); ?>
			<?php endif; ?>
			<?php if (!empty($button)) : ?>
			<div style="padding-top: 20px">
				<a class="btn"
				   href="<?= $button['url'] ?>" target="<?= $button['target'] ?>">
					<?= $button['title'] ?>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
