<?php
/**
 * Events Overview (with filters)
 */
$args = wp_parse_args($args, [
	'hero_text'  => '',
	'hero_image' => [],
]);

$eventCountries = get_terms([
	'taxonomy'   => 'eventbrite_events_country',
	'fields'     => 'all',
	'hide_empty' => true,
]);

$eventGroups = get_terms([
	'taxonomy'   => 'eventbrite_events_group',
	'fields'     => 'all',
	'hide_empty' => true,
]);

$dateNow = date('Y-m-d H:i:s');
$dateNowObject = date_create_from_format('Y-m-d H:i:s', $dateNow);
$eventsQuery = get_posts([
	'post_type'   => 'eventbrite_events',
	'post_status' => 'publish',
	'numberposts' => -1,
	'meta_query'  => [
		'relation' => 'AND',
		[
			'key'     => 'event_date_start',
			'compare' => '>=',
			'value'   => $dateNow,
			'type'    => 'DATETIME',
		],
	],
	'order'       => 'ASC',
	'orderby'     => 'meta_value',
	'meta_key'    => 'event_date_start',
	'meta_type'   => 'DATETIME',
]);

$eventsList = [];
foreach ($eventsQuery as $eventsQueryItem) {
	if ($eventsItemDateShowString = get_field('event_date_show', $eventsQueryItem->ID)) {
		$eventsItemDateShow = date_create_from_format('Y-m-d H:i:s', $eventsItemDateShowString);
		if ($eventsItemDateShow > $dateNowObject) continue;
	}
	$eventsList[] = [
		'id'       => $eventsQueryItem->ID,
		'title'    => ($customTitle = get_field('event_custom_title', $eventsQueryItem->ID)) ?
			$customTitle : $eventsQueryItem->post_title,
		'subtitle' => get_field('event_custom_subtitle', $eventsQueryItem->ID),
		'excerpt'  => !empty($eventsQueryItem->post_content) ? $eventsQueryItem->post_content : $eventsQueryItem->post_excerpt,
		'img'      => has_post_thumbnail($eventsQueryItem) ? get_the_post_thumbnail_url($eventsQueryItem) : '',

		'link_url'    => get_field('event_link', $eventsQueryItem->ID),
		'link_title'  => get_field('event_link_title', $eventsQueryItem->ID),
		'link_target' => get_field('event_link_open_in_a_new_tab', $eventsQueryItem->ID) ? '_blank' : '',

		'date'    => date_create_from_format('Y-m-d H:i:s', get_field('event_date_start', $eventsQueryItem->ID)),
		'date_tz' => get_field('event_date_tz', $eventsQueryItem->ID),

		'type_title' => get_field('event_type', $eventsQueryItem->ID) === 'virtual' ? 'Virtual' : 'In Person',
		'type_id'    => get_field('event_type', $eventsQueryItem->ID),
		'country_id' => get_field('event_country', $eventsQueryItem->ID),
		'group_ids'  => get_field('event_group', $eventsQueryItem->ID),
	];
}

$eventsTree = [];
foreach ($eventGroups as $eventGroup) {
	$eventsTree[$eventGroup->term_id] = [
		'group_id'   => $eventGroup->term_id,
		'group_name' => $eventGroup->name,
		'group_slug' => $eventGroup->slug,
		'events'     => [],
	];

	foreach ($eventsList as $eventsListItem)
		if (in_array($eventGroup->term_id, $eventsListItem['group_ids']))
			$eventsTree[$eventGroup->term_id]['events'][] = $eventsListItem;
}

?>
<section class="o_eo">

	<section class="o_eo__hero clearfix">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-12">
					<div class="o_eo__hero-txt"><?= $args['hero_text'] ?></div>
				</div>
			</div>
		</div>
		<div class="o_eo__hero-bg"></div>
		<div class="o_eo__hero-bg-shape"></div>
		<div class="o_eo__hero-img"
			 style="background-image: url(<?= $args['hero_image']['url'] ?>)"></div>
	</section>

	<section class="container clearfix o_eo__filter-container">
		<div class="row">
			<div class="col-sm-12 o_eo__filter-column">

				<form class="o_eo__filter"
					  data-eo-filter>

					<div class="o_eo__filter-field">
						<button class="o_eo__filter-icon-location" type="button"
								data-eo-filter-location></button>
						<select class="o_eo__filter-dd-country" id="eo-filter-dd-country"
								data-eo-filter-country>
							<option value="all">ALL LOCATIONS</option>
							<?php foreach ($eventCountries as $eventCountry) :
								$ecCoords = get_field('event_country_lat', $eventCountry) . '|' .
									get_field('event_country_lng', $eventCountry);
								?>
								<option value="<?= $eventCountry->slug ?>"
										data-eo-filter-coords="<?= $ecCoords ?>">
									<?= $eventCountry->name ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="o_eo__filter-separator o_eo__filter-separator-2"></div>

					<div class="o_eo__filter-field">
						<label class="o_eo__filter-icon-star" for="eo-filter-dd-type"></label>
						<select class="o_eo__filter-dd-type" id="eo-filter-dd-type"
								data-eo-filter-type>
							<option value="all">ALL EVENT TYPES</option>
							<option value="in-person">IN PERSON</option>
							<option value="virtual">VIRTUAL</option>
						</select>
					</div>

					<div class="o_eo__filter-field">
						<button class="o_eo__filter-btn-go" type="submit"
								data-eo-filter-go>
							<?= __('GO') ?>
						</button>
					</div>
				</form>

			</div>
		</div>
	</section>

	<section class="container clearfix o_eo__list-container"
			 data-eo-container>
		<?php foreach ($eventsTree as $eventsTGroup) : if (empty($eventsTGroup['events'])) continue; ?>
				<div class="o_eo__list-group row"
					 data-eo-group>
					<div class="o_eo__list-group-header col-sm-12 col-xs-12">
						<h2 class="o_eo__list-group-title"><?= $eventsTGroup['group_name'] ?></h2>
					</div>
					<?php foreach ($eventsTGroup['events'] as $event) :
						$evtDate = $event['date'];
						$evtDateFormatted = esc_html($evtDate->format('m/d | g'));
						$evtDateFormatted .= ($evtDate->format('i') !== '00') ? ($evtDate->format(':i')) : '';
						$evtDateFormatted .= $evtDate->format(' A') . ' ';
						$evtDateFormatted .= !empty($event['date_tz']) ? $event['date_tz'] : '';
						if ($event['type_id'] === 'virtual' && ($event['date_tz'] === 'PST' || $event['date_tz'] === 'EST')) {
							$dateDifference = date_interval_create_from_date_string('3 hours');
							if ($event['date_tz'] === 'PST') $evtDate->add($dateDifference);
							else $evtDate->sub($dateDifference);
							$evtDateFormatted .= ' (';
							$evtDateFormatted .= $evtDate->format('g');
							$evtDateFormatted .= ($evtDate->format('i') !== '00') ? ($evtDate->format(':i')) : '';
							$evtDateFormatted .= $evtDate->format(' A') . ' ';
							$evtDateFormatted .= $event['date_tz'] === 'PST' ? 'EST' : 'PST';
							$evtDateFormatted .= ')';
						}

						$evtCountry = get_term($event['country_id']);
						$evtTag = ($event['type_id'] === 'virtual') ?
							$event['type_title'] : ($evtCountry->name . ' | ' . $event['type_title']);

						$evtAttributes = ' ';
						$evtAttributes .= ' o_eo__list-attr-group-' . implode(' o_eo__attribute-group-', $event['group_ids']);
						$evtAttributes .= ' o_eo__list-attr-type-' . $event['type_id'];
						$evtAttributes .= ' o_eo__list-attr-country-' . $evtCountry->slug;
						?>
						<div
							class="o_eo__list-event-col o_eo__list-event-<?= $event['type_id'] ?> <?= $evtAttributes ?> col-lg-6 col-md-6 col-sm-10 col-xs-12"
							id="event-<?= $event['id'] ?>"
							data-eo-event
							data-eo-attr-type="<?= $event['type_id'] ?>"
							data-eo-attr-country="<?= $evtCountry->slug ?>">
							<article class="o_eo__list-event-box">
								<div class="o_eo__list-event-front"
									 style="background-image: url(<?= $event['img'] ?>)">
									<div class="o_eo__list-event-type"><?= $evtTag ?></div>
									<div class="o_eo__list-event-header">
										<p class="o_eo__list-event-date"><?= $evtDateFormatted ?></p>
										<h5 class="o_eo__list-event-title"><?= $event['title'] ?></h5>
										<h5 class="o_eo__list-event-subtitle"><?= $event['subtitle'] ?></h5>
									</div>
								</div>
								<div class="o_eo__list-event-back">
									<div class="o_eo__list-event-back-box" data-simplebar>
										<div class="o_eo__list-event-excerpt"><?= $event['excerpt'] ?></div>
										<div class="o_eo__list-event-btn">
											<a href="<?= $event['link_url'] ?>"
											   target="<?= $event['link_target'] ?>">
												<?= $event['link_title'] ?>
											</a>
										</div>
									</div>
								</div>
							</article>
						</div>
					<?php endforeach; ?>
				</div>
		<?php endforeach; ?>
	</section>

</section>
