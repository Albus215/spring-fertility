<?php
use Lean\Load;

/**
 * Template Name: IVF
 */

$process_rows = get_field( 'ivf_content' );

get_header();
?>

<div class="mtop80 container icsi-cont">
		<div class="row">
			<?php
			Load::molecule( 'ivf-nav/ivf-nav', [
				'rows' => $process_rows,
			] );
			?>
			<div class="col-xs-12 col-sm-9 processContainer">
				<div class="row">
					<div class="col-xs-12">
						<h5><a href="<?php echo esc_url( get_field( 'ivf_back_url' ) ); ?>"><?php echo esc_html( get_field( 'ivf_back_label' ) ); ?></a></h5>
						<h2><?php the_field( 'ivf_title' ); ?></h2>
					</div>
				</div>

				<?php
					foreach ( $process_rows as $row ) {
						Load::molecule( 'ivf-row/ivf-row', [
							'slug' => $row['ivf_process_slug'],
							'title' => $row['ivf_process_title'],
							'process_image' => $row['ivf_process_image'],
							'circle_image' => $row['ivf_circle_image'],
							'text' => $row['ivf_text'],
						] );
					}
				?>
			</div>
		</div>
	</div>

<?php
get_footer();
