<?php
$args = wp_parse_args($args, [
	'image' => '',
	'content' => '',
	'image_right' => false,
]);

if ($args['image_right']) : ?>

	<div class="container clearfix mtop50">
		<div class="row">
			<div class="col-md-6 col-lg-5 mtop50">
				<div class="clearfix">
					<?= do_shortcode($args['content']) ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-7 mtop50">
				<img class="img-responsive" style="margin: auto" src="<?= $args['image'] ?>">
			</div>
		</div>
	</div>

<?php else : ?>

	<div class="container clearfix mtop50">
		<div class="row">
			<div class="col-md-6 col-lg-7 mtop50">
				<img class="img-responsive" src="<?= $args['image'] ?>">
			</div>
			<div class="col-md-6 col-lg-5 mtop50">
				<div class="clearfix">
					<?= do_shortcode($args['content']) ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
