<?php

use Lean\Load;

/**
 * Template Name: Page-Blocks Builder 2
 */
get_header();

$pageBlocksLayoutMap = [
	'hero_section' => 'pb-hero/pb-hero',
	

	'spacer'                          => 'pb-content/spacer',
	'text'                            => 'pb-content/text',
	'raw_text'                        => 'pb-content/pb-raw-text',
	'text_2_columns'                  => 'pb-content/text-2-columns',
	'text_3_columns'                  => 'pb-content/text-3-columns',
	'text_2_columns_and_image_middle' => 'pb-content/text-2-columns-image-middle',
	'section_hero_text_and_video'     => 'pb-content/section-hero-text-and-video',
	'section_video_and_text'          => 'pb-content/section-video-and-text',
	'image_text_blocks_3_in_a_row'    => 'pb-content/image-text-blocks-3-in-a-row',
	'image-text_blocks_4_in_a_row'    => 'pb-content/image-text-blocks-4-in-a-row',
	'section_text_and_image_links'    => 'pb-content/section-text-and-image-links',
	'section_description_and_image'   => 'pb-content/section-description-and-image',
	'icon_link_blocks'                => 'pb-content/section-icon-link-blocks',
	'logos_set_section'               => 'pb-content/section-logos-set',
	'form_blue'                       => 'pb-content/section-from-blue',

	'cta_image_and_text'        => 'pb-cta/cta-image-and-text',
	'cta_text_and_image'        => 'pb-cta/cta-text-and-image',
	'cta_with_background_image' => 'pb-cta/cta-with-background-image',
	'cta_with_curve'            => 'pb-cta/cta-with-curve',

	'testimonial_single' => 'pb-testimonials/testimonial-single',
	

	'eventbrite_events' => 'pb-eventbrite-events/pb-eventbrite-events',

	'team_overview' => 'pb-team/pb-team',

	'section_optimize' => 'pb-optimize/pb-optimize',

	'horizontal_scroll_section_eggfreezing' => 'pb-hss/egg-freezing',
	'horizontal_scroll_section_fertility'   => 'pb-hss/fertility',

	'egg_calculator' => 'pb-egg-calculator/pb-egg-calculator',

	'tabs_simple' => 'pb-content/pb-tabs-simple',

	'events_overview_with_filters' => 'events-overview/events-overview',
	
	'images_section' => 'images_section/images_section',
	'title_image_address' => 'visiting/visiting',
	'description_and_list' => 'providing/providing',
	'awards' => 'awards/awards',
	'reviews_slider' => 'reviews_slider/reviews_slider',
	'faq_accordion' => 'faq_accordion/faq_accordion',
];

$pageBlocks = get_field('page_blocks');
$pageBlocks_useGB = boolval(get_field('use_gray_background'));
$pageBlocks_useBB = boolval(get_field('use_blue_background'));

if (!empty($pageBlocks)) {
	if (!empty($pageBlocks_useGB)) {
		echo '<section style="background-color: #f2f3f5">';
	}
	if (!empty($pageBlocks_useBB)) {
		echo '<section style="background-color: #19b0db">';
	}

	foreach ($pageBlocks as $pageBlockKey => $pageBlock) {
		$pageBlockID = $pageBlock['acf_fc_layout'];
		$pageBlockClass = ('pb-id__' . $pageBlockID);

		if (!empty($pageBlocksLayoutMap[$pageBlockID])) {
			echo '<section class="' . $pageBlockClass . '">';
			Load::organism($pageBlocksLayoutMap[$pageBlockID], $pageBlock);
			echo '</section>';
		}
	}

	if (!empty($pageBlocks_useGB) || !empty($pageBlocks_useBB)) {
		echo '</section>';
	}
}

get_footer();
