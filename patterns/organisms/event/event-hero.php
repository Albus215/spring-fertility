<?php
$args = wp_parse_args( $args, [
	'image' => $args['image'],
	'title' => $args['title'],
] );
?>

<div class="row">
	<div class="o__event-hero">
		<div class="o__event-hero__bg"></div>

		<div class="o__event-hero-image col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		
			<img src="<?php echo esc_url( $args['image'] ); ?>"
				 alt="<?php echo esc_url( $args['title'] ); ?>">
		</div>

	</div>
</div>
