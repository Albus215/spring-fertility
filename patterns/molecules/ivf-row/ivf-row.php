<?php
$args = wp_parse_args( $args, [
	'slug' => '',
	'title' => '',
	'process_image' => '',
	'circle_image' => '',
	'text' => '',
] );

?>

<!-- Begin Molecule -->
<a name="<?php echo esc_attr( $args['slug'] ); ?>"></a>
<div class="row">
	<div class="col-sm-3">
		<div class="process-circle"><img src="<?php echo esc_url( $args['process_image'] ); ?>"></div>
		<?php if ( ! empty( $args['circle_image'] ) ) : ?>
			<div class="image-circle" style="background-image: url(<?php echo esc_attr( $args['circle_image'] ); ?>);"></div>
		<?php endif; ?>
	</div>
	<div class="col-sm-9 process-copy">

		<h3><?php echo esc_html( $args['title'] ); ?></h3>

		<?php echo wp_kses_post( $args['text'] ); ?>

		<div class="process-copy-block">
			<p class="backtotop"><a href="#top">Back to top</a></p>
		</div>
	</div>
</div>
<!-- End Molecule -->
