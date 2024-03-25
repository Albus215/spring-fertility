<?php
// --
// -- Book a Consult - 2021
// --

// --
// -- Show Simple field Values in the HTML fields Content
// --
add_filter('gform_pre_render', function ($form) {
	if (strpos($form['cssClass'], 'form-bac') === false) return $form;

	$current_page = GFFormDisplay::get_current_page($form['id']);
	if ($current_page > 1) {
		$fieldsMap = [];
		foreach ($form['fields'] as &$field) {
			if (
				$field->type === 'text' || $field->type === 'email' || $field->type === 'phone' ||
				$field->type === 'textarea' || $field->type === 'select' || $field->type === 'radio'
			) {
				$fieldsMap['{{' . sanitize_title($field->label) . '}}'] = rgpost('input_' . $field->id);
				$fieldsMap['{{field_' . $field->id . '}}'] = rgpost('input_' . $field->id);
			}
		}

		$fieldsMapKeys = array_keys($fieldsMap);
		$fieldsMapValues = array_values($fieldsMap);

		foreach ($form['fields'] as &$field) {
			if ($field->type === 'html' && strpos($field->content, '{{') !== false) {
				$field->content = str_replace($fieldsMapKeys, $fieldsMapValues, $field->content);
			}
		}
	}

	return $form;
});

use Spring\Modules\Team\Team;

// --
// -- Provider Selection
// --
add_filter( 'gform_pre_render', 'spring_bac_provider_selection' );
add_filter( 'gform_pre_validation', 'spring_bac_provider_selection' );
//add_filter( 'gform_admin_pre_render', 'spring_bac_provider_selection' );
function spring_bac_provider_selection($form) {
	if (strpos($form['cssClass'], 'form-bac') === false) return $form;

	$current_page = intval(GFFormDisplay::get_current_page($form['id']));
	if ($current_page > 1) {

		$chosenState = '';
		foreach ($form['fields'] as &$field) {
			if (strpos($field->cssClass, 'form-bac__box-state') !== false) {
				$chosenState = sanitize_title(rgpost('input_' . $field->id));
				break;
			}
		}

		$chosenLocation = '';
		if ($chosenState === 'new-york') {
			$chosenLocation = 'new-york';
		} else {
			foreach ($form['fields'] as &$field) {
				if (strpos($field->cssClass, 'form-bac__locations-at-ca') !== false) {
					$chosenLocation = sanitize_title(rgpost('input_' . $field->id));
					break;
				}
			}
		}

		if (empty($chosenLocation)) return $form;

		$team = Team::load();
		if (empty($team)) return $form;

		$teamChoices = [];
		foreach ($team as $person) {
			if (empty(get_field('is_md', $person->ID))) continue;
			$locations = get_field('team_location_booking', $person->ID);
			$locationFound = false;
			foreach ($locations as $location) {
				if (sanitize_title($location) === $chosenLocation) {
					$locationFound = true;
					break;
				}
			}
			if (!$locationFound) continue;

			$name = get_field('team_name', $person->ID);
			$position = get_field('team_specialty', $person->ID);
			$photo = get_field('team_photo', $person->ID);
			$link = get_permalink($person->ID);
			$teamChoices[] = [
				'value' => $name,
				'text'  => '<span class="form-bac__box-team-img" style="background-image: url(' . $photo . ')"></span><br>' .
					'<span class="form-bac__box-team-name">' . $name . '</span><br>' .
					'<span class="form-bac__box-team-pos">' . $position . '</span><br>
					<a class="form-bac__box-team-link form-bac__info-open" href="' . $link . '" target="_blank"></a>',
			];
		}

		foreach ($form['fields'] as &$field) {
			if (strpos($field->cssClass, 'form-bac__box-provider-selection') !== false) {
				$field->choices = $teamChoices;
				break;
			}
		}
	}

	return $form;
}

// --
// -- Modal Wrapping
// --
add_filter('gform_pre_render', function ($form) {
	if (strpos($form['cssClass'], 'form-bac') === false) return $form;

	$current_page = GFFormDisplay::get_current_page($form['id']);
	if ($current_page > 1) {
		foreach ($form['fields'] as &$field) {
			if ($field->type === 'html' && strpos($field->cssClass, 'form-bac__modal') !== false) {
				$field->content = '
				<div data-fbac-modal class="' . $field->cssClass . '">
					<div class="" data-fbac-modal-box>
						<div data-fbac-modal-x>&times;</div>
						' . $field->content . '
					</div>
					<div data-fbac-modal-bg></div>
				</div>
				';
			}
		}
	}

	return $form;
});

// --
// -- Show Fields from forms (from $_GET)
// --
add_shortcode('spring_sc_get_param', function ($atts) {
	return (empty($atts['name'])) ? '' : trim((string)$_GET[$atts['name']]);
});
