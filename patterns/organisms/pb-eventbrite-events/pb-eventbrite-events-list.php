<?php
/**
 * Eventbrite Events List
 */
$args = wp_parse_args($args, [
	'events' => []
]);

if (!empty($args['events'])) : ?>
	<section class="pb-ebe__list">
		<?php foreach ($args['events'] as $event) : /** @var WP_Post $event */
			$eventTitle = $event->post_title;
			$eventLinkUrl = get_field('event_link', $event);
			$eventLinkTarget = get_field('event_link_open_in_a_new_tab', $event) ? '_blank' : '';
			$eventDateString = get_field('event_date_start', $event);
			$eventDate = DateTime::createFromFormat('Y-m-d H:i:s', $eventDateString);
			?>
			<article class="pb-ebe__list-item">
				<div class="pb-ebe__list-item-date">
					<?= $eventDate->format('M') ?><br>
					<?= $eventDate->format('d') ?>
				</div>
				<h3 class="pb-ebe__list-item-title">
					<a href="<?= $eventLinkUrl ?>" target="<?= $eventLinkTarget ?>">
						<?= $eventTitle ?>
					</a>
				</h3>
				<div class="pb-ebe__list-item-link">
					<a href="<?= $eventLinkUrl ?>" target="<?= $eventLinkTarget ?>"></a>
				</div>
			</article>
		<?php endforeach; ?>
	</section>
<?php endif;
