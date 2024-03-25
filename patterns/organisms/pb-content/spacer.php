<?php
/**
 * Spacer
 */
$args = wp_parse_args($args, [
	'height'    => 25,
	'height_sm' => 25,
]);
$height = intval($args['height']);
$heightSM = intval($args['height_sm']);

$heightClassMap = [
	10 => 'space-p-top-10',
	25 => 'space-p-top-25',
	50 => 'space-p-top-50',
	75 => 'space-p-top-75',
	100 => 'space-p-top-50 space-p-bottom-50',
	125 => 'space-p-top-75 space-p-bottom-50',
	150 => 'space-p-top-75 space-p-bottom-75',
];
$heightClassMapSM = [
	10 => 'space-p-sm-top-10 space-p-sm-bottom-0',
	25 => 'space-p-sm-top-25 space-p-sm-bottom-0',
	50 => 'space-p-sm-top-50 space-p-sm-bottom-0',
	75 => 'space-p-sm-top-75 space-p-sm-bottom-0',
	100 => 'space-p-sm-top-50 space-p-bottom-50',
	125 => 'space-p-sm-top-75 space-p-bottom-50',
	150 => 'space-p-sm-top-75 space-p-bottom-75',
];

$spacerClass = $heightClassMap[$height] . ' ' . $heightClassMapSM[$heightSM];

?>
<div class="<?= $spacerClass ?>"></div>
