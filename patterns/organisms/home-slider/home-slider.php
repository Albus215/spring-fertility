<?php

$args = wp_parse_args( $args, [
	'title' => '',
	'text' => '',
	'images' => [],
] );

?>

<div class="o__slider">
	<div class="container">
		<div class="row">
			<h3 class="o__slider-title"><?php echo esc_html( $args['title'] ); ?></h3>
			<p class="o__slider-text"><?php echo esc_html( $args['title'] ); ?></p>
		</div>
		<div class="row">
			<div class="o__slider-list col-xs-12 col-sm-8 col-sm-offset-2" data-home-slider>
				<?php foreach ( $args['images'] as $slide ) : ?>
					<div class="o__slider-item">
						<img class="o__slider-image"
							src="<?php echo esc_url( $slide['home_slider_image'] ); ?>"
							alt="<?php echo esc_attr( $slide['home_slider_image_alt_text'] ); ?>"
						/>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="o__slider-nav">
				<div class="o__slider-nav-prev"></div>
				<div class="o__slider-nav-next"></div>
			</div>
		</div>
	</div>
</div>

