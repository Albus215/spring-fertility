<?php
/**
 * Description And Image
 */
$args = wp_parse_args($args, [
	'text'  => '',
	'image' => [],
	'button' => [
		'url' => '',
		'title' => '',
		'target' => '',
	],
]);

if (!empty($args['text'])) : ?>
	<div class="pb-descr-i">
		<div class="container clearfix space-p-top-75 space-p-bottom-50">
			<div class="row space-p-top-75 space-p-sm-top-25">
				<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
					<?= do_shortcode($args['text']) ?>
				</div>
			</div>
		</div>
		<img class="pb-descr-i__img"
			 src="<?= $args['image']['url'] ?>"
			 alt="<?= $args['image']['alt'] ?>">
	</div>
	<?php if (!empty($args['button']['url'])) : ?>
		<div class="container clearfix space-p-top-50 space-p-bottom-50 space-p-sm-top-25 space-p-sm-bottom-25 text-center">
			<a class="btn-dark-blue-outline"
			   href="<?= $args['button']['url'] ?>"
			   target="<?= $args['button']['target'] ?>">
				<?= $args['button']['title'] ?>
			</a>
		</div>
	<?php endif; ?>
<?php endif;
