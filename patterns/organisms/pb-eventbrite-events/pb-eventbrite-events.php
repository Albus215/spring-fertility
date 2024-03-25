<?php
/**
 * Eventbrite Events
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
	'title'           => __('Upcoming at Spring'),
	'no_events_title' => __('There are no upcoming Events at Spring'),
	'events_topic'    => 0,
	'max_events'      => '',
]);

$eventsMax = empty($args['max_events']) ? -1 : absint($args['max_events']);

if (!empty($args['events_topic'])) $ebEvents = EventbriteEvents::get_events($eventsMax, intval($args['events_topic']));
else $ebEvents = EventbriteEvents::get_events($eventsMax);

if (empty($ebEvents)) : ?>
	<!--	<div class="container clearfix pb-ebe">-->
	<!--		<div class="row">-->
	<!--			<div class="col-sm-12">-->
	<!--				<h2 class="pb-ebe__title">--><? //= $args['no_events_title'] ?><!--</h2>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
<?php else : ?>
	<div class="container clearfix pb-ebe">
		<div class="row">
			<div class="col-lg-6 col-md-8 col-md-offset-2 col-lg-offset-0">
				<h2 class="pb-ebe__title"><?= $args['title'] ?></h2>
			</div>
			<div class="col-lg-6 col-md-8 col-md-offset-2 col-lg-offset-0">
				<?php Load::organism('pb-eventbrite-events/pb-eventbrite-events-list', [
					'events' => $ebEvents,
				]); ?>

				<?php if (!empty($args['button']) && !empty($args['button']['url'])) : ?>
					<p class="space-p-top-25" style="text-align: right">
						<a class="btn"
						   href="<?= $args['button']['url'] ?>" target="<?= $args['button']['target'] ?>">
							<?= $args['button']['title'] ?>
						</a>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif;
