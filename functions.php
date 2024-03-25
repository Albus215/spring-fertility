<?php use Spring\ThemeSetup;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */

// Constants.
define('LEANP_THEME_NAME', 'SpringFertility');
define('LEANP_THEME_VERSION', '0.1.0');
define('LEANP_MINIMUM_WP_VERSION', '4.3.1');

// Composer autoload.
require_once get_template_directory() . '/vendor/autoload.php';
require_once get_template_directory() . '/Setup.php';
ThemeSetup::init();

// Run the theme setup.
add_filter('loader_directories', function ($directories) {
	$directories[] = get_template_directory() . '/patterns';
	return $directories;
});

add_filter('loader_alias', function ($alias) {
	$alias['atom'] = 'atoms';
	$alias['molecule'] = 'molecules';
	$alias['organism'] = 'organisms';
	return $alias;
});

// -- temp disable admin bar
add_filter('show_admin_bar', '__return_false');


/**
 * Use an icon from an icon sprite.
 *
 * @param string $id The ID of the icon.
 * @param string $class_name The name of the class to be used for the icon.
 */
function use_icon($id = '', $class_name = '')
{
	?>
	<svg class="<?php echo esc_attr($class_name); ?>">
		<use xlink:href="#<?php echo esc_attr($id); ?>"/>
	</svg>
	<?php
}

/**
 * Function used to render custom tags from the admin into the site just after
 * the <body> tag.
 */
add_action('lean/before_header', function () {
	if (function_exists('the_field')) {
		the_field('general_options_google_tag_manager', 'option');
	}
});


/**
 * Hook applied to before the header to load the sprite with the icons before
 * loading the sprite makes sure the file is present to prevent any error to
 * happen.
 */
add_action('lean/after_footer', function () {
	$icon_path = './patterns/static/icons/icons.svg';
	$sprite = get_theme_file_path($icon_path);
	// @codingStandardsIgnoreStart
	$content = file_exists($sprite) ? file_get_contents($sprite) : false;
	if ($content) {
		printf('<div class="visuallyhidden">%s</div>', $content);
	}
	// @codingStandardsIgnoreEnd
});

add_action('after_setup_theme', function () {

	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support('html5');
});

/**
 * Function used to add bootstrap
 */
function lean_enqueue_scripts()
{
	wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['jquery'], false, true);
}

add_action('wp_enqueue_scripts', 'lean_enqueue_scripts');

wp_enqueue_style('egg-hunt', get_theme_root_uri() . "/spring-fertility/patterns/egg-hunt.css", null, rand(111, 9999));

/**
 * Function used to add menus
 */
register_nav_menus([
	// --
	//	'header_nav_primary' => 'SF - Header Primary Nav',
	//	'header_nav_secondary' => 'SF - Header Secondary Nav',
	'footer_1' => 'SF - Footer 1 Nav',
	'footer_2' => 'SF - Footer 2 Nav',
	'footer_3' => 'SF - Footer 3 Nav',
	'footer_4' => 'SF - Footer 4 Nav',
	// --

	'more_menu' => 'SF - More Menu',
	'egg_hunt'  => 'SF - Spring Egg Hunt',

	'top_info_menu' => 'SF - Top Info Menu',
]);

add_filter('_wp_post_revision_fields', 'add_field_debug_preview');

/**
 * Debug preview with custom fields
 *
 * @param array $fields that are being used in the post.
 */
function add_field_debug_preview($fields)
{
	$fields['debug_preview'] = 'debug_preview';
	return $fields;
}

add_action('edit_form_after_title', 'add_input_debug_preview');

/**
 * Debug preview with custom fields located after title.
 */
function add_input_debug_preview()
{
	echo '<input type="hidden" name="debug_preview" value="debug_preview">';
}

/**
 * Truncate the length of the Title
 *
 * @param string $title of the post.
 */
function max_title_length($title)
{
	$getlength = strlen($title);
	if ($getlength > 58) {
		return substr($title, 0, 58) . '...';
	} else {
		return $title;
	}
}

/**
 * Load a script in the admin to hide parent Taxonomies
 *
 * @param string $hook current Page.
 */
function load_knowledgebase_js($hook)
{
	if ('post.php' !== $hook) {
		return;
	}
	wp_enqueue_script('knowledgebase_js', get_template_directory_uri() . '/knowledgebase.js');
}

add_action('admin_enqueue_scripts', 'load_knowledgebase_js');

/**
 * Hide Press releases from the Blog categories
 *
 * @param array $args from the Blog Page.
 */
function hide_pressreleases($args)
{
	$categories = get_categories($args);

	/**
	 * Filtering categories to find id of the one to hide
	 *
	 * @param array $category each element of the categories on site.
	 */
	function verify_if_exists($category)
	{
		return in_array($category->slug, ['press-releases'], true);
	}

	$press_id = array_filter($categories, 'verify_if_exists');

	return array_values($press_id)[0]->term_id;
}

add_shortcode('workable-jobs', function ($attributes = []) {
	$styleClass = !empty($attributes['style']) ? $attributes['style'] : '';
	return '<script src="https://www.workable.com/assets/embed.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
		whr(document).ready(function(){
    		whr_embed(418020, {detail: "titles", base: "jobs", zoom: "city", grouping: "locations"});});
	</script>
	<div class="whr whr-' . $styleClass . '" id="whr_embed_hook"></div>';
});

/**
 * Get Image Thumbnail Functions
 */
function spring_tmb_wp() { }

function spring_tmb_acf($imgArray = [], $mobileSize = 'medium', $defaultSize = 'large')
{
	return wp_is_mobile() ?
		$imgArray['sizes'][$mobileSize] :
		(!$defaultSize ? $imgArray['url'] : $imgArray['sizes'][$defaultSize]);
}

// --
// -- Campaing tracking
// --
$springCampaingIdKey = 'campaing_id';

add_action('init', function () use ($springCampaingIdKey) { // -- Remember camplaing ID
	if (!empty($_GET[$springCampaingIdKey])) {
		if (!session_id()) session_start();
		$springCampaingIdValue = (string)$_GET[$springCampaingIdKey];

	}
});

/*
 * Unique Form Values
 */
//Patient and partner must have different email addresses
//new GW_Require_Unique_Values( array(
//	'form_id' => 33,
//	'field_ids' => array(9, 53),
//	'validation_message' => 'Please provide a unique email address. Your partner cannot use the same email.'
//));


include 'src/functions-gforms.php';

