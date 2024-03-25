<?php namespace Spring\Modules\Press;

/**
 * Class that creates a new CPT to storage the Press releases.
 */
class Press {
	const TYPE = 'press';
	const TAX_TOPIC = 'press_type';

	/**
	 * Function called automatically and works as the entry point of the class.
	 */
	public static function init() {
		add_action( 'init', [ __CLASS__, 'register_cpt' ] );
	}

	/**
	 * Register a new CPT to storage the Press releases.
	 */
	public static function register_cpt() {
		$press = new \Lean\Cpt([
			'singular' => 'Press',
			'plural' => 'Press',
			'post_type' => self::TYPE,
			'slug' => 'press',
			'args' => [
				'menu_icon' => 'dashicons-welcome-widgets-menus',
			],
		]);
		$press->init();
		self::register_topic_tax();
	}

	/**
	 * Function called to register a new taxonomy associated with each topic
	 */
	public static function register_topic_tax() {
		$category_taxonomy = [
			'hierarchical'      => true,
			'labels'            => self::get_labels( 'Type', 'Types' ),
			'show_ui'           => true,
			'meta_box_cb'       => false,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite' => array(
				'hierarchical' => true,
			),
		];

		register_taxonomy( self::TAX_TOPIC, [ self::TYPE ], $category_taxonomy );
	}

	/**
	 * Function that helps in the process of the creation of labels for WP.
	 *
	 * @param string $singular The singular representation of the label.
	 * @param string $plural The plural version of the string.
	 * @return array An array with the details of the labels.
	 */
	public static function get_labels( $singular, $plural ) {
		return [
			'name'              => $singular,
			'singular_name'     => $singular,
			'search_items'      => "Search $singular",
			'all_items'         => "All $plural",
			'parent_item'       => "Parent $singular",
			'parent_item_colon' => "Parent $singular:",
			'edit_item'         => "Edit $singular",
			'update_item'       => "Update $singular",
			'add_new_item'      => "Add New $singular",
			'new_item_name'     => "New $singular Name",
			'menu_name'         => "$plural",
		];
	}


}
