<?php
$args = wp_parse_args( $args, [
	'faq_title' => '',
	'faqs' => '',
	'cta_txt' => '',
	'cta_url' => '',
] );

/* If it's the first loop it has an class called in */
$first = 'in';
?>

<section class="container faq-container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 text-center">
			<h2><?php echo esc_html( $args['faq_title'] ); ?></h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php foreach ( $args['faqs'] as $index => $item ) : ?>
					
				<div class="panel">
					<div class="panel-heading" role="tab" id="heading<?php echo intval( $index ); ?>">
						<h3>
							<a
							role="button"
							data-toggle="collapse"
							data-parent="#accordion"
							href="#collapse<?php echo intval( $index ); ?>"
							aria-expanded="false"
							aria-controls="collapse<?php echo intval( $index ); ?>">
								<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> 
								<?php echo esc_html( $item['inside_page_faq_question'] ); ?> 
							</a>
						</h3>
					</div>

					<div 
						id="collapse<?php echo intval( $index ); ?>"
						role="tabpanel"
						aria-labelledby="heading<?php echo intval( $index ); ?>"
						class="panel-collapse collapse <?php echo sanitize_html_class( $first ); ?>">
						<div class="panel-body">
							<?php echo wp_kses_post( $item['inside_page_faq_answer'] ); ?>
						</div>
					</div>
				</div>

				<?php
					$first = '';
					endforeach;
				?>
			</div>

			<div class="faq-container_cta">
				<a class="btn" href="<?php echo esc_url( $args['cta_url'] ); ?>">
					<?php echo esc_html( $args['cta_txt'] ); ?>
				</a>
			</div>
		</div>
	</div>

	

</section>
