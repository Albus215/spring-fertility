<?php
/**
 * CTA Evergreen
 */
$args = wp_parse_args($args, [
	'content' => '',
	'image' => [],
]);

if (!empty($args['content']) && !empty($args['image'])) : ?>
	<section class="o_cta-evg">
		<div class="o_cta-evg__txt-wrap">
			<div class="o_cta-evg__txt-box">
				<?php echo do_shortcode($args['content']); ?>
			</div>
		</div>
		<div class="o_cta-evg__img-wrap">
			<div class="o_cta-evg__img-box">
				<img class="o_cta-evg__img" src="<?= $args['image']['url'] ?>" alt="<?= $args['image']['alt'] ?>">
			</div>
		</div>
	</section>
<?php endif;
