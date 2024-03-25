<?php
/**
 * Raw Text (HTML)
 */
$args = wp_parse_args($args, [
	'section_id' => '',
	'text' => '',
]);
?>
<section class="pb__raw-txt" id="<?= $args['section_id'] ?>"><?= do_shortcode($args['text']) ?></section>
