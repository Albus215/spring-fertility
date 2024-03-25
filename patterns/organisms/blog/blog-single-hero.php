<?php

$args = wp_parse_args($args, [
	'image' => '',
	'title' => '',
	'use_video' => '',
	'video' => '',
	'video_type' => 'embed',
	'video_file' => [],
	'video_file_poster' => [],
	'video_file_aspect_ratio' => '0.5625',
]);

$image = $args['image'];
$image_src = ($image ? $image : get_field('general_options_backup_blog_image', 'option'));

$use_video = boolval($args['use_video']);
$video_type = $args['video_type'];
$video_embed = (string)$args['video'];
$video_file = $args['video_file'];
$video_file_poster = $args['video_file_poster'];
$video_file_aspect_ratio = floatval($args['video_file_aspect_ratio']);

?>

<div class="row">
	<div class="o__event-hero">
		<div class="o__event-hero__bg"></div>

		<div class="o__event-hero-image col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">

			<?php if ($use_video) :
				if ($video_type === 'embed') : ?>
					<div class="video-player embed-responsive embed-responsive-16by9">
						<?= wp_oembed_get($args['video']) ?>
					</div>
				<?php elseif ($video_type === 'file') :
					$video_file_poster_url = !empty($video_file_poster) ? $video_file_poster['url'] : ''; ?>
					<div class="video-player__file">
<!--						--><?//= do_shortcode(
//							"[evp_embed_video url='{$video_file['url']}' ratio='{$video_file_aspect_ratio}' poster='{$video_file_poster_url}' class='no-toggle fp-edgy' ]"
//						) ?>
						<?= do_shortcode(
							"[flowplayer src='{$video_file['url']}'
							ratio='{$video_file_aspect_ratio}'
							poster='{$video_file_poster_url}'
							class='no-toggle fp-edgy' ]"
						) ?>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<img src="<?php echo esc_url($image_src); ?>"
					 alt="<?php echo esc_attr($args['title']); ?>">
			<?php endif; ?>
		</div>

	</div>
</div>
