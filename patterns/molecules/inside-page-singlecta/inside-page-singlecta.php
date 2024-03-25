<?php
$args = wp_parse_args( $args, [
	'single_bkcolor' => '',
	'single_title'   => '',
	'single_text'    => '',
	'single_cta'     => '',
	'single_ctaurl'  => '',
] );
$bk_color = $args['single_bkcolor'][0];
?>

<div class="container-fluid inside-singlecta">
	<section class="row <?php echo esc_html( $bk_color ); ?>">
		<div class="col-sm-10 col-sm-offset-1">
			<h2><?php echo esc_html( $args['single_title'] ); ?></h2>
			<p><?php echo esc_html( $args['single_text'] ); ?></p>
			<a class="btn" href="<?php echo esc_url( $args['single_ctaurl'] ); ?>"><?php echo esc_html( $args['single_cta'] ); ?></a>
		</div>
	</section>
</div>
