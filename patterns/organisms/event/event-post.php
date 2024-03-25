<?php
use Lean\Load;

$args = wp_parse_args( $args, [
	'image' => '',
	'title' => '',
	'date' => '',
	'location' => '',
	'description' => '',
	'content' => '',
	'cta' => '',
	'cta_url' => '',
] );
?>

<section class="event-post container-fluid">

<?php
	Load::organism( 'event/event-hero', [
		'image' => $args['image'],
		'title' => $args['title'],
	] );

	Load::organism( 'event/event-content', [
		'title' => $args['title'],
		'date' => $args['date'],
		'location' => $args['location'],
		'description' => $args['description'],
		'content' => $args['content'],
		'cta' => $args['cta'],
		'cta_url' => $args['cta_url'],
	] );

	Load::organism( 'event/event-share', [] );
?>

</section>
