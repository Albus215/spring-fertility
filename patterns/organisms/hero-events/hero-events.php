<?php
$args = wp_parse_args($args, [
	'image' => '',
	'title' => '',
	'text' => '',
] );
?>

<div class="o__hero-events">
	<div class="o__hero-events-background"
		style="background-image: url(' <?php echo esc_url( $args['image'] ); ?> ');">

	</div>
	<div class="o__hero-events-text">
		<h1 class="o__hero-events-title"><b><?php echo esc_html( $args['title'] ); ?></b></h1>
		<p><?php echo esc_html( $args['text'] ); ?></p>
	</div>
</div>
