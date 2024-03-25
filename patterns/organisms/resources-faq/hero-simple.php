<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'title' => '',
]);

?>

<div class="o__resf-hero o__resf-hero-simple">
	<div class="o__resf-hero-txt">
		<h1><?php echo $args['title']; ?></h1>
	</div>
</div>
