<?php

use Lean\Load;
use Spring\Modules\EventbriteEvents\EventbriteEvents;

/**
 * Template Name: EventbriteEvents
 */

get_header();
$pageLink = get_permalink(get_the_ID());

/** @var WP_Term $countryCurrent */
//$countryCurrentSlug = (string)$_GET['country'];
//$countryCurrent = null;
//if (!empty($countryCurrentSlug)) {dw
//	$countryCurrent = get_terms(['taxonomy' => 'eventbrite_events_country', 'slug' => $countryCurrentSlug]);
//	if (!empty($countryCurrent) && !is_wp_error($countryCurrent)) $countryCurrent = $countryCurrent[0];
//}
//$countries = get_terms(['taxonomy' => 'eventbrite_events_country', 'hide_empty' => false]);
//if (empty($countryCurrent)) {
//	$countryCurrent = $countries[0];
//	$countryCurrentSlug = $countryCurrent->slug;
//}
// terms (countries) custom filter

$topics = get_field('events_topics');
//if (!empty($countryCurrent)) {
//	$posts = !empty($topics) ?
//		EventbriteEvents::get_events(-1,$topics, $countryCurrent->term_id) :
//		EventbriteEvents::get_events(-1,0, $countryCurrent->term_id);
//} else {
	$posts = !empty($topics) ? EventbriteEvents::get_events(-1, $topics) : EventbriteEvents::get_events(-1);
//}


Load::organism('hero-events/hero-events', [
	'image' => get_field('events_hero_image'),
	'title' => get_field('events_hero_title'),
	'text'  => get_field('events_hero_text'),
]);

?>
<!--	<div class="container clearfix">-->
<!--		<div class="row">-->
<!--			<div class="col-sm-12">-->
<!--				<div class="o__hero-press-categories">-->
<!--					<ul>-->
<!--						--><?php //foreach ($countries as $item) : /** @var WP_Term $item */
//							$is_current = ($countryCurrentSlug === $item->slug) ? 'cat-item current-cat' : 'cat-item';
//							$link = $pageLink . '/?country=' . $item->slug;
//							?>
<!--							<li class="--><?php //echo esc_attr($is_current); ?><!--">-->
<!--								<a href="--><?php //echo esc_url($link); ?><!--">--><?php //echo esc_html($item->name); ?><!--</a>-->
<!--							</li>-->
<!--						--><?php //endforeach; ?>
<!--					</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<?php

if (!empty($posts)) :
	Load::organism('eventbrite-events-list/eventbrite-events-list', [
		'posts' => $posts,
	]);
else : ?>
	<div class="container clearfix">
		<div class="row">
			<div class="col-sm-12 text-center space-p-top-50 space-p-bottom-75">
				<h3>Events Not Found</h3>
			</div>
		</div>
	</div>
<?php endif;

$cta = get_field('сta_evergreen');
Load::organism('cta/cta-evergreen', $cta);

get_footer();
