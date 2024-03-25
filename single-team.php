<?php
/**
 *    Single team page
 *
 * @var $toPagePost WP_Post
 * @var $toPage     array
 */

use Lean\Load;

//$toPagePost = get_posts([
//	'numberposts' => 1,
//	'post_type'   => 'page',
//	'post_status' => 'publish',
//	'meta_key'    => '_wp_page_template',
//	'meta_value'  => 'page-templates/team-overview.php',
//])[0];
//
//$toPage = get_field('team_overview_page', $toPagePost->ID);

get_header();

if (have_posts()) :
	while (have_posts()) : the_post();

		/**
		 * @var string    $name
		 * @var string    $position
		 * @var string    $photo
		 * @var string    $bio
		 * @var array     $info
		 * @var WP_Term[] $locations
		 * @var WP_Post[] $coworkers
		 * @var WP_Post[] $testimonials
		 */

		$name = get_field('team_name');
		$position = get_field('team_specialty');
		$photo = get_field('team_photo');
		$bio = get_field('team_bio');
		$info = get_field('team_extra_info');
		$testimonials = get_field('team_testimonials');

		$consult_btn = wp_parse_args(get_field('team_consult_button'), [
			'url'    => 'https://springfertility.com/book-a-consult/',
			'title'  => __('BOOK NOW'),
			'target' => '',
		]);

		$coworkersQuery = [
			'post_type'    => 'team',
			'post_status'  => 'publish',
			'numberposts'  => -1,
			'post__not_in' => [get_the_ID()],
			'orderby'      => 'menu_order',
			'order'        => 'DESC',
		];

		$locations = get_field('team_location');
		$locationsTitles = [];
		$locationsCustomTitle = get_field('team_location_custom_title');
		if (!empty($locationsCustomTitle)) $locationsTitles[] = $locationsCustomTitle;
		else foreach ($locations as $location) $locationsTitles[] = $location->name;

		if (!empty($locations)) {
			$locationsIDs = [];
			foreach ($locations as $location) $locationsIDs[] = $location->term_id;
			$coworkersQuery['tax_query'] = [
				[
					'taxonomy' => 'team_locations',
					'field'    => 'term_id',
					'terms'    => $locationsIDs,
					'operator' => 'IN',
				],
			];
		}
		$coworkers = get_posts($coworkersQuery);

		?>
		<div class="t-single clearfix">
			<div class="container clearfix t-single__container">
				<div class="row">

					<div class="col-md-4">
						<div class="t-single__left-box">
							<div class="t-single__box-name"
								 style="padding: 16px 0 0 0; font-size: 16px; font-weight: bold;">
								<?= $name ?>
							</div>
							<div class="t-single__img-box">
								<div class="t-single__img" style="background-image: url(<?= $photo ?>)"></div>
							</div>
							<div class="t-single__pos"><?= $position ?></div>
							<?php if (!empty($locationsTitles)) : ?>
								<div class="t-single__locs">
									<?php foreach ($locationsTitles as $locationTitle) : ?>
										<span class="t-single__loc"><?= $locationTitle ?><br></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if ($consult_btn['url'] !== '#' || $consult_btn['title'] !== '#') : ?>
								<div class="t-single__btn-box">
									<a href="<?= $consult_btn['url'] ?>"
									   target="<?= $consult_btn['target'] ?>"
									   class="t-single__btn">
										<?= $consult_btn['title'] ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
						<?php if (!empty($info)) : ?>
							<div class="t-single__info-box">
								<?php foreach ($info as $infoBox) : ?>
									<div class="t-single__info">
										<div class="t-single__info-title">
											<?= $infoBox['team_extrainfo_title'] ?>
										</div>
										<div class="t-single__info-txt">
											<?= $infoBox['team_extrainfo_description'] ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="col-md-8">
						<div class="t-single__right-box">
							<h1 class="t-single__name"><?= $name ?></h1>
							<div class="t-single__bio"><?= do_shortcode($bio) ?></div>
							<?php if (!empty($testimonials))
								Load::organisms('testimonials/testimonials-swiper', [
									'testimonials' => $testimonials,
								]); ?>
						</div>
					</div>

				</div>

			</div>

			<?php if (!empty($coworkers))
				Load::organisms('team/team-swiper', [
					'members' => $coworkers,
				]); ?>

		</div>

	<?php endwhile;
endif;

get_footer();
