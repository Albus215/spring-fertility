<?php
/**
 * 3 Image-Text Blocks in a row
 */
$args = wp_parse_args($args, [
	'image_text_blocks' => '',
]);

?>

<div class="container">
	<div class="pb__text-blocks row">
		<?php foreach ($args['image_text_blocks'] as $item): ?>
			<div class="col-sm-12 col-md-4">
				<div class="pb__text-block-image-wrapper">
					<?php if (!empty($item['link']['url'])) : ?>
						<a class="pb__text-block-image"
						   href="<?= $item['link']['url'] ?>"
						   target="<?= $item['link']['target'] ?>"
						   style='background-image: url("<?= spring_tmb_acf($item['image'], 'thumbnail','thumbnail') ?>")'></a>
					<?php else : ?>
						<div class="pb__text-block-image"
							 style='background-image: url("<?= spring_tmb_acf($item['image'], 'thumbnail','thumbnail') ?>")'></div>
					<?php endif; ?>
				</div>
				<div
					class="pb__text-block-text <?= next($args['image_text_blocks']) ? 'pb__text-blocks_border-bottom' : '' ?>">
					<?php if (!empty($item['link']['url'])) : ?>
						<h4 class="pb__text-block-img-link"><b><a href="<?= $item['link']['url'] ?>"
								  target="<?= $item['link']['target'] ?>">
									<?= $item['link']['title'] ?>
								</a></b></h4>
					<?php endif; ?>
					<?= $item['text'] ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
