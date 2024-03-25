<?php namespace Spring\Modules\Team;

/**
 * Class that creates a new CPT to storage the Team.
 */
class Team
{

	/**
	 * Function called automatically and works as the entry point of the class.
	 */
	public static function init()
	{
		add_action('init', [__CLASS__, 'register_cpt']);
	}

	/**
	 * Register a new CPT to storage the team.
	 */
	public static function register_cpt()
	{
		$testimonial = new \Lean\Cpt([
			'singular'  => 'Team',
			'plural'    => 'Team',
			'post_type' => 'team',
			'slug'      => 'team',
			'args'      => [
				'menu_icon' => 'dashicons-groups',
			],
		]);
		$testimonial->init();

		register_taxonomy('team_locations', ['team'], [
			'label'             => 'Location',
			'labels'            => [
				'name'              => 'Locations',
				'singular_name'     => 'Location',
				'search_items'      => 'Search Locations',
				'all_items'         => 'All Locations',
				'view_item '        => 'View Location',
				'parent_item'       => 'Parent Location',
				'parent_item_colon' => 'Parent Location:',
				'edit_item'         => 'Edit Location',
				'update_item'       => 'Update Location',
				'add_new_item'      => 'Add New Location',
				'new_item_name'     => 'New Location Name',
				'menu_name'         => 'Locations',
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
	 * @param array $query
	 *
	 * @return int[]|\WP_Post[]
	 */
	public static function load($query = [])
	{
		$teamQuery = wp_parse_args($query, [
			'post_type'   => 'team',
			'post_status' => 'publish',
			'numberposts' => -1,
			'order'       => 'DESC',
			'orderby'     => 'menu_order',
		]);
		return get_posts($teamQuery);
	}

	/**
	 * @return int|\WP_Error|\WP_Term[]
	 */
	public static function loadLocations()
	{
		return get_terms([
			'taxonomy'   => 'team_locations',
			'hide_empty' => 'true',
			'fields'     => 'all',
		]);
	}

	/**
	 * @param array  $query
	 * @param string $noLocationTitle
	 * @param bool   $noLocationsInclude
	 *
	 * @return array
	 */
	public static function loadSortedByLocations($query = [], $noLocationTitle = 'Other', $noLocationsInclude = true)
	{
		$team = self::load($query);
		$locations = self::loadLocations();
		if (empty($locations) || empty($team)) return [];

		if ($noLocationsInclude) {
			$noLocationID = md5($noLocationTitle);
			$teamListOther = [
				'title'   => $noLocationTitle,
				'members' => [],
			];
		}

		$teamList = [];
		foreach ($locations as $locationItem) {
			$teamList[$locationItem->slug] = [
				'title'   => $locationItem->name,
				'members' => [],
			];
		}

		foreach ($team as $teamItem) {
			if (has_term(null, 'team_locations', $teamItem)) {
				foreach ($locations as $locationItem) {
					if (has_term($locationItem->term_id, 'team_locations', $teamItem)) {
						$teamList[$locationItem->slug]['members'][] = $teamItem;
					}
				}
			} elseif ($noLocationsInclude) {
				$teamListOther['members'][] = $teamItem;
			}
		}
		if ($noLocationsInclude && !empty($teamListOther['members'])) {
			$teamList[$noLocationID] = $teamListOther;
		}

		return $teamList;
	}
}
