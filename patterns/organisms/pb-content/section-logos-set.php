<?php
/**
 * Logos Set Section
 */
$args = wp_parse_args($args, [
	'text'       => '',
	'logos'      => [],
	'background' => '',
	'layout' => 3,
]);
$args['layout'] = intval($args['layout']);
//var_dump($args['layout']);
if (!empty($args['logos'])) :
	$logosArray = $args['layout'] === 4 ? array_chunk($args['logos'], 4) : array_chunk($args['logos'], 3);
	$logosBoxClass = $args['layout'] === 4 ? 'col-lg-3 col-md-3 col-sm-6' : 'col-lg-4 col-md-4 col-sm-6';
	$sectionClass = 'pb__lset-' . $args['background'];
	?>
	<section class="pb__lset <?= $sectionClass ?>">
		<div class="container clearfix">
			<div class="row pb__lset-txt">
				<div class="col-sm-12">
					<div class="the-content"><?= do_shortcode($args['text']) ?></div>
				</div>
			</div>
		</div>
		<div class="container clearfix pb__lset-logos-wrap">
			<?php foreach ($logosArray as $logos) : ?>
				<div class="row pb__lset-logos">
					<?php foreach ($logos as $logo) :
						$logoExternalUrl = get_field('external_url', $logo['ID']);
						?>
						<div class="pb__lset-logo <?= $logosBoxClass ?>">
							<div class="pb__lset-logo-img">
								<div class="<?= !empty($logo['description']) ? 'pb__lset-logo-w-description' : '' ?>">
									<?php if (empty($logoExternalUrl)) : ?>
										<img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
									<?php else : ?>
										<a href="<?= $logoExternalUrl ?>" target="_blank">
											<img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
										</a>
									<?php endif; ?>
									<?php if (!empty($logo['description'])) : ?>
										<p class="pb__lset-logo-description"><?= $logo['description'] ?></p>
									<?php endif; ?>
								</div>
							</div>
							<?php if (!empty($logo['caption'])) : ?>
								<p class="pb__lset-logo-caption"><?= $logo['caption'] ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif;
