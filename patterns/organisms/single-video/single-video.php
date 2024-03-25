<?php
use Lean\Load;

$args = wp_parse_args($args, [
	'title' => '',
	'embed' => '',
]);
?>

<div class="o__single-video">
	<div class="container-fluid">
		<div class="row">
			<div class="o__single-video-wrapper col-md-12 col-lg-8 col-lg-offset-2">
				<p class="o__single-video-title"><?php echo esc_html( $args['title'] ); ?></p>
				<div class="o__single-video-ratio">
					<?php if ( ! empty( $args['embed'] ) ) : ?>
						<iframe
							width="560"
							height="315"
							src="<?php echo esc_url( $args['embed'] ); ?>"
							frameborder="0"
							allowfullscreen
						></iframe>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
