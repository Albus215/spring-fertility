<?php namespace Spring\Modules\Events;

/**
 * Class that creates a new CPT to storage the Events.
 */
class Events {

	/**
	 * Function called automatically and works as the entry point of the class.
	 */
	public static function init() {
//		add_action( 'init', [ __CLASS__, 'register_cpt' ] );
	}

	/**
	 * Register a new CPT to storage the events.
	 */
	public static function register_cpt() {
		$events = new \Lean\Cpt([
			'singular' => 'Event',
			'plural' => 'Events',
			'post_type' => 'events',
			'slug' => 'events',
			'args' => [
				'menu_icon' => 'dashicons-calendar',
			],
		]);
		$events->init();
	}

	/**
	 * Return active events
	 */
	public static function get_events() {
		$date_now = date( 'Y-m-d H:i' );
		$args = array(
			'post_type' => 'events',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'event_item_date',
					'compare' => '>=',
					'value' => $date_now,
					'type' => 'DATETIME',
				),
			),
			'order' => 'ASC',
			'orderby' => 'meta_value',
			'meta_key' => 'event_item_date',
			'meta_type' => 'DATE',
		);

		return get_posts( $args );
	}

	/**
	 * Gets an array of events and return the active
	 *
	 * @param array $events from the module home-events.
	 */
	public static function filter_active_events( $events ) {

		$active_events = [];

		foreach ( $events as $post ) {
			$date_event = get_field( 'event_item_date', $post->ID );
			$date_event = explode( '/', $date_event );
			if ( strtotime( $date_event[0] ) >= strtotime( date( 'M d Y' ) ) ) {
				array_push( $active_events, $post );
			}
		}

		return $active_events;

	}
}
