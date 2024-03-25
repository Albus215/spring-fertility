<?php
use Lean\Load;
use Fashion\Modules\Collections;
use Fashion\Modules\Collections\Collections as Collection;
use Fashion\Modules\Articles;

$args = wp_parse_args( $args, [
	'designer_id' => 0,
]);

$designer_id = $args['designer_id'];

if ( $designer_id <= 0 ) {
	return;
}

$designer = get_term( $designer_id, Collections\Collections::TAXONOMY_DESIGNER );
if ( ! $designer || is_wp_error( $designer ) ) {
	return;
}

$designer_image = get_field( 'user_image' );
$social_links = get_field( 'designer_social_media' );
$content_break = get_field( 'designer_content_break_item' );

$next_designer = Collections\get_next_designer( $designer_id );
$current_designer_url = get_term_link( $designer_id );
?>

<main
	role="main"
	itemprop="mainContentOfPage"
	class="designer-page"
	data-current-designer-id="<?php echo esc_attr( $designer_id ); ?>"
	data-next-designer-id="<?php echo esc_attr( $next_designer['id'] ); ?>"
	data-current-page="<?php echo esc_url( $current_designer_url ); ?>"
	data-next-page="<?php echo esc_url( $next_designer['url'] ); ?>">
	<div class="o__hero-info--wrapper">
		<?php
			Load::organism( 'hero-info/hero-about', [
				'title' => $designer->name,
				'image' => $designer_image,
				'social' => $social_links['social_network'],
			]);

			$query = Articles\by_designer( $designer->slug );
			Load::organism( 'article/tcl-contributor', [
				'id' => $designer_id,
				'posts' => $query->posts,
				'pages' => $query->max_num_pages,
				'class' => 'container--big',
			]);

			$args = [
				'posts_per_page' => Collection::COLLECTIONS_BY_DESIGNER,
			];
			$query = Collections\by_designer( $designer_id, $args );
			Load::organism( 'designer/designer-collections', [
				'id' => $designer_id,
				'posts' => $query->posts,
				'class' => 'container--big',
				'pages' => $query->max_num_pages,
			]);

			if ( $content_break ) {
				Load::organism( 'content-break/content-break', [
					'post_id' => $content_break,
				]);
			}
		?>
	</div>
</main>
