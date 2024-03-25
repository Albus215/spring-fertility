<?php
/**
 * Text + Image Links (IVF links Home)
 */
$args = wp_parse_args($args, [
	'' => '',
]);

?>

<div class="container pb__text-links space-m-top-75 space-m-bottom-75">
	<div class="row">
		<div class="col-sm-12 col-md-offset-1 col-md-5 pb__text-links_text">
			<?= $args['text'] ?>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="pb__card-container">
				<a class="pb__card-link" href="<?= $args['image_links'][0]['link']['url'] ?>">
				<div class="pb__card pb__card-container_upper" style='background-image: url("<?= $args['image_links'][0]['image']['url'] ?>")'>
					<h3 class="pb__card-text"><?= $args['image_links'][0]['link']['title'] ?></h3>
					<div class="pb__card-arrow pb__card-arrow-white"></div>
				</div>
				</a>
				<a class="pb__card-link" href="<?= $args['image_links'][1]['link']['url'] ?>">
				<div class="pb__card pb__card-container_down" style='background-image: url("<?= $args['image_links'][1]['image']['url'] ?>")'>
					<h3 class="pb__card-text"><?= $args['image_links'][1]['link']['title'] ?></h3>
					<div class="pb__card-arrow pb__card-arrow-dark-blue"></div>
				</div>
				</a>
			</div>
		</div>
	</div>
</div>
