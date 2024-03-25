<?php
$args = wp_parse_args($args, [
	'items' => '',
	'images' => '',
]);

?>

<?php if (is_page_template( 'page-templates/egg-hunt.php' )) : ?>
    <div class="testimonial-cont container-fluid">
        <div class="row egg-hunt-testimonials-row">
            <div class="egg-hunt-testimonials-wrapper col-xs-12 col-sm-6">
                <div class="testimonials">
                    <?php foreach ($args['items'] as $item) : ?>
                        <div class="testimonial-item">
                            <div class="testimonial-left col-xs-12 col-sm-12">
                                <p><?= $item['testimonials_text'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="egg-hunt-testimonials-wrapper egg-hunt-testimonials-wrapper-right col-xs-12 col-sm-6">
                <div class="video-player embed-responsive embed-responsive-16by9">
                    <iframe width="450" height="280" src="<?php echo esc_url( $args['images'] ); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
<?php  else : ?>
    <div class="testimonial-cont container-fluid">
        <div class="row">
            <div class="testimonials">
					<?php foreach ($args['items'] as $item) : ?>

                        <div class="testimonial-item">
                            <div class="testimonial-left col-xs-12 col-sm-6">
                                <h2><?php echo esc_html(the_field('testimonial_name_of_patient', $item->ID)); ?></h2>
                                <h4><?php echo esc_html(the_field('testimonial_type_of_patient', $item->ID)); ?></h4>
                            </div>
                            <div class="testimonial-right col-xs-12 col-sm-6">
                                <p><?php echo esc_html($item->post_content); ?></p>
                            </div>
                        </div>

					<?php endforeach; ?>
            </div>
        </div>
		<?php if (!empty($args['images'][0]['home_testimonial_footer_image'])) : ?>
            <div class="row testimonials-images">
                <div class="col-sm-5 col-md-4">
                    <img class="testimonial-img"
                         alt="Testimonials"
                         src="<?php echo esc_url($args['images'][0]['home_testimonial_footer_image']); ?>">
                </div>
                <div class="hidden-xs col-sm-7 col-md-4">
                    <img class="testimonial-img"
                         alt="Testimonials"
                         src="<?php echo esc_url($args['images'][1]['home_testimonial_footer_image']); ?>">
                </div>
                <div class="hidden-xs hidden-sm col-md-4">
                    <img class="testimonial-img"
                         alt="Testimonials"
                         src="<?php echo esc_url($args['images'][2]['home_testimonial_footer_image']); ?>">
                </div>
            </div>
		<?php endif; ?>
    </div>
<?php endif; ?>

