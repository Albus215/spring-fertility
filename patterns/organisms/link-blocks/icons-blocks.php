<?php
/**
 * Icons BLocks
 */
$args = wp_parse_args($args, [
	'title'       => '',
	'iconsblocks' => [],
]);

if (!empty($args['iconsblocks'])) :
	$linksArray = array_chunk($args['iconsblocks'], 2);
	?>
	<section class="container clearfix o-ib__wrap space-p-top-50 space-p-bottom-50">
		<?php if (!empty($args['title'])) : ?>
			<div class="row">
				<div class="col-sm-12 o-ib__title">
					<h2 class="text-center"><?php echo $args['title']; ?></h2>
				</div>
			</div>
		<?php endif; ?>
		<?php foreach ($linksArray as $links) : ?>
			<div class="row">
				<?php if (!empty($links[0])) :
					$blockTitle = $links[0]['title'];
					$blockIcoUrl = $links[0]['icon']['url']; ?>
					<div class="col-sm-6 o-ib__block-wrap">
						<div class="o-ib__block">
							<div class="o-ib__block-ico"
								 style="background-image: url(<?php echo $blockIcoUrl; ?>)"></div>
							<div class="o-ib__block-txt">
								<?php echo $blockTitle; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if (!empty($links[1])) :
					$blockTitle = $links[1]['title'];
					$blockIcoUrl = $links[1]['icon']['url']; ?>
					<div class="col-sm-6 o-ib__block-wrap">
						<div class="o-ib__block">
							<div class="o-ib__block-ico"
								 style="background-image: url(<?php echo $blockIcoUrl; ?>)"></div>
							<div class="o-ib__block-txt">
								<?php echo $blockTitle; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</section>
<?php endif;
