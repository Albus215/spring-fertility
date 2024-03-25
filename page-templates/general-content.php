<?php
use Lean\Load;

/**
 * Template Name: General
 */
get_header();

if ( have_rows( 'generalcontent' ) ) {

	while ( have_rows( 'generalcontent' ) ) {

		the_row();

		switch ( get_row_layout() ) {

			case 'generalcontent_hero':
				Load::organisms( 'general-hero/general-hero', [
					'hero_img' => get_sub_field( 'generalcontent_hero_img' ),
					'hero_title' => get_sub_field( 'generalcontent_hero_title' ),
					'hero_txt' => get_sub_field( 'generalcontent_hero_txt' ),
					'hero_bg_dark' => get_sub_field( 'generalcontent_dark_background_color' ),
					'hero_short' => get_sub_field( 'generalcontent_hero_short' ),
				] );
				break;

			case 'generalcontent_video':
				Load::organisms( 'home-video/home-video', [
					'video_url' => get_sub_field( 'generalcontent_video_url' ),
					'video_title' => get_sub_field( 'generalcontent_video_title' ),
					'video_text' => get_sub_field( 'generalcontent_video_txt' ),
					'video_cta_label' => get_sub_field( 'generalcontent_video_ctalabel' ),
					'video_cta_url' => get_sub_field( 'generalcontent_video_ctaurl' ),
				] );
				break;

			case 'generalcontent_singlecta':
				Load::organism( 'home-singlecta/home-singlecta', [
					'background' => get_sub_field( 'generalcontent_singlecta_bkg' ),
					'title' => get_sub_field( 'generalcontent_singlecta_title' ),
					'text' => get_sub_field( 'generalcontent_singlecta_txt' ),
					'label' => get_sub_field( 'generalcontent_singlecta_label' ),
					'url' => get_sub_field( 'generalcontent_singlecta_url' ),
					'fineprint' => get_sub_field('generalcontent_singlecta_fineprint')
				] );
				break;

			case 'generalcontent_metrics':
				Load::organism( 'home-metrics/home-metrics', [
					'background' => get_sub_field( 'generalcontent_metrics_bkg' ),
					'title' => get_sub_field( 'generalcontent_metrics_title' ),
					'items' => get_sub_field( 'generalcontent_metrics_items' ),
				] );
				break;

			case 'generalcontent_singlectaimg':
				Load::organism( 'home-singlecta-image/home-singlecta-image', [
					'background' => get_sub_field( 'generalcontent_singlectaimg_bkg' ),
					'image' => get_sub_field( 'generalcontent_singlectaimg_image' ),
					'title' => get_sub_field( 'generalcontent_singlectaimg_title' ),
					'text' => get_sub_field( 'generalcontent_singlectaimg_txt' ),
					'label' => get_sub_field( 'generalcontent_singlectaimg_label' ),
					'url' => get_sub_field( 'generalcontent_singlectaimg_url' ),
				] );
				break;

			case 'generalcontent_events':
				Load::organism( 'home-events/home-events', [
					'title' => get_sub_field( 'generalcontent_events_title' ),
					'text' => get_sub_field( 'generalcontent_events_txt' ),
					'posts' => get_sub_field( 'generalcontent_events_posts' ),
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

			case 'generalcontent_3facts':
				Load::organisms('three-facts-grid/three-facts-grid', [
					'title' => get_sub_field( 'generalcontent_3facts_title' ),
					'rows' => get_sub_field( 'generalcontent_3facts_rows' ),
					'general' => true,
				]);
				break;

			case 'generalcontent_flexcols':
				Load::molecules( 'inside-page-flex/inside-page-flex', [
					'flex_title' => get_sub_field( 'generalcontent_flexcols_title' ),
					'flex_subtitle' => get_sub_field( 'generalcontent_flexcols_subtitle' ),
					'flex_cols' => get_sub_field( 'generalcontent_flexcols_columns' ),
					'rows' => get_sub_field( 'generalcontent_flexcols_content' ),
					'cols' => get_sub_field( 'generalcontent_flexcols_columns' ),
				] );

				break;

			case 'generalcontent_faqs':
				Load::molecules( 'inside-page-faq/inside-page-faq', [
					'faq_title' => get_sub_field( 'generalcontent_faqs_title' ),
					'faqs' => get_sub_field( 'generalcontent_faqs_qa' ),
					'cta_txt' => get_sub_field( 'generalcontent_faqs_ctatxt' ),
					'cta_url' => get_sub_field( 'generalcontent_faqs_ctaurl' ),
				] );
				break;

			case 'generalcontent_team':
				Load::organisms( 'team/inside-page-team', [
					'team_title' => get_sub_field( 'generalcontent_team_title' ),
					'team_subtitle' => get_sub_field( 'generalcontent_team_subtitle' ),
					'items' => get_sub_field( 'generalcontent_team_items' ),
				]);
				break;

			case 'generalcontent_content':
				Load::molecules( 'inside-page-content/inside-page-content', [
					'page_title' => get_sub_field( 'generalcontent_content_title' ),
					'page_subtitle' => get_sub_field( 'generalcontent_content_subtitle' ),
					'content' => get_sub_field( 'generalcontent_content_info' ),
				] );
				break;

			case 'generalcontent_press':
				Load::molecules( 'inside-page-press/inside-page-press', [
					'press_title' => get_sub_field( 'generalcontent_press_title' ),
					'press_text' => get_sub_field( 'generalcontent_press_txt' ),
					'press_image' => get_sub_field( 'generalcontent_press_img' ),
					'press_url' => get_sub_field( 'generalcontent_press_url' ),
				] );
				break;

			case 'generalcontent_testimonials':
				Load::organisms( 'testimonials/testimonials', [
					'items' => get_sub_field( 'generalcontent_testimonials_items' ),
					'images' => get_sub_field( 'generalcontent_testimonials_footer' ),
				]);
				break;

			case 'generalcontent_testimonials_new_style':
				Load::organisms( 'testimonials-new/testimonials-new', [
					'testimonial_items' => get_sub_field( 'testimonial_items' ),
					'right_photo' => get_sub_field( 'right_photo' ),
				]);
				break;

			case 'generalcontent_results':
				Load::molecules( 'inside-page-results/inside-page-results', [
					'results_title' => get_sub_field( 'generalcontent_results_title' ),
					'results_date' => get_sub_field( 'generalcontent_results_date' ),
					'rows' => get_sub_field( 'generalcontent_results_row' ),
				] );
				break;

			case 'generalcontent_blockquote':
				Load::molecules( 'inside-page-blockquote/inside-page-blockquote', [
					'quote_image' => get_sub_field( 'generalcontent_blockquote_backgroundimage' ),
					'quote_text' => get_sub_field( 'generalcontent_blockquote_text' ),
					'quote_url' => get_sub_field( 'generalcontent_blockquote_url' ),
				] );
				break;

			case 'simple_content':
				$content = do_shortcode(get_sub_field( 'simple_content_content' ));
				$contentDarkBg = boolval(get_sub_field( 'use_dark_background' ));
				$contentWidth = (string)get_sub_field( 'content_width' );
				$contentWrapClass = $contentDarkBg ? 'content-dark-bg' : '';
				$contentClassMap = [
					'100' => 'col-sm-12',
					'70' => 'col-sm-12 col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1',
					'50' => 'col-sm-12 col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1',
					'30' => 'col-sm-12 col-lg-4 col-lg-offset-4 col-md-8 col-md-offset-2',
				];
				$contentWidth = !empty($contentWidth) && in_array($contentWidth, array_keys($contentClassMap)) ?
					$contentWidth : '100';
				$contentClass = $contentClassMap[$contentWidth];
				echo '<div class="clearfix mtop50 ' . $contentWrapClass . '"><div class="container">' .
					'<div class="' . $contentClass . '">' .
					$content .
					'</div></div></div>';
				break;

			case 'generalcontent_egg_calculator':
				Load::organism( 'calculator/egg-calculator', [
					'title' => get_sub_field( 'title' ),
					'subtitle' => get_sub_field( 'subtitle' ),
					'mobile_view_width' => get_sub_field( 'mobile_view_width' ),
				] );
				break;

			case 'egg_calculator_comparison':
				Load::organism( 'calculator/egg-calculator-comparison', [
					'title' => get_sub_field( 'title' ),
					'subtitle' => get_sub_field( 'subtitle' ),
					'info' => get_sub_field( 'info' ),
					'compared_items' => get_sub_field( 'compared_items' ),
					'description' => get_sub_field( 'description' ),
				] );
				break;

			case 'three_simple_imageblocks':
				Load::organism( 'general-common/three-simple-imageblocks', [
					'title' => get_sub_field( 'title' ),
					'imageblocks' => get_sub_field( 'imageblocks' ),
				] );
				break;

			case 'cta_left_image':
				Load::organism( 'general-common/cta-left-image', [
					'image' => get_sub_field( 'image' ),
					'content' => get_sub_field( 'content' ),
					'button' => get_sub_field( 'button' ),
				] );
				break;

			case 'simple_content_with_image':
				Load::organism( 'general-common/simple-content-with-image', [
					'image' => get_sub_field( 'image' ),
					'content' => get_sub_field( 'content' ),
					'image_right' => get_sub_field( 'image_right' ),
				] );
				break;

			case '2_columns_with_image_blocks':
				Load::organism( 'general-common/2-columns-with-image-blocks', [
					'column_1_header' => get_sub_field( 'column_1_header' ),
					'column_2_header' => get_sub_field( 'column_2_header' ),
					'column_1_image_blocks' => get_sub_field( 'column_1_image_blocks' ),
					'column_2_image_blocks' => get_sub_field( 'column_2_image_blocks' ),
				] );
				break;

			case 'single_testimonial':
				Load::organism( 'testimonials/single-testimonial', [
					'testimonial' => get_sub_field( 'testimonial' ),
					'background_image' => get_sub_field( 'background_image' ),
				] );
				break;

			case 'generalcontent_ctawithbackground':
				Load::organism( 'home-singlecta/cta-with-background', [
					'background_image' => get_sub_field( 'background_image' ),
					'content' => get_sub_field( 'content' ),
					'button' => get_sub_field( 'button' ),
					'bottom_text' => get_sub_field( 'bottom_text' ),
				] );
				break;

			case 'section_break_container_content_image':
				Load::organism( 'section-brake-container/image-and-content', [
					'image' => get_sub_field( 'image' ),
					'content' => get_sub_field( 'content' ),
					'direction' => 2,
				] );
				break;

			case 'section_break_container_image_content':
				Load::organism( 'section-brake-container/image-and-content', [
					'image' => get_sub_field( 'image' ),
					'content' => get_sub_field( 'content' ),
					'direction' => 1,
				] );
				break;

			case 'cta_dark_blue_with_custom_link':
				Load::organism( 'cta/cta-dark-blue', [
					'content' => get_sub_field( 'content' ),
					'use_email_link' => get_sub_field( 'use_email_link' ),
					'link' => get_sub_field( 'link' ),
					'email_link_title' => get_sub_field( 'email_link_title' ),
					'email_link_mailto' => get_sub_field( 'email_link_mailto' ),
					'email_link_subject' => get_sub_field( 'email_link_subject' ),
					'email_link_message' => get_sub_field( 'email_link_message' ),
				] );
				break;

			case 'links_list':
				Load::organism( 'link-blocks/links-list', [
					'title' => get_sub_field( 'title' ),
					'links' => get_sub_field( 'links' ),
				] );
				break;

			case 'links_groups_list':
				Load::organism( 'link-blocks/links-groups-list', [
					'title' => get_sub_field( 'title' ),
					'links_groups' => get_sub_field( 'links_groups' ),
				] );
				break;

			case 'iconsblocks':
				Load::organism( 'link-blocks/icons-blocks', [
					'title' => get_sub_field( 'title' ),
					'iconsblocks' => get_sub_field( 'iconsblocks' ),
				] );
				break;

			case 'imageblocks_with_links':
				Load::organism( 'link-blocks/image-blocks-links', [
					'title' => get_sub_field( 'title' ),
					'imageblocks' => get_sub_field( 'imageblocks' ),
				] );
				break;

			case 'list_of_facts':
				Load::organism( 'general-common/list-of-facts', [
					'title' => get_sub_field( 'title' ),
					'list' => get_sub_field( 'list' ),
				] );
				break;

			case 'cta_evergreen':
				Load::organism( 'cta/cta-evergreen', [
					'content' => get_sub_field( 'content' ),
					'image' => get_sub_field( 'image' ),
				] );
				break;
		}
	}
}

get_footer();
