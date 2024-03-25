<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'posts' => [],
]);

?>

<div class="container">
	<ul class="o__events-list">
		<?php

		foreach ($args['posts'] as $post) {
			$textParts = explode("\n", $post->post_content);
			$description = '';
			foreach ($textParts as $txt) {
				if (stristr($txt, 'come') || stristr($txt, 'join')) {
					$description = strip_tags($txt);
					break;
				}
			}

			Load::molecule('event-item/event-item', [
				'title'        => $post->post_title,
				'image'        => get_the_post_thumbnail_url($post->ID),
				'date'         => get_field('event_date_start', $post->ID),
				'date_tz'         => get_field('event_date_tz', $post->ID),
				'location'     => get_field('event_location', $post->ID),
				'description'  => $post->post_excerpt,
				'url'          => get_field('event_link', $post->ID),
				'link_title'   => get_field('event_link_title', $post->ID),
				'link_new_tab' => boolval(get_field('event_link_open_in_a_new_tab', $post->ID)),
			]);
		}
		?>
	</ul>
</div>
