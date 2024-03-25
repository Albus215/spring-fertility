<?php namespace Spring\Modules\Knowledge;

/**
 * Class that creates a new CPT about Knowledge Topics.
 */
class Knowledge
{
	const TYPE = 'knowledge';
	const TYPE_TREATMENT = 'treatment';
	const TYPE_TEST = 'test';
	const TAX_TOPIC = 'knowledge_topic';

	/**
	 * Function called automatically and works as the entry point of the class.
	 */
	public static function init()
	{
		add_action('init', [__CLASS__, 'register_cpt']);
		// Post link.
		add_filter('post_type_link', [__CLASS__, 'build_permalink'], 10, 3);

		// -- Post Name (or "slug") should be editable. But it's not, thanks to "post_type_link" hook above.
		// -- So when we changing our post title, his slug and permalink stays the same. Client don't like this...
		// -- That's why we need this 'fast fix' solution below.
		$self_type = self::TYPE;
		add_filter('wp_insert_post_data', function ($data) use ($self_type) {
			if (self::TYPE === $data['post_type'] && $data['post_status'] === 'publish') {
				$new_title = sanitize_title($data['post_title']);
				if ($data['post_name'] !== $new_title) {
					$data['post_name'] = $new_title;
				}
			}

			return $data; // Returns the modified data.
		}, 99, 1);
	}

	/**
	 * Register a new CPT to storage the Knowledge.
	 */
	public static function register_cpt()
	{
		$knowledge = new \Lean\Cpt([
			'singular'     => 'Resource',
			'plural'       => 'Resources',
			'post_type'    => self::TYPE,
			'slug'         => 'knowledgebase',
			'menu_name'    => 'Resources',
			'hierarchical' => true,
			'has_archive'  => true,
			'args'         => [
				'menu_icon' => 'dashicons-book-alt',
			],
		]);
		$knowledge->init();

		$treatments = new \Lean\Cpt([
			'singular'     => 'Treatment',
			'plural'       => 'Treatments',
			'post_type'    => self::TYPE_TREATMENT,
			'slug'         => 'treatments',
			'hierarchical' => false,
			'has_archive'  => false,
			'args'         => [
				'show_in_menu' => 'edit.php?post_type=knowledge',
				'exclude_from_search' => true,
//				'menu_icon' => 'dashicons-book-alt',
			],
		]);
		$treatments->init();

		$tests = new \Lean\Cpt([
			'singular'     => 'Test',
			'plural'       => 'Tests',
			'post_type'    => self::TYPE_TEST,
			'slug'         => 'tests',
			'hierarchical' => false,
			'has_archive'  => false,
			'args'         => [
				'show_in_menu' => 'edit.php?post_type=knowledge',
				'exclude_from_search' => false,
//				'menu_icon' => 'dashicons-book-alt',
			],
		]);
		$tests->init();

		self::register_topic_tax();
	}
	/**
	 * Function called to register a new taxonomy associated with each topic
	 */
	public static function register_topic_tax()
	{
		$category_taxonomy = [
			'hierarchical'      => true,
			'labels'            => self::get_labels('Topic', 'Topics'),
			'show_ui'           => true,
			'meta_box_cb'       => false,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [
				'hierarchical' => true,
			],
		];

		register_taxonomy(
			self::TAX_TOPIC,
			[self::TYPE, self::TYPE_TREATMENT, self::TYPE_TEST],
			$category_taxonomy
		);
	}

	/**
	 * Function that helps in the process of the creation of labels for WP.
	 *
	 * @param string $singular The singular representation of the label.
	 * @param string $plural   The plural version of the string.
	 *
	 * @return array An array with the details of the labels.
	 */
	public static function get_labels($singular, $plural)
	{
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

	/**
	 * Function that builds the correct permalink
	 *
	 * @param string $post_link The string of a post.
	 * @param object $post      The post object.
	 * @param string $leavename The name when leaving.
	 *
	 * @return string Correct URL for a knowledge base topic.
	 */
	public static function build_permalink($post_link, $post, $leavename)
	{
		if (self::TYPE !== $post->post_type || 'publish' !== $post->post_status) {
			return $post_link;
		} else {
			$topic_id = get_field('knowledgebase_topic', $post->ID);
			$term = get_term($topic_id);
			$first_parent = get_term($term->parent);

			return site_url(self::TAX_TOPIC . '/' . $first_parent->slug . '/' . $term->slug . '#' . $post->post_name);
		}
	}
}
