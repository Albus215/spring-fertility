<?php
/**
 * CTA Image And Text
 */
$args = wp_parse_args($args, [
	'text' => '',
	'background' => '',
	'image' => [
		'url' => '',
		'title' => ''
	]
]);

$ctaClass = 'pb__cta-banner-' . $args['background'];
?>

<div class="container-fluid pb__cta-banner <?= $ctaClass ?>">
	<div class="visible-xs row pb__cta-banner_main">
		<div class="col-sm-12">
			<div class="pb__cta-banner_text pb__text-center space-m-top-25 space-m-bottom-25">
				<?= $args['text'] ?>
			</div>
		</div>
		<div class="col-sm-12 pb__cta-banner_image-wrapper">
			<img class="pb__cta-banner_image" src="<?= spring_tmb_acf($args['image'], 'medium', 'large') ?>">
		</div>
	</div>
	<div class="hidden-xs row pb__cta-banner_main">
		<div class="col-sm-12 col-md-6 pb__cta-banner_image-wrapper">
			<img class="pb__cta-banner_image" src="<?= spring_tmb_acf($args['image'], 'medium', 'large') ?>">
		</div>
		<div class="col-sm-12 col-md-4 col-md-offset-1">
			<div class="pb__cta-banner_text space-m-top-25 space-m-bottom-25">
				<?= $args['text'] ?>
			</div>
		</div>
	</div>
</div>
