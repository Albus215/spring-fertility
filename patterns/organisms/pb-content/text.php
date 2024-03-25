<?php
/**
 * Text Block
 */
$args = wp_parse_args($args, [
	'text'              => '',
	'width'             => 100,
	'hide_this_section' => false,
	'background'        => '',
]);


if (empty($args['hide_this_section'])) :

	$textWidth = intval($args['width']);

	$textWidthClassMap = [
		100 => 'col-sm-12',
		75  => 'col-lg-offset-1 col-lg-10 col-md-12 col-sm-12',
		66  => 'col-lg-offset-2 col-md-offset-1 col-lg-8 col-md-10 col-sm-12',
		50  => 'col-lg-offset-3 col-md-offset-2 col-lg-6 col-md-8 col-sm-12',
	];

	$textWidthClass = $textWidthClassMap[$textWidth];

	if (!empty($args['text'])) : ?>
		<div class="clearfix"
			<?= !empty($args['background']) ? (' style="background: ' . $args['background'] . '" ') : '' ?>>
			<div class="container clearfix">
				<div class="row">
					<div class="<?= $textWidthClass ?>">
						<?= do_shortcode($args['text']) ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;
endif;

