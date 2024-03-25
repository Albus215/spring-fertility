<?php
$args = wp_parse_args( $args, [
	'video_title' => '',
	'video_url' => 'https://www.youtube.com/embed/QsDWxeAM718?rel=0&amp;controls=0&amp;showinfo=0',
	'video_text' => '',
	'video_cta_label' => '',
	'video_cta_url' => '',
] );

?>
<div class="container">
	<div class="home-video row">
		<div class="visible-xs visible-sm col-sm-12">
			<h2><?php echo esc_html( $args['video_title'] ); ?></h2>
			<div class="video-player embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315" src="<?php echo esc_url( $args['video_url'] ); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<p><?php echo esc_html( $args['video_text'] ); ?></p>

			<a class="btn-blue-outline" href="<?php echo esc_url( $args['video_cta_url'] ); ?>"><?php echo esc_html( $args['video_cta_label'] ); ?></a>
		</div>

		<div class="hidden-xs hidden-sm col-md-6">
			<div class="video-player embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315" src="<?php echo esc_url( $args['video_url'] ); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="hidden-xs hidden-sm col-md-5 col-md-offset-1">
			<h2><?php echo esc_html( $args['video_title'] ); ?></h2>
			<p><?php echo esc_html( $args['video_text'] ); ?></p>

			<a class="btn-blue-outline" href="<?php echo esc_url( $args['video_cta_url'] ); ?>"><?php echo esc_html( $args['video_cta_label'] ); ?></a>
		</div>
	</div>
</div>
