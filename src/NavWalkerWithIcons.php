<?php

namespace Spring;

class NavWalkerWithIcons extends \Walker_Nav_Menu
{

	/**
	 * Additional submenu wrappers (could be useful)
	 */
	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see   Walker::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl(&$output, $depth = 0, $args = [])
	{
		// Default class.
		$classes = ['sub-menu'];
		$class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= "<ul{$class_names}>";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see   Walker::end_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl(&$output, $depth = 0, $args = [])
	{
		$output .= '</ul>';
	}

	/**
	 * @see   Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output       Passed by reference. Used to append additional content.
	 * @param object $item         Menu item data object.
	 * @param int    $depth        Depth of menu item. Used for padding.
	 * @param int    $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$class_names = $value = '';

		$classes = empty($item->classes) ? [] : (array)$item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

		if ($args->has_children)
			$class_names .= ' dropdown';

		if (in_array('current-menu-item', $classes))
			$class_names .= ' active';

		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts = [];
		$atts['title'] = !empty($item->title) ? $item->title : '';
		$atts['target'] = !empty($item->target) ? $item->target : '';
		$atts['rel'] = !empty($item->xfn) ? $item->xfn : '';

		// If item has_children add atts to a.
		if ($args->has_children) {
			$atts['href'] = '#';
			$atts['data-toggle'] = 'dropdown';
			$atts['class'] = 'dropdown-toggle';
			$atts['aria-haspopup'] = 'true';
		} else {
			$atts['href'] = !empty($item->url) ? $item->url : '';
		}

		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;

		/*
         * Glyphicons
         * ===========
         * Since the the menu item is NOT a Divider or Header we check the see
         * if there is a value in the attr_title property. If the attr_title
         * property is NOT null we apply it as the class name for the glyphicon.
         */
		$item_output .= '<a' . $attributes . '>';
		$icon = get_field('menu_intem_icon', $item);
		if (!empty($icon)) {
			$item_output .= $args->link_before;
			$item_output .= '<span class="menu-item-link-img" style="background-image: url(' . $icon['url'] . ')"></span>';
			$item_output .= '<span class="menu-item-link-txt">' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
			$item_output .= $args->link_after;
		} else {
			$item_output .= $args->link_before;
			$item_output .= '<span class="menu-item-link-txt">' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
			$item_output .= $args->link_after;
		}

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}
