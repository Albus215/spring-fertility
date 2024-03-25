<?php
use Lean\Load;
use Spring\Modules\Events\Events;

/**
 * Template Name: Events
 */

$posts = Events::get_events();

get_header();

Load::organism( 'hero-events/hero-events', [
	'image' => get_field( 'events_hero_image' ),
	'title' => get_field( 'events_hero_title' ),
	'text' => get_field( 'events_hero_text' ),
] );

Load::organism( 'events-list/events-list', [
	'posts' => $posts,
] );

get_footer();
