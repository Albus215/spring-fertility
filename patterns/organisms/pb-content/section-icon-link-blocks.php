<?php
/**
 * Icon Link Blocks
 */

$args = wp_parse_args($args, [
	'icon_link_blocks' => [],
]);

if (!empty($args['icon_link_blocks'])) :
	$ilBlocks = $args['icon_link_blocks'];
	?>
	<div class="container clearfix space-p-top-25 space-p-bottom-25">
		<div class="row">
			<?php foreach ($ilBlocks as $ilBlock) : ?>
				<div class="col-md-4 col-sm-7 pb-ilb__col <?= $ilBlock['class'] ?>">
					<div class="pb-ilb">
						<a class="pb-ilb__ico"
						   href="<?= $ilBlock['link']['url'] ?>"
						   target="<?= $ilBlock['link']['target'] ?>"
						   style="background-image: url(<?= $ilBlock['icon']['url'] ?>)"></a>
						<h4 class="pb-ilb__title">
							<a href="<?= $ilBlock['link']['url'] ?>"
							   target="<?= $ilBlock['link']['target'] ?>">
								<?= $ilBlock['title'] ?>
							</a>
							<?php if (!empty($ilBlock['text'])) : ?>
								<span class="pb-ilb__txt-trigger"></span>
								<div class="pb-ilb__txt">
									<?= $ilBlock['text'] ?>
								</div>
							<?php endif; ?>
						</h4>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif;
