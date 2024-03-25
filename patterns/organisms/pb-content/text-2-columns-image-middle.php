<?php
/**
 * Text 2 columns with image in the middle
 */
$args = wp_parse_args($args, [
	'text_1'        => '',
	'text_2'        => '',
	'section_image' => [],
]);

if (!empty($args['text_1']) || !empty($args['text_2'])) :
	$text_1 = do_shortcode($args['text_1']);
	$text_2 = do_shortcode($args['text_2']); ?>
	<div class="container clearfix pb__text-2cmi">
		<div class="row">
			<div class="col-md-6 space-p-sm-bottom-10 space-p-sm-top-10">
				<div class="pb__text-2cmi-left">
					<div class="pb__text-2cmi-left-figure"></div>
					<?= $text_1 ?>
				</div>
			</div>
			<?php if (!empty($args['section_image'])) : ?>
				<img class="pb__text-2cmi-img"
					 src="<?= spring_tmb_acf($args['section_image'], 'thumbnail', 'thumbnail') ?>"
					 alt="<?= $args['section_image']['alt'] ?>">
			<?php endif; ?>
			<div class="col-md-6 space-p-sm-bottom-10 space-p-sm-top-10">
				<div class="pb__text-2cmi-right">
					<div class="pb__text-2cmi-right-figure"></div>
					<?= $text_2 ?>
				</div>
			</div>
		</div>
	</div>
<?php endif;
