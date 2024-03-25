<?php
$args = wp_parse_args( $args, [
	'flex_title' => '',
	'flex_subtitle' => '',
	'flex_cols' => '',
	'rows' => '',
	'cols' => '',
] );

$classes = '';

switch ( $args['flex_cols'] ) {
	case 1:
		$classes = 'col-sm-10 col-sm-offset-1';
		break;
	case 2:
		$classes = 'col-sm-6';
		break;
	case 3:
		$classes = 'col-sm-4';
		break;
	case 4:
		$classes = 'col-sm-3';
		break;
	case 5:
		$classes = 'col-sm-2';
		break;
	case 6:
		$classes = 'col-sm-2';
		break;
}

?>

<section class="container inside-flex">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 text-center">
			<h2><?php echo esc_html( $args['flex_title'] ); ?></h2>
			<h4><?php echo esc_html( $args['flex_subtitle'] ); ?></h4>
		</div>
	</div>

	<div class="row">
		<?php foreach ( $args['rows'] as $item ) : ?>
		<div class="<?php echo esc_html( $classes ); ?> text-center inside-flex__content inside-flex__<?php echo esc_html( $args['cols'] ); ?>">
			
			<img src="<?php echo esc_url( $item['inside_page_flexcols_contimage'] ); ?>" class="inside-flex__img" alt="">

			<p><strong><?php echo esc_html( $item['inside_page_flexcols_contitle'] ); ?></strong></p>
			<p><?php echo esc_html( $item['inside_page_flexcols_context'] ); ?></p>
		</div>
		<?php endforeach; ?>
	</div>

</section>
