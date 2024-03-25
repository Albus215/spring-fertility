<?php

use Lean\Load;
use Spring\Modules\EventbriteEvents\EventbriteEvents;


$args = wp_parse_args($args, [
	'title'        => '',
	'text'         => '',
	'max'          => 999,
	'empty_events' => '',
	'events_topic' => '',
]);

//$events = EventbriteEvents::filter_active_events( $args['posts'] );
$events = EventbriteEvents::get_events($args['events_topic']);
//var_dump($events);
?>

<div class="o__home-events">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h3 class="o__home-events__title"><?php echo $args['title']; ?></h3>
				<?php if (!empty($args['text'])) : ?>
					<p class="o__home-events__text"><?php echo esc_html($args['text']); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<?php if (!empty($events)) : ?>
			<div class="row">
				<ul class="o__events-list clearfix">

					<?php
					$i = 0;
					$max = count($events) <= intval($args['max']) ? count($events) : intval($args['max']);
					for ($i = 0; $i < $max; $i++) {
						/*
						Load::molecule('home-eventbrite-event/home-eventbrite-event', [
							'post' => $events[$i],
						]);
						*/
						Load::molecule('event-item/event-item', [
							'title'        => $events[$i]->post_title,
							'image'        => get_the_post_thumbnail_url($events[$i]->ID),
							'date'         => get_field('event_date_start', $events[$i]->ID),
							'location'     => get_field('event_location', $events[$i]->ID),
							'description'  => $events[$i]->post_excerpt,
							'url'          => get_field('event_link', $events[$i]->ID),
							'link_title'   => get_field('event_link_title', $events[$i]->ID),
							'link_new_tab' => boolval(get_field('event_link_open_in_a_new_tab', $events[$i]->ID)),
						]);
					} ?>

				</ul>
			</div>
			<div class="o__home-events-link">
				<a href="/events" class="btn-blue-outline">View More</a>
			</div>

		<?php else : ?>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<p class="o__home-events__text"><?php echo esc_html($args['empty_events']); ?></p>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
<?php
/*

 <style>
	.o__home-events-list > li {
		flex: 0 1 auto;
		justify-self: center;
		margin: 0 auto;
	}
</style>

 */

?>
