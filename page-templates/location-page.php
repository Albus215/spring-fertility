<?php
/**
 * Template Name: Location Page
 */

use Lean\Load;

/**
 * Template Name: General
 */
get_header();

$pageHeader = get_field('location_header');
$pageContent = get_field('location_layout');

Load::organisms('general-hero/general-hero', [
	'hero_img' => $pageHeader['image']['url'],
	'hero_title' => $pageHeader['title'],
	'hero_txt' => $pageHeader['subtitle'],
]);

$leftImageLink = wp_parse_args(
	$pageContent['left_image_link'] ,
	[
		'url' => '',
		'title' => '',
		'target' => '_blank',
	]
);

?>
	<section class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-10 col-lg-8 log-block-center">
					<div class="clearfix space-p-top-50">
						<?php echo $pageContent['top_content'] ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="clearfix space-p-bottom-25">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="clearfix space-p-top-25 space-p-bottom-25">
						<a href="<?php echo $leftImageLink['url'] ?>"
						   target="_blank">
							<img class="img-responsive center-block"
								 src="<?php echo $pageContent['top_left_image']['url'] ?>"
								 alt="<?php echo $pageContent['top_left_image']['alt'] ?>">
						</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="clearfix space-p-top-25 space-p-bottom-25 loc__content-block">
						<?php echo do_shortcode($pageContent['top_right_content']) ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="loc-page__offerings clearfix space-m-top-25">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="clearfix space-p-top-25 space-p-bottom-25 loc__content-block">
						<?php echo do_shortcode($pageContent['offerings_content']) ?>
					</div>
				</div>
				<div class="loc-page__offerings-img"
					 style="background-image: url(<?php echo $pageContent['offerings_image']['url'] ?>)"></div>
			</div>
		</div>
	</section>

	<section class="clearfix space-p-bottom-50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="clearfix space-p-top-25">
						<h2 class="text-center">
							<?php echo $pageContent['getting_here_title'] ?>
						</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="clearfix space-p-top-25 space-p-bottom-25 loc__content-block">
						<?php echo $pageContent['getting_here_content_left'] ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="clearfix space-p-top-25 space-p-bottom-25 loc__content-block">
						<?php echo $pageContent['getting_here_content_right'] ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="loc-page__team">
		<div class="loc-page__team-txt clearfix">
			<div class="row">
				<div class="col-sm-12 col-md-9 col-lg-6 log-block-center">
					<?php echo $pageContent['team_content'] ?>
				</div>
			</div>
		</div>

		<?php if (!empty($pageContent['team_members'])) : ?>
			<div class="loc-page__team-members">
				<div class="container">
					<div class="loc-page__team-members-row">
						<?php foreach ($pageContent['team_members'] as $team_member) :
							$linkUrl = !empty($team_member['link']['url']) ? $team_member['link']['url'] : '#';
							$linkTarget = !empty($team_member['link']['target']) ? $team_member['link']['target'] : '';

						?>
							<div class="loc-page__team-member col-md-4">
								<a href="<?= $linkUrl ?>" target="<?= $linkTarget ?>"
								   class="loc-page__team-member-img" style="background-image: url(<?php echo $team_member['image']['url']; ?>)"></a>
								<a href="<?= $linkUrl ?>" target="<?= $linkTarget ?>"
								   class="loc-page__team-member-name"><?php echo $team_member['name']; ?></a>
								<p class="loc-page__team-member-pos"><?php echo $team_member['position']; ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</section>

<?php

Load::organism('home-singlecta/cta-with-background', $pageContent['cta']);

get_footer();
