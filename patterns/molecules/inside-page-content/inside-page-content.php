<?php
$args = wp_parse_args( $args, [
	'page_title'    => '',
	'page_subtitle' => '',
	'content'       => '',
] );

?>

<div class="container inside-content">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 text-center">
			<h2><?php echo esc_html( $args['page_title'] ); ?></h2>
			<h4><?php echo esc_html( $args['page_subtitle'] ); ?></h4>
		</div>
	</div>
	<?php
		foreach ( $args['content'] as $item ) :
		$circle = ( $item['inside_page_content_info_iscircle'] ? 'circle' : '' );
	?>
		<div class="row inside-info">
			<div class="col-sm-4 col-md-3 col-sm-offset-2 col-md-offset-3 text-center">
				<div
					class="<?php echo esc_attr( $circle ); ?> inside_content_img"
					style="background-image: url('<?php echo esc_url( $item['inside_page_content_info_image'] ); ?>')">
				</div>

			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-6">
				<?php echo wp_kses_post( $item['inside_page_content_info_text'] ); ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
