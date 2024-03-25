<?php
$args = wp_parse_args( $args, [
	'results_title' => '',
	'results_date' => '',
	'rows' => '',
] );

?>
<section class="container inside-results">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 text-center">
			<h3><?php echo esc_html( $args['results_title'] ); ?></h3>
			<p><?php echo esc_html( $args['results_date'] ); ?></p>

			<table class="table">
				<thead>
					<tr>
						<td></td>
						<td><p class="text-center">National Average</p></td>
						<td>
							<p class="text-center">
								<img width="95"
								  alt="<?php echo esc_attr( $args['results_title'] ); ?>"
								  src="<?php echo esc_url( get_field( 'general_options_logo_blue', 'option' ) ); ?>">
							</p>
						</td>
					</tr>
				</thead>

				<tbody>
					<?php foreach ( $args['rows'] as $item ) : ?>
					<tr>
						<td>
							<img class="table-img" width="58" src="<?php echo esc_url( $item['inside_page_results_row_thumbnail'] ); ?>">
							<div class="table-copy">
								<p><?php echo esc_html( $item['inside_page_results_row_title'] ); ?></p>
								<p class="footnote"><?php echo esc_html( $item['inside_page_results_row_subtitle'] ); ?></p>
							</div>
						</td>
						<td class="number">
							<?php echo esc_html( $item['inside_page_results_row_averagebase'] ); ?> - 
							<?php echo esc_html( $item['inside_page_results_row_averagetop'] ); ?> %</td>
						<td class="number blue"><?php echo esc_html( $item['inside_page_results_row_springnumber'] ); ?> %</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>
