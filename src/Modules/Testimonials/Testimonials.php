<?php namespace Spring\Modules\Testimonials;

/**
 * Class that creates a new CPT to storage the Testimonials.
 */
class Testimonials {

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
		$testimonial = new \Lean\Cpt([
			'singular' => 'Testimonial',
			'plural' => 'Testimonials',
			'post_type' => 'testimonials',
			'slug' => 'testimonial',
			'args' => [
				'menu_icon' => 'dashicons-format-chat',
				'supports'  => ['title', 'thumbnail', 'editor',],
			],
		]);
		$testimonial->init();
	}
}
