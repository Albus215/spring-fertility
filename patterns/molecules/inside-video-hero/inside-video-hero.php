<?php
$args = wp_parse_args( $args, [
	'video_bkmp4'    => '',
	'video_bkogv'    => '',
	'video_bkwebm'   => '',
	'video_bkstill'  => '',
	'video_modalurl' => '',
	'video_title'    => '',
	'video_subtitle' => '',
	'video_text'     => '',
	'video_cta_text' => '',
	'video_cta_url'  => '',
] );

?>

<div class="container-fluid">
	<div class="row">
		<section class="insidepage-hero" style="width: 100%;">
			<div class="hero-video-content">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h2><?php echo esc_html( $args['video_title'] ); ?></h2>
						<h3><?php echo esc_html( $args['video_subtitle'] ); ?></h3>
						<p><?php echo esc_html( $args['video_text'] ); ?></p>

						<button class="btn btn-big hero-btn">
							<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
							<?php echo esc_html( $args['video_cta_text'] ); ?>
						</button>

					</div>
				</div>
			</div>

			<video muted loop="" autoplay="" id="my-video" class="video" width="300" height="150" style="background-size: cover;">
				<source src="<?php echo esc_url( $args['video_bkmp4'] ); ?>" type="video/mp4">
				<source src="<?php echo esc_url( $args['video_bkogv'] ); ?>" type="video/ogg">
				<source src="<?php echo esc_url( $args['video_bkwebm'] ); ?>" type="video/webm">
			</video>
			<div class="vid-placeholder" style="background-image: url('<?php echo esc_url( $args['video_bkstill'] ); ?>');"></div>
		</section>
	</div>
</div>

<div class="herovideo-modal modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
	<div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="<?php echo esc_url( $args['video_modalurl'] ); ?>"></iframe>
	</div>
	<div class="btn-modal-close" data-dismiss="modal">Close</div>
  </div>
</div>
