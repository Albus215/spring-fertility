<?php
$args = wp_parse_args($args, [
	'testimonial' => '',
	'background_image' => '',
]);
$testimonial = $args['testimonial'];
$img_bg = $args['background_image'];
?>

<div class="clearfix single-testimonial">
	<div class="single-testimonial__bg" style="background-image: url(<?= $img_bg ?>)"></div>
	<div class="single-testimonial__overlay"></div>
	<div class="container clearfix single-testimonial__container">
		<div class="col-md-4 col-sm-12">
			<div class="single-testimonial__person">
				<?= get_field('testimonial_name_of_patient', $testimonial->ID); ?>
			</div>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="single-testimonial__text">
				<?= do_shortcode($testimonial->post_content); ?>
			</div>
		</div>
	</div>
</div>
