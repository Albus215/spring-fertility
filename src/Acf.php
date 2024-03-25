<?php namespace Spring;

/**
 * Set-up ACF.
 */
class Acf {
	/**
	 * The folder in which JSON files are saved.
	 *
	 * @var string
	 */
	public static $json_folder = '';

	/**
	 * Init.
	 */
	public static function init() {
		self::$json_folder = apply_filters( 'lean/acf_path', get_template_directory() . '/acf' );

		$use_custom_location = apply_filters( 'lean/acf_use_custom_location', true );

		if ( $use_custom_location ) {
			add_filter( 'acf/settings/save_json', [ __CLASS__, 'save_json' ] );
			add_filter( 'acf/settings/load_json', [ __CLASS__, 'load_json' ] );
		}

		add_action('acf/init', function () {
			acf_add_options_page([
				'page_title'      => 'Theme Settings',
				'menu_title'      => 'Theme Settings',
				'menu_slug'       => '',
				'capability'      => 'edit_posts',
				'position'        => false,
				'parent_slug'     => 'themes.php',
				'icon_url'        => false,
				'redirect'        => true,
				'post_id'         => 'spring_settings',
				'autoload'        => true,
				'update_button'   => __('Update', 'acf'),
				'updated_message' => __('Settings Updated', 'acf'),
			]);
		});
	}

	/**
	 * Get the path for saving ACF JSON.
	 *
	 * @return string
	 */
	public static function save_json() {
		return self::$json_folder;
	}

	/**
	 * Add our path to the locations to load ACF JSON from.
	 *
	 * @param array $paths The paths.
	 * @return array
	 */
	public static function load_json( $paths ) {
		unset( $paths[0] );
		$paths[] = self::$json_folder;
		return $paths;
	}
}
