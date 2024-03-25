<?php

/**
 * Text Block
 */
$args = wp_parse_args($args, [
	'text_1'            => '',
	'text_2'            => '',
	'hide_this_section' => false,
]);

if (empty($args['hide_this_section'])) :

	if (!empty($args['text_1']) || !empty($args['text_2'])) :
		$text_1 = do_shortcode($args['text_1']);
		$text_2 = do_shortcode($args['text_2']); ?>
		<div class="clearfix pb__text-two-columns" style="background-color: #fefaf7;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 space-p-sm-bottom-10">
						<?= $text_1 ?>
					</div>
					<div class="col-md-6">
						<?= $text_2 ?>
					</div>
				</div>
			</div>
		</div>
<?php endif;
endif;
