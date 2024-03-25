<?php
$args = wp_parse_args($args, [
	'text' => '',
	'image' => [],
	'background' => 'dark',
	'arrow_link' => [
		'url' => '',
		'title' => '',
		'target' => '',
	],
]);

$ctaClass = 'pb-cta-ti__txt-' . $args['background'];

if (!empty($args['text'])) : ?>
	<div class="pb-cta-ti">
		<div class="pb-cta-ti__txt <?= $ctaClass ?>">
			<div class="pb-cta-ti__txt-box">
				<?= do_shortcode($args['text']) ?>
				<?php if (!empty($args['arrow_link']['url'])) : ?>
					<div class="pb-cta-ti__link-box">
						<a href="<?= $args['arrow_link']['url'] ?>"
						   target="<?= $args['arrow_link']['target'] ?>"
						   title="<?= $args['arrow_link']['title'] ?>"
						   class="pb-cta-ti__link"></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="pb-cta-ti__img"
			 style="background-image: url(<?= spring_tmb_acf($args['image'], 'medium', 'large') ?>)"></div>
	</div>
<?php endif;

