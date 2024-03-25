<?php
$args = wp_parse_args( $args, [
	'twocol_image' => '',
	'twocol_title' => '',
	'twocol_text'  => '',
	'twocol_cta'   => '',
	'twocol_url'   => '',
] );

?>

<div class="container inside-twocol">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<img class="ivfPreview" src="<?php echo esc_url( $args['twocol_image'] ); ?>">
		</div>
		<div class="col-sm-6">
			<h2><?php echo esc_html( $args['twocol_title'] ); ?></h2>
			<p><?php echo esc_html( $args['twocol_text'] ); ?></p>
			<a class="btn" href="<?php echo esc_url( $args['twocol_url'] ); ?>"><?php echo esc_html( $args['twocol_cta'] ); ?></a>
		</div>
	</div>
</div>
<hr>
