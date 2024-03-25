<?php
/**
 * List Of Facts
 */
$args = wp_parse_args($args, [
	'title' => '',
	'list'  => [],
]);

if (!empty($args['list'])) :
	$factsList = array_chunk($args['list'], 2); ?>
	<section class="o_gc-lof clearfix">
		<div class="container">
			<?php if (!empty($args['title'])) : ?>
				<div class="row">
					<div class="com-sm-12">
						<h2 class="text-center o_gc-lof__title">
							<?= $args['title'] ?>
						</h2>
					</div>
				</div>
			<?php endif; ?>
			<?php foreach ($factsList as $itemsList) : ?>
				<div class="row">
					<div class="col-sm-6 o_gc-lof__item">
						<p class="o_gc-lof__item-title">
							<?= $itemsList[0]['title'] ?>
						</p>
						<p class="o_gc-lof__item-descr">
							<?= $itemsList[0]['description'] ?>
						</p>
					</div>
					<div class="col-sm-6 o_gc-lof__item">
						<p class="o_gc-lof__item-title">
							<?= $itemsList[1]['title'] ?>
						</p>
						<p class="o_gc-lof__item-descr">
							<?= $itemsList[1]['description'] ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif;
