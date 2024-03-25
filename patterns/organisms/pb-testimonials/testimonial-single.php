<?php
/**
 * Testimonial Single
 */
$args = wp_parse_args($args, [
	'testimonial' => '',
]);

?>

<div class="pb__single-testimonial">
	<div class="container-fluid">
		<div class="row display-flex">
			<div class="col-sm-12 col-md-2">
				<div class="pb__testimonial-quote pb__single-testimonial_quote-left "></div>
			</div>
			<div class="col-sm-12 col-md-8">
				<div class="pb__single-testimonial_content">
					<div class="pb__single-testimonial_content-italic"><?= $args['testimonial']->post_content ?></div>
					<p class="pb__single-testimonial_content-name"><?= $args['testimonial']->post_title ?></p>
				</div>
			</div>
			<div class="hidden-sm hidden-xs col-sm-12 col-md-2 align-self-end">
				<div class="pb__testimonial-quote pb__single-testimonial_quote-right"></div>
			</div>
		</div>
	</div>
</div>
