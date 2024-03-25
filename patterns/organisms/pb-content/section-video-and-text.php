<?php
/**
 * Section Video + Text
 */
$args = wp_parse_args($args, [
	'direction'           => 1,
	'use_dark_background' => false,
	'video_type'          => '',
	'video_embed'         => '',
	'video_file'          => '',
	'text'                => '',
]);

$sectionClass = $args['use_dark_background'] ? 'pb__video-text-dark' : '';
$buttonClass = $args['use_dark_background'] ? 'btn' : 'btn-dark-blue-outline';

?>
<div class="clearfix <?= $sectionClass ?>">
	<div class="container space-p-top-50 space-p-bottom-50">
		<div class="pb__video-text row">

			<div class="visible-xs visible-sm col-sm-12 space-p-bottom-25">
				<div class="pb__text pb__text-center space-p-bottom-25">
					<?= $args['text']; ?>
				</div>
				<?php if ($args['video_type'] === 'embed') : ?>
					<div class="video-player embed-responsive embed-responsive-16by9">
						<script data-embed-video-script
								type="text/html" style="display: none"><?= $args['video_embed']; ?></script>
						<?php if (!empty($args['image']['url'])) : ?>
							<div data-embed-video-cover
								 class="video-player-img-cover"
								 style="background-image: url(<?= $args['image']['url'] ?>)"></div>
						<?php endif; ?>
					</div>
				<?php elseif ($args['video_type'] === 'file') :
					$video_file_aspect_ratio = '0.5625';
					$video_file = $args['video_file'];
					$video_file_poster = $args['image'];
					$video_file_poster_url = !empty($video_file_poster) ? $video_file_poster['url'] : ''; ?>
					<div class="video-player__file">
						<?= do_shortcode(
							"[flowplayer src='{$video_file['url']}'
											ratio='{$video_file_aspect_ratio}'
											poster='{$video_file_poster_url}'
											class='no-toggle fp-edgy' ]"
						) ?>
					</div>
				<?php elseif (!empty($args['image']['url'])) : ?>
					<div class="video-player embed-responsive embed-responsive-16by9"
						 style="background-repeat: no-repeat; background-size: cover; background-image: url(<?= $args['image']['url'] ?>)">
					</div>
				<?php endif; ?>
				<?php if (!empty($args['button']['url'])) : ?>
					<div class="pb__text-center">
						<a class="<?= $buttonClass ?> space-m-top-25"
						   target="<?= $args['button']['target']; ?>"
						   href="<?= $args['button']['url']; ?>"><?= $args['button']['title']; ?></a>
					</div>
				<?php endif; ?>
			</div>

			<?php if (intval($args['direction']) === 1) : ?>
				<div class="hidden-xs hidden-sm col-md-6">

					<?php if ($args['video_type'] === 'embed') : ?>
						<div class="video-player embed-responsive embed-responsive-16by9">
							<script data-embed-video-script
									type="text/html" style="display: none"><?= $args['video_embed']; ?></script>
							<?php if (!empty($args['image']['url'])) : ?>
								<div data-embed-video-cover
									 class="video-player-img-cover"
									 style="background-image: url(<?= $args['image']['url'] ?>)"></div>
							<?php endif; ?>
						</div>
					<?php elseif ($args['video_type'] === 'file') :
						$video_file_aspect_ratio = '0.5625';
						$video_file = $args['video_file'];
						$video_file_poster = $args['image'];
						$video_file_poster_url = !empty($video_file_poster) ? $video_file_poster['url'] : ''; ?>
						<div class="video-player__file">
							<?= do_shortcode(
								"[flowplayer src='{$video_file['url']}'
											ratio='{$video_file_aspect_ratio}'
											poster='{$video_file_poster_url}'
											class='no-toggle fp-edgy' ]"
							) ?>
						</div>
					<?php elseif (!empty($args['image']['url'])) : ?>
						<div class="video-player embed-responsive embed-responsive-16by9"
							 style="background-repeat: no-repeat; background-size: cover; background-image: url(<?= $args['image']['url'] ?>)">
						</div>
					<?php endif; ?>
				</div>
				<div class="hidden-xs hidden-sm col-md-6 pb-video-and-text-right">
					<div class="pb__text">
						<?= $args['text']; ?>
						<?php if (!empty($args['button']['url'])) : ?>

							<a class="<?= $buttonClass ?> space-m-top-25"
							   target="<?= $args['button']['target']; ?>"
							   href="<?= $args['button']['url']; ?>"><?= $args['button']['title']; ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php else : ?>
				<div class="hidden-xs hidden-sm col-md-6 pb-video-and-text-left">
					<div class="pb__text">
						<?= $args['text']; ?>
						<?php if (!empty($args['button']['url'])) : ?>

							<a class="<?= $buttonClass ?> space-m-top-25"
							   target="<?= $args['button']['target']; ?>"
							   href="<?= $args['button']['url']; ?>"><?= $args['button']['title']; ?></a>
						<?php endif; ?>

					</div>
				</div>
				<div class="hidden-xs hidden-sm col-md-6 ">

					<?php if ($args['video_type'] === 'embed') : ?>
						<div class="video-player embed-responsive embed-responsive-16by9">
							<script data-embed-video-script
									type="text/html" style="display: none"><?= $args['video_embed']; ?></script>
							<?php if (!empty($args['image']['url'])) : ?>
								<div data-embed-video-cover
									 class="video-player-img-cover"
									 style="background-image: url(<?= $args['image']['url'] ?>)"></div>
							<?php endif; ?>
						</div>

					<?php elseif ($args['video_type'] === 'file') :
						$video_file_aspect_ratio = '0.5625';
						$video_file = $args['video_file'];
						$video_file_poster = $args['image'];
						$video_file_poster_url = !empty($video_file_poster) ? $video_file_poster['url'] : ''; ?>
						<div class="video-player__file">
							<?= do_shortcode(
								"[flowplayer src='{$video_file['url']}'
											ratio='{$video_file_aspect_ratio}'
											poster='{$video_file_poster_url}'
											class='no-toggle fp-edgy' ]"
							) ?>
						</div>
					<?php elseif (!empty($args['image']['url'])) : ?>
						<div class="video-player embed-responsive embed-responsive-16by9"
							 style="background-repeat: no-repeat; background-size: cover; background-image: url(<?= $args['image']['url'] ?>)">
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
