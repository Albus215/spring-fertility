<?php
$args = wp_parse_args( $args, [
	'rows' => [],
] );
?>

<div class="col-xs-12 col-sm-3 nav-box">
	<div class="sticky-outer-wrapper">
		<div class="sticky-inner-wrapper" style="position: relative;">
			<ul class="ivf-nav">
				<li class="strong">GO TO</li>
				<?php foreach ( $args['rows'] as $row ) : ?>
					<li><a href="#<?php echo esc_attr( $row['ivf_process_slug'] ); ?>"><?php echo esc_attr( $row['ivf_process_title'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<ul class="icsi-mobile-nav">
		<li class="strong">GO TO</li>
		<?php foreach ( $args['rows'] as $row ) : ?>
			<li><a href="#<?php echo esc_attr( $row['ivf_process_slug'] ); ?>"><?php echo esc_html( $row['ivf_process_title'] ); ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
