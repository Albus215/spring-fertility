<?php
/**
 * Text Block
 */
$args = wp_parse_args($args, [
	'text_1'           => '',
	'text_2'           => '',
	'text_3'           => '',
	'background_color' => '',
]);

if (empty($args['hide_this_section'])) :

	if (!empty($args['text_1']) || !empty($args['text_2']) || !empty($args['text_3'])) :
		$text_1 = do_shortcode($args['text_1']);
		$text_2 = do_shortcode($args['text_2']);
		$text_3 = do_shortcode($args['text_3']);
		?>
		<div class="clearfix"
			<?= !empty($args['background_color']) ? (' style="background: ' . $args['background_color'] . '" ') : '' ?>>
			<div class="container clearfix pb__text-three-columns">
				<div class="row">
					<div class="col-md-4 space-p-sm-bottom-10 space-p-sm-top-10 the-content">
						<?= $text_1 ?>
					</div>
					<div class="col-md-4 space-p-sm-bottom-10 space-p-sm-top-10 the-content">
						<?= $text_2 ?>
					</div>
					<div class="col-md-4 space-p-sm-bottom-10 space-p-sm-top-10 the-content">
						<?= $text_3 ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;
endif;
