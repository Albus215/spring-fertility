<?php
$args = wp_parse_args( $args, [
	'press_title' => '',
	'press_text' => '',
	'press_image' => '',
	'press_url' => '',
] );

?>

<section class="container-fluid inside-press">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 slide-inner text-center">
			<h2><?php echo esc_html( $args['press_title'] ); ?></h2>

			<a href="<?php echo esc_url( $args['press_url'] ); ?>">
				<?php echo esc_html( $args['press_text'] ); ?>
				<br>
				<div style="background-image: url('<?php echo esc_url( $args['press_image'] ); ?>')" class="cnet-logo"></div>
			</a>

		</div>
	</div>
</section>
