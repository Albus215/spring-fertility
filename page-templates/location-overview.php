<?php
/**
 * Template Name: Location Overview
 */

use Lean\Load;

/**
 * Template Name: General
 */
get_header();

$pageHeader = get_field('location_header');
$pageContent = get_field('location_layout');

$redMsg = get_field('red_message_text', 'option');
$redMsgShowOn = get_field('red_message_show_on', 'option');
if (empty($redMsgShowOn) || $redMsgShowOn === 'none') $redMsg = '';

Load::organisms('general-hero/general-hero', [
	'hero_img'   => $pageHeader['image']['url'],
	'hero_title' => $pageHeader['title'],
	'hero_txt'   => $pageHeader['subtitle'],
]);

?>

	<div class="clearfix">
		<div class="container space-m-top-50 space-m-bottom-25">
			<div class="col-md-6">
				<div class="clearfix space-p-top-25 space-p-bottom-25">
					<img class="img-responsive center-block"
						 src="<?= $pageContent['image']['url'] ?>"
						 alt="<?= $pageContent['image']['alt'] ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="clearfix space-p-top-25 space-p-bottom-25 loc__content-block">
					<?= do_shortcode($pageContent['content']) ?>
				</div>
			</div>
		</div>
	</div>

<?php if ($pageContent['locations_display_style'] === 'style_1') :
	$locationsArray = array_chunk($pageContent['locations'], 3);
	?>
	<div class="container clearfix space-m-top-25 space-m-bottom-25">
		<?php foreach ($locationsArray as $locations) : ?>
			<div class="row">
				<?php foreach ($locations as $loc) : ?>
					<div class="col-md-4 text-center loc-link-block">
						<a href="<?= $loc['link']['url'] ?>"
						   target="<?= $loc['link']['target'] ?>"
						   class="loc-link-block__img"
						   style="background-image: url(<?= $loc['image']['url'] ?>)"></a>
						<h3 class="loc-link-block__title">
							<a href="<?= $loc['link']['url'] ?>"
							   target="<?= $loc['link']['target'] ?>"><?= $loc['link']['title'] ?></a>
						</h3>
						<div class="loc-link-block__description">
							<?= $loc['description'] ?>
						</div>
						<div class="loc-link-block__link-wrap">
							<a href="<?= $loc['link']['url'] ?>" target="<?= $loc['link']['target'] ?>"
							   class="loc-link-block__link"></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		<?php if (!empty($redMsg)) : ?>
			<div class="row">
				<div class="col-sm-12">
					<p style="color: #f67866; font-weight: bold; text-align: center; margin: 0">
						<?php echo $redMsg; ?>
					</p>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php elseif ($pageContent['locations_display_style'] === 'style_2') :
	$locationsArray = array_chunk($pageContent['locations'], 2);
	?>
	<div class="container clearfix space-m-top-25 space-m-bottom-25">
		<?php foreach ($locationsArray as $locations) : ?>
			<div class="row">
				<?php foreach ($locations as $locKey => $loc) :
					$locBlockClass = $locKey === 0 ? '' : 'col-lg-offset-2';
					$locStyleCenter = !isset($locations[1]) ? (' style="float: none;" ') : '';
					?>
					<div class="col-sm-6 col-lg-5 <?= $locBlockClass ?> loc-link-block-2" <?= $locStyleCenter ?>>
						<?php if (!empty($loc['tag'])) : ?>
							<div class="loc-link-block-2__tag"><?= $loc['tag'] ?></div>
						<?php endif; ?>
						<h3 class="loc-link-block-2__title">
							<a href="<?= $loc['link']['url'] ?>"
							   target="<?= $loc['link']['target'] ?>"><?= $loc['link']['title'] ?></a>
						</h3>
						<div class="loc-link-block-2__description">
							<?= $loc['description'] ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		<?php if (!empty($redMsg)) : ?>
			<div class="row">
				<div class="col-sm-12">
					<p style="color: #f67866; font-weight: bold; text-align: center; margin: 0">
						<?php echo $redMsg; ?>
					</p>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php else :
	$locationsArray = array_chunk($pageContent['locations_groups'], 2);
	?>
	<div class="container clearfix space-m-top-25 space-m-bottom-25">
		<?php foreach ($locationsArray as $locationsGroups) : ?>
			<div class="row">
				<?php foreach ($locationsGroups as $locGroupKey => $locGroup) :
					$locBlockClass = $locGroupKey === 0 ? '' : 'col-lg-offset-2';
					$locStyleCenter = !isset($locationsGroups[1]) ? (' style="float: none;" ') : '';
					?>
					<div class="col-sm-6 col-lg-5 <?= $locBlockClass ?> loc-link-block-3" <?= $locStyleCenter ?>>
						<h2 class="loc-link-block-3__group-title"><?= $locGroup['title'] ?></h2>
						<?php foreach ($locGroup['locations'] as $loc) : ?>
							<div class="loc-link-block-3__box">
								<?php if (!empty($loc['tag'])) : ?>
									<div class="loc-link-block-2__tag"><?= $loc['tag'] ?></div>
								<?php endif; ?>
								<h3 class="loc-link-block-2__title">
									<a href="<?= $loc['link']['url'] ?>"
									   target="<?= $loc['link']['target'] ?>"><?= $loc['link']['title'] ?></a>
								</h3>
								<div class="loc-link-block-2__description">
									<?= $loc['description'] ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		<?php if (!empty($redMsg)) : ?>
			<div class="row">
				<div class="col-sm-12">
					<p style="color: #f67866; font-weight: bold; text-align: center; margin: 0">
						<?php echo $redMsg; ?>
					</p>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php

Load::organism('home-singlecta/cta-with-background', $pageContent['cta']);

get_footer();
