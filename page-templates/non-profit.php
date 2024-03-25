<?php
use Lean\Load;

/**
 * Template Name: Non-Profit
 */
get_header();

Load::organisms('hero-non-profit/hero-non-profit', [
	'post_id' => get_the_ID(),
]);

?>

<?php
if ( have_rows( 'non_profit_flexible_content' ) ) {

	while ( have_rows( 'non_profit_flexible_content' ) ) {

		the_row();

		switch ( get_row_layout() ) {
			case 'single_video':
				Load::organisms('single-video/single-video', [
					'title' => get_sub_field( 'single_video_title' ),
					'embed' => get_sub_field( 'single_video_embed' ),
				]);
				break;

			case 'three_facts_grid':
				Load::organisms('three-facts-grid/three-facts-grid', [
					'title' => get_sub_field( 'three_facts_title' ),
					'rows' => get_sub_field( 'three_facts_rows' ),
				]);
				break;

			case 'nonprofit_metrics':
				Load::organism( 'home-metrics/home-metrics', [
					'no-circle' => true,
					'background' => get_sub_field( 'nonprofit_metrics_background' ),
					'title' => get_sub_field( 'nonprofit_metrics_title' ),
					'items' => get_sub_field( 'nonprofit_metrics_items' ),
				] );
				break;

		}
	}
}

get_footer();
