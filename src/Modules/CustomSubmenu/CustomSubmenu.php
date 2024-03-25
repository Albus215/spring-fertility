<?php namespace Spring\Modules\CustomSubmenu;

/**
 * Class that creates a new CPT to storage the Testimonials.
 */
class CustomSubmenu {

	/**
	 * Function called automatically and works as the entry point of the class.
	 */
	public static function init() {
		add_action( 'init', [ __CLASS__, 'register_cpt' ] );
	}

	/**
	 * Register a new CPT to storage the testimonials.
	 */
	public static function register_cpt() {
		$customSubmenu = new \Lean\Cpt([
			'singular' => 'Custom Submenu',
			'plural' => 'Custom Submenus',
			'post_type' => 'spring-c-submenu',
			'slug' => 'spring-c-submenu',
			'supports' => [
				'title'
			],
			'args' => [
				'menu_icon' => 'dashicons-menu',
				// Make this post type be visible to authors and site visitors.
				'public' => false,
				// Exclude this from the default search, but not from the custom one.
				'exclude_from_search'  => true,
				// Let this post type be queried for on the front-end via parse_request().
				'publicly_queryable' => false,
				// Display the user interface of this post type.
				'show_ui' => true,
				// This post type is not available for selection on navigation menus.
				'show_in_nav_menus' => false,
				// Show the post type in the admin menu. Relies on show_ui being true.
				'show_in_menu' => true,
				// Leave this at default 'post'. This string is used to build the read/edit/delete capabilities.
				'capability_type' => 'post',
				// Disallow hierarchy or parent/child relationship.
				'hierarchical' => false,
				// Disable post type archive for this.
				'has_archive' => false,
				// Allow this post type to be exported.
				'can_export' => true,
				// Make this the fifth top-level menu in the the dashboard.
				'menu_position' => 61,
			],
		]);
		$customSubmenu->init();
	}
}
