<?php
/**
 * Section From Blue
 *
 * @var string $text
 * @var string $section_id
 */
$args = wp_parse_args($args, [
	'text'       => '',
	'section_id' => '',
]);

$text = $args['text'];
$section_id = $args['section_id'];

if (!empty($text)) : ?>
<section id="<?= $section_id ?>" class="pb__f-blue">
	<div class="container clearfix">
		<div class="row space-p-top-25">
			<div class="col-lg-8 col-md-10 col-sm-12" style="float: none; margin:  0 auto">
				<div class="clearfix pb__f-blue-txt"><?= do_shortcode($text) ?></div>
			</div>
		</div>
	</div>
</section>
<?php endif;
