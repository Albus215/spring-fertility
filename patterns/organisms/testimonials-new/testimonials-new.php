<?php
/**
 * @var $testimonials WP_Post[]
 */

$args = wp_parse_args($args, [
	'testimonial_items' => [],
	'right_photo' => [],
]);

$testimonials = $args['testimonial_items'];
$photo = $args['right_photo'];


if (!empty($testimonials)) : ?>
	<section class="o_tstm-new <?php echo empty($photo) ? 'o_tstm-new__no-photo' : ''; ?>">
		<div class="o_tstm-new__testimonials">

			<div class="swiper-container"
				 data-tstm-slider-new="">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php foreach ($testimonials as $testimonial) :
						$txt = $testimonial->post_content;
						$name = get_field('testimonial_name_of_patient', $testimonial->ID);
						$type = get_field('testimonial_type_of_patient', $testimonial->ID);
						?>
						<div class="swiper-slide">
							<div class="o_tstm-new__testimonial">
								<div class="o_tstm-new__testimonial-txt">
									<?php echo do_shortcode($txt); ?>
								</div>
								<div class="o_tstm-new__testimonial-person">
									<span class="o_tstm-new__testimonial-name"><?php echo $name; ?></span>
									<?php if (!empty($type)) : ?>
										<span class="o_tstm-new__testimonial-type">| <?php echo $type; ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>

		</div>
		<?php if (!empty($photo)) : ?>
			<div class="o_tstm-new__img"
				 style="background-image: url(<?php echo $photo['url']; ?>)"></div>
		<?php endif; ?>
	</section>
<?php endif;
