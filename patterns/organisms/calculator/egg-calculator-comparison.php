<?php
/**
 * EggCalculator Block
 */

use Lean\Load;

$args = wp_parse_args($args, [
	'title'       => 'What are My chances?',
	'subtitle'    => '',
	'info'        => '',
	'description' => '',
]);

$title = $args['title'];
$subtitle = $args['subtitle'];
$info = $args['info'];
$compared_items = $args['compared_items'];

$modalInfoPrefix = 'egg-calc-compare-info-';

$description = $args['description'];
?>

<div class="container">
	<div class="egg-calc__infocontainer">
		<div class="egg-calc__infocontainer-description">
			<div class="clearfix">
				<?= do_shortcode($description); ?>
			</div>
		</div>
		<div class="egg-calc__infocontainer-calculator">
			<?php Load::organism('calculator/egg-calculator-comparison-block', [
				'title'          => $args['title'],
				'subtitle'       => $args['subtitle'],
				'info'           => $args['info'],
				'compared_items' => $args['compared_items'],
			]); ?>
		</div>
	</div>
</div>


