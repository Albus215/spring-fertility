<?php
use Lean\Load;
$args = wp_parse_args( $args, [
	'posts' => [],
] );

?>

<div class="container">
	<ul class="o__events-list">
		<?php
		foreach ( $args['posts'] as $post ) {
			Load::molecule( 'event-item/event-item', [
				'title' => $post->post_title,
				'image' => get_the_post_thumbnail_url( $post->ID ),
				'date' => get_field( 'event_item_date', $post->ID ),
				'location' => get_field( 'event_item_location', $post->ID ),
				'description' => get_field( 'event_item_short_description', $post->ID ),
				'url' => get_post_permalink( $post->ID ),
			] );
		}
		?>
	</ul>
</div>
