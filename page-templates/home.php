<?php
use Lean\Load;

/**
 * Template Name: Home
 */

get_header();

$ctaBanner = get_field('sticky_cta_area');
$ctaBannerShow = $ctaBanner['show'] && !empty($ctaBanner['image']);
if ($ctaBannerShow) : ?>
	<a class="temp-announce"
	   href="<?= $ctaBanner['link']['url'] ?>"
	   target="<?= $ctaBanner['link']['target'] ?>"
	   title="<?= $ctaBanner['image']['title'] ?>">
		<img src="<?= $ctaBanner['image']['url'] ?>" alt="<?= $ctaBanner['image']['alt'] ?>">
	</a>
	<style type="text/css">
		.temp-announce {
			display: block;
			position: fixed;
			right: -100px;
			top: calc(50% - 265px);
			z-index: 150;

			-webkit-transition: .25s;
			-moz-transition: .5s;
			-ms-transition: .5s;
			-o-transition: .5s;
			transition: .5s;
		}
		.temp-announce img {
			max-width: 100%;
			height: auto;
		}
		.temp-announce.show {
			right: 0;
		}
		@media (max-width: 739px) {
			.temp-announce {
				max-width: 40px;
				height: auto;
				top: calc(50% - 165px);
			}
		}
	</style>
	<script type="text/javascript">
		(function ($) {
			$(window).load(function () {
				$('.temp-announce').addClass('show');
			})
		}(jQuery))
	</script>
<?php endif;

if ( have_rows( 'home_flexible_content' ) ) {

	while ( have_rows( 'home_flexible_content' ) ) {

		the_row();

		switch ( get_row_layout() ) {
			case 'home_hero':
				Load::organisms( 'hero-primary/hero-primary', [
					'bkg_image' => get_sub_field( 'hero_image' ),
					'hero_slogan' => get_sub_field( 'hero_slogan' ),
					'quote_author' => get_sub_field( 'quote_author' ),
					'now_cta_label' => get_sub_field( 'now_cta_label' ),
					'now_cta_text' => get_sub_field( 'now_cta_text' ),
					'now_cta_image' => get_sub_field( 'now_cta_image' ),
					'now_cta_link' => get_sub_field( 'now_cta_link' ),
					'later_cta_label' => get_sub_field( 'later_cta_label' ),
					'later_cta_text' => get_sub_field( 'later_cta_text' ),
					'later_cta_image' => get_sub_field( 'later_cta_image' ),
					'later_cta_link' => get_sub_field( 'later_cta_link' ),
                    'use_alternative_header' => get_sub_field('use_alternative_header'),
                    'blue_text' => get_sub_field('blue_text'),
                    'green_text' => get_sub_field('green_text'),
                    'main_text' => get_sub_field('main_text'),
                    'main_blue_text' => get_sub_field('main_blue_text'),
                    'button_text' => get_sub_field('button_text'),
                    'button_link' => get_sub_field('button_link'),
                    'green_area' => get_sub_field('green_area'),
				] );
				break;

			case 'video_module':
				Load::organisms( 'home-video/home-video', [
					'video_url' => get_sub_field( 'video_url' ),
					'video_title' => get_sub_field( 'video_title' ),
					'video_text' => get_sub_field( 'video_text' ),
					'video_cta_label' => get_sub_field( 'video_cta_label' ),
					'video_cta_url' => get_sub_field( 'video_cta_url' ),
				] );
				break;

			case 'home_testimonials':
				Load::organisms( 'testimonials/testimonials', [
					'items' => get_sub_field( 'home_testimonial_items' ),
					'images' => get_sub_field( 'home_testimonial_footer' ),
				]);
				break;

			case 'home_testimonials_new_style':
				Load::organisms( 'testimonials-new/testimonials-new', [
					'testimonial_items' => get_sub_field( 'testimonial_items' ),
					'right_photo' => get_sub_field( 'right_photo' ),
				]);
				break;

			case 'single_cta':
				Load::organism( 'home-singlecta/home-singlecta', [
					'background' => get_sub_field( 'singlecta_background_color' ),
					'title' => get_sub_field( 'singlecta_title' ),
					'text' => get_sub_field( 'singlecta_text' ),
					'label' => get_sub_field( 'singlecta_label' ),
					'url' => get_sub_field( 'singlecta_url' ),
				] );
				break;

			case 'singlecta_image':
				Load::organism( 'home-singlecta-image/home-singlecta-image', [
					'background' => get_sub_field( 'singlectaimg_background' ),
					'image' => get_sub_field( 'singlectaimg_image' ),
					'title' => get_sub_field( 'singlectaimg_title' ),
					'text' => get_sub_field( 'singlectaimg_text' ),
					'label' => get_sub_field( 'singlectaimg_label' ),
					'url' => get_sub_field( 'singlectaimg_url' ),
				] );
				break;

			case 'home_slider':
				Load::organism( 'home-slider/home-slider', [
					'title' => get_sub_field( 'home_slider_title' ),
					'text' => get_sub_field( 'home_slider_text' ),
					'images' => get_sub_field( 'home_slider_images' ),
				] );
				break;

			case 'home_events':
				Load::organism( 'home-events/home-events', [
					'title' => get_sub_field( 'home_events_title' ),
					'text' => get_sub_field( 'home_events_text' ),
					'posts' => get_sub_field( 'home_events_posts' ),
					'empty_events' => get_sub_field( 'home_events_no_events_text' ),
				] );
				break;

			case 'home_eventbrite_events':
				Load::organism('home-eventbrite-events/home-eventbrite-events', [
					'title' => get_sub_field('home_eventbrite_events_title'),
					'text' => get_sub_field('home_eventbrite_events_text'),
					'max' => get_sub_field('home_eventbrite_events_max'),
					'empty_events' => get_sub_field('home_eventbrite_events_no_events_text'),
					'events_topic' => get_sub_field('events_topic'),
				]);
				break;

			case 'home_metrics':
				Load::organism( 'home-metrics/home-metrics', [
					'background' => get_sub_field( 'home_metrics_background' ),
					'title' => get_sub_field( 'home_metrics_title' ),
					'items' => get_sub_field( 'home_metrics_items' ),
					'animation' => '',
					'show_dataset_modal' => get_sub_field('show_dataset_modal'),
					'dataset_modal' => get_sub_field('dataset_modal'),
				] );
				break;
		}
	}
}

get_footer();
