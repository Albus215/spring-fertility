<?php
/**
 * Team Swiper
 */

$args = wp_parse_args($args, [
	'members' => [],
	'title'   => __('Providers'),
]);

if (!empty($args['members'])) :
	$members = $args['members'];
	$title = $args['title']; ?>
	<section class="team-swiper">
		<?php if (!empty($title)) : ?>
			<h2 class="text-center space-m-bottom-50 space-m-top-0"><?= $title ?></h2>
		<?php endif; ?>
		<div class="team-swiper team-swiper-count-<?= count($members) ?>">
			<div class="team-grid">
				<?php foreach ($members as $member) :
					/**
					 * @var WP_Post $member
					 */
					$memberName = get_field('team_name', $member->ID);
					$memberPosition = get_field('team_specialty', $member->ID);
					$memberPhoto = get_field('team_photo', $member->ID);
					$memberPageLink = get_field('team_isfeatured', $member->ID) ?
						get_permalink($member) : '';

					$memberConsult_btn = wp_parse_args(get_field('team_consult_button', $member->ID), [
						'url'    => 'https://springfertility.com/book-a-consult/',
						'title'  => __('BOOK'),
						'target' => '',
					]);

					$memberLocations = get_field('team_location', $member->ID);
					$memberLocationsCustomTitle = get_field('team_location_custom_title', $member->ID);
					$memberLocationsNames = [];
					if (!empty($memberLocationsCustomTitle)) {
						$memberLocationsNames[] = $memberLocationsCustomTitle;
					} elseif (!empty($memberLocations)) {
						foreach ($memberLocations as $location) $memberLocationsNames[] = $location->name;
					}

					?>
					<div class="team-grid-item">
						<div class="team-swiper__box">
							<div class="team-swiper__img-box">
								<?php if (!empty($memberPageLink)) : ?>
									<a class="team-swiper__img"
									   href="<?= $memberPageLink ?>"
									   style="background-image: url(<?= $memberPhoto ?>)">
									</a>
								<?php else : ?>
									<div class="team-swiper__img"
										 style="background-image: url(<?= $memberPhoto ?>)">
									</div>
								<?php endif; ?>
							</div>
							<div class="team-swiper__info-box">
								<?php if (!empty($memberPageLink)) : ?>
									<a href="<?= $memberPageLink ?>" class="team-swiper__name"><?= $memberName ?></a>
								<?php else : ?>
									<div class="team-swiper__name"><?= $memberName ?></div>
								<?php endif; ?>
								<div class="team-swiper__pos"><?= $memberPosition ?></div>
								<?php if (!empty($memberLocationsNames)) : ?>
									<div class="team-swiper__locs"><?= implode(' | ', $memberLocationsNames) ?></div>
								<?php endif; ?>
								<?php if (!empty($memberConsult_btn['url']) && !empty($memberConsult_btn['title']) && !empty($memberPageLink)) : ?>
									<div class="team-swiper__btn-box">
										<a class="team-swiper__btn"
										   href="<?= $memberConsult_btn['url'] ?>"
										   target="<?= $memberConsult_btn['target'] ?>">
											<?= $memberConsult_btn['title'] ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif;
