<?php
/**
 * Three simple imageblocks
 */

$args = wp_parse_args($args, [
	'title' => '',
	'imageblocks' => [],
]);
$title = $args['title'];
$imageblocks = $args['imageblocks'];

if (!empty($imageblocks)) : ?>
	<div class="o__ts-imgb">
		<div class="container">
			<?php if (!empty($title)) : ?>
				<div class="row">
					<div class="col-sm-12">
						<h3 class="text-center">
							<?= $title ?>
						</h3>
					</div>
				</div>
			<?php endif; ?>
			<div class="row">
				<?php foreach ($imageblocks as $imageblock) : ?>
					<div class="col-sm-12 col-md-4">
						<div class="o__ts-imgb__block text-center">
							<div class="o__ts-imgb__block-img">
								<img src="<?= $imageblock['image']['url'] ?>" alt="<?= $imageblock['image']['alt'] ?>">
							</div>
							<h4 class="o__ts-imgb__block-txt">
								<b><?= $imageblock['title'] ?></b>
							</h4>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif;
