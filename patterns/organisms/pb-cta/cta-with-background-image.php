<?php
/**
 * CTA with background Image
 */
$args = wp_parse_args($args, [
	'title' => '',
	'subtitle' => '',
	'text' => '',
	'image' => [
		'url' => '',
		'title' => ''
	]
]);

?>

<div class="pb__cta-with-bg space-m-top-50 space-m-bottom-50"
	 style='background-image: url("<?= spring_tmb_acf($args['image'], 'medium', 'large') ?>")'>
	<div class="pb__cta-with-bg-content">
		<h2><?= $args['title'] ?></h2>
		<p><?= $args['subtitle'] ?></p>
		<div >
			<?= $args['text']?>
		</div>
	</div>
</div>
