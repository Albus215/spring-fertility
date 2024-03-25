<?php namespace Spring\Modules\EventbriteEvents;

/**
 * Class that creates a new CPT to storage the Events.
 */
class EventbriteEvents
{

	/**
	 * Function called automatically and works as the entry point of the class.
	 */
	public static function init()
	{
		add_action('init', [__CLASS__, 'register_cpt']);
	}

	/**
	 * Register a new CPT to storage the events.
	 */
	public static function register_cpt()
	{
		$events = new \Lean\Cpt([
			'singular'  => 'Eventbrite Event',
			'plural'    => 'Eventbrite Events',
			'post_type' => 'eventbrite_events',
			'slug'      => 'eventbrite-events',
			'supports'  => ['title', 'excerpt', 'thumbnail', 'editor',],
			'args'      => [
				'menu_icon' => 'dashicons-calendar',
			],
		]);
		$events->init();

		register_taxonomy('eventbrite_events_topics', ['eventbrite_events'], [
			'label'             => 'Event Topic',
			'labels'            => [
				'name'              => 'Event Topics',
				'singular_name'     => 'Event Topic',
				'search_items'      => 'Search Event Topics',
				'all_items'         => 'All Event Topics',
				'view_item '        => 'View Event Topic',
				'parent_item'       => 'Parent Event Topic',
				'parent_item_colon' => 'Parent Event Topic:',
				'edit_item'         => 'Edit Event Topic',
				'update_item'       => 'Update Event Topic',
				'add_new_item'      => 'Add New Event Topic',
				'new_item_name'     => 'New Event Topic Name',
				'menu_name'         => 'Event Topics',
			],
			'description'       => '',
			'public'            => true,
			'hierarchical'      => false,
			'rewrite'           => true,
			'capabilities'      => [],
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'show_in_rest'      => null,
			'rest_base'         => null,
		]);

		register_taxonomy('eventbrite_events_country', ['eventbrite_events'], [
			'label'             => 'Event Country',
			'labels'            => [
				'name'              => 'Event Countries',
				'singular_name'     => 'Event Country',
				'search_items'      => 'Search Event Countries',
				'all_items'         => 'All Event Countries',
				'view_item '        => 'View Event Country',
				'parent_item'       => 'Parent Event Country',
				'parent_item_colon' => 'Parent Event Country:',
				'edit_item'         => 'Edit Event Country',
				'update_item'       => 'Update Event Country',
				'add_new_item'      => 'Add New Event Country',
				'new_item_name'     => 'New Event Country Name',
				'menu_name'         => 'Event Countries',
			],
			'description'       => '',
			'public'            => true,
			'hierarchical'      => true,
			'rewrite'           => true,
			'capabilities'      => [],
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'show_in_rest'      => null,
			'rest_base'         => null,
		]);

		register_taxonomy('eventbrite_events_group', ['eventbrite_events'], [
			'label'             => 'Event Group',
			'labels'            => [
				'name'              => 'Event Groups',
				'singular_name'     => 'Event Group',
				'search_items'      => 'Search Event Groups',
				'all_items'         => 'All Event Groups',
				'view_item '        => 'View Event Group',
				'parent_item'       => 'Parent Event Group',
				'parent_item_colon' => 'Parent Event Group:',
				'edit_item'         => 'Edit Event Group',
				'update_item'       => 'Update Event Group',
				'add_new_item'      => 'Add New Event Group',
				'new_item_name'     => 'New Event Group Name',
				'menu_name'         => 'Event Groups',
			],
			'description'       => '',
			'public'            => true,
			'hierarchical'      => true,
			'rewrite'           => true,
			'capabilities'      => [],
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'show_in_rest'      => null,
			'rest_base'         => null,
		]);
	}

	/**
	 * Return active events
	 *
	 * @param int $events_max
	 * @param int $events_topic
	 * @param int $events_country
	 *
	 * @return int[]|\WP_Post[]
	 */
	public static function get_events($events_max = -1, $events_topic = 0, $events_country = 0)
	{
		$date_now = date('Y-m-d H:i:s');
//		$args = array(
//			'post_type' => 'eventbrite_events',
//			'post_status' => 'publish',
//			'numberposts' => -1,
//			'meta_query' => array(
//				'relation' => 'AND',
//				array(
//					'key' => 'start_ts',
//					'compare' => '>=',
//					'value' => strtotime('now'),
//					'type' => 'INT',
//				),
//			),
//			'order' => 'ASC',
//			'orderby' => 'meta_value',
//			'meta_key' => 'start_ts',
//			'meta_type' => 'INT',
//		);
		$args = [
			'post_type'   => 'eventbrite_events',
			'post_status' => 'publish',
			'numberposts' => $events_max,
			'meta_query'  => [
				'relation' => 'AND',
				[
					'key'     => 'event_date_start',
					'compare' => '>=',
					'value'   => $date_now,
					'type'    => 'DATETIME',
				],
			],
			'order'       => 'ASC',
			'orderby'     => 'meta_value',
			'meta_key'    => 'event_date_start',
			'meta_type'   => 'DATETIME',
		];

		if (!empty($events_topic) || !empty($events_country)) {
			$args['tax_query'] = [];
			$args['tax_query']['relation'] = 'AND';
		}
		if (!empty($events_topic)) {
			$events_topic = is_array($events_topic) ? array_map('intval', $events_topic) : [intval($events_topic)];
			$args['tax_query'][] = [
				'taxonomy' => 'eventbrite_events_topics',
				'field'    => 'term_id',
				'terms'    => $events_topic,
			];
		}
		if (!empty($events_country)) {
			$events_country = is_array($events_country) ? array_map('intval', $events_country) : [intval($events_country)];
			$args['tax_query'][] = [
				'taxonomy' => 'eventbrite_events_country',
				'field'    => 'term_id',
				'terms'    => $events_country,
			];
		}

		return get_posts($args);
	}

	/**
	 * Gets an array of events and return the active
	 *
	 * @param array $events from the module home-events.
	 */
	public static function filter_active_events($events)
	{

		$active_events = [];

		foreach ($events as $post) {
			//$date_event = date('Y-m-d H:i:s', get_field( 'start_ts', $post->ID )) ;
			//$date_event = explode( ' ', $date_event );
			$date_event = get_field('start_ts', $post->ID);
			//if ( strtotime( $date_event[0] ) >= strtotime( date( 'M d Y' ) ) ) {
			if ($date_event >= strtotime('now')) {
				array_push($active_events, $post);
			}
		}

		return $active_events;

	}
}
