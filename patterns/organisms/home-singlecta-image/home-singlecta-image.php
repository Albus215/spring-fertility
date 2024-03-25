<?php
$args = wp_parse_args( $args, [
	'background' => '',
	'image' => '',
	'title' => '',
	'text' => '',
	'label' => '',
	'url' => '',
] );
$bk_color = $args['background'];

?>

<div class="home-singlecta-image <?php echo esc_html( $bk_color ); ?>">
	<div class="container">
		<div class="row">
			<div class="visible-xs visible-sm home-scta-image col-sm-12">
				<img class="img-responsive" src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_html( $args['title'] ); ?>">
			</div>
			<div class="col-sm-12 col-md-6">

				<h3><?php echo esc_html( $args['title'] ); ?></h3>
				<p><?php echo esc_html( $args['text'] ); ?></p>

				<div class="btn-blue-outline"><a href="<?php echo esc_url( $args['url'] ); ?>"><?php echo esc_html( $args['label'] ); ?></a></div>
			</div>
			<div class="hidden-xs hidden-sm col-md-6">
				<img class="home-scta-image" src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_html( $args['title'] ); ?>">
			</div>
		</div>
	</div>
</div>
