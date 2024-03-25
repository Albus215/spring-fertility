<?php
/**
 * Hero Text And Video
 */
$args = wp_parse_args($args, [
	'' => '',
]);

?>

<div class="pb__hero-txt-video space-m-top-10">
	<div class="pb__hero-txt-video-container">
		<div class="pb__hero-txt-video-left">
			<div class="pb__hero-header-text">
				<?= do_shortcode($args['text']) ?>
			</div>
		</div>
		<div class="pb__hero-txt-video-right">
			<?php if (!empty($args['video_embed'])) : ?>
			<div class="video-player embed-responsive embed-responsive-16by9">
				<script data-embed-video-script
						type="text/html" style="display: none"><?= $args['video_embed']; ?></script>
				<?php if (!empty($args['video_cover']['url'])) : ?>
					<div data-embed-video-cover
						 class="video-player-img-cover"
						 style="background-image: url(<?= $args['video_cover']['url'] ?>)"></div>
				<?php endif; ?>
			</div>
			<?php elseif (!empty($args['video_cover']['url'])) : ?>
				<div class="video-player embed-responsive embed-responsive-16by9"
					 style="background-repeat: no-repeat; background-size: cover; background-image: url(<?= $args['video_cover']['url'] ?>)">
				</div>
			<?php endif; ?>
			<div class="pb__hero-txt-video-addon"></div>
		</div>
	</div>
</div>
