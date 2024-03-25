<?php
/**
 * Testimonials slider
 */

$args = wp_parse_args($args, [
	'testimonials' => [],
]);

if (!empty($args['testimonials'])) :
	$testimonials = $args['testimonials'];
	$testimonialsSliderId = 'testimonial-swiper-' . md5(count($testimonials) . rand(1000, 9999));
	?>
	<div id="<?= $testimonialsSliderId ?>"
		 class="swiper-container testimonial-swiper">
		<div class="swiper-wrapper">
			<?php foreach ($testimonials as $testimonial) :
				/**
				 * @var WP_Post $testimonial
				 */
				$testimonailTxt = do_shortcode($testimonial->post_content);
				$testimonailImg = get_field('testimonial_image', $testimonial->ID);
				$testimonailName = get_field('testimonial_name_of_patient', $testimonial->ID);
				$testimonailType = get_field('testimonial_type_of_patient', $testimonial->ID);
				?>
				<div class="swiper-slide">
					<div class="testimonial-swiper__box">
						<?php if (!empty($testimonailImg)) : ?>
							<div class="testimonial-swiper__img"
								 style="background-image: url(<?= $testimonailImg ?>)">
							</div>
						<?php endif; ?>
						<div class="testimonial-swiper__txt"><?= $testimonailTxt ?></div>
						<div class="testimonial-swiper__name">
							<?= $testimonailName ?> | <?= $testimonailType ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
<?php endif;
