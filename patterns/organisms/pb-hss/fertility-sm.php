<?php
/**
 * Horiontal Scroll Section - Egg Freezing
 */

use Lean\Load;

$args = wp_parse_args($args, [
	'section_1_sm' => [],
	'section_2_sm' => [],
	'section_3_sm' => [],
	'section_4_sm' => [],
]);
?>
<section class="pb-vsssf">

	<div class="pb-vsssf-box-1">
		<div class="pb-vsssf-box-1__wrap-1">
			<div class="pb-vsssf-box-1__bg"
				 style="background-image: url(<?= $args['section_1_sm']['background']['url'] ?>)"></div>
			<div class="pb-vsssf-box-1__bg-addon"></div>
			<div class="pb-vsssf-box-1__txt-1"><?= $args['section_1_sm']['text_1'] ?></div>
		</div>
		<div class="pb-vsssf-box-1__wrap-2">
			<div class="pb-vsssf-box-1__txt-2"><?= $args['section_1_sm']['text_2'] ?></div>
			<div class="pb-vsssf-box-1__txt-3"><?= $args['section_1_sm']['text_3'] ?></div>
		</div>
	</div>

	<div class="pb-vsssf-box-2">
		<div class="pb-vsssf-box-2__wrap-1">
			<div class="pb-vsssf-box-2__txt-1"><?= $args['section_2_sm']['text_1'] ?></div>
		</div>
		<div class="pb-vsssf-box-2__wrap-2">
			<div class="pb-vsssf-box-2__bg-addon"></div>
			<div class="pb-vsssf-box-2__txt-2"><?= $args['section_2_sm']['text_2'] ?></div>
		</div>
		<div class="pb-vsssf-box-2__wrap-3">
			<div class="pb-vsssf-box-2__txt-3-circle"><h2>Selecting <br>Your Sperm</h2></div>
			<div class="pb-vsssf-box-2__wrap-3-bg-addon-1"></div>
			<div class="pb-vsssf-box-2__txt-3"><?= $args['section_2_sm']['text_3'] ?></div>
			<div class="pb-vsssf-box-2__wrap-3-bg-addon-2"></div>
		</div>
	</div>

	<div class="pb-vsssf-box-3">
		<div class="pb-vsssf-box-3__wrap-1">
			<div class="pb-vsssf-box-3__txt-1-1"><?= $args['section_3_sm']['text_1_header'] ?></div>
			<div class="pb-vsssf-box-3__txt-1-2"><?= $args['section_3_sm']['text_1_col_1'] ?></div>
			<div class="pb-vsssf-box-3__txt-1-3"><?= $args['section_3_sm']['text_1_col_2'] ?></div>
		</div>
		<div class="pb-vsssf-box-3__wrap-2">
			<div class="pb-vsssf-box-3__wrap-2-bg"></div>
			<div class="pb-vsssf-box-3__wrap-2-img"></div>
			<div class="pb-vsssf-box-3__txt-2-1"><?= $args['section_3_sm']['caption_1'] ?></div>
			<div class="pb-vsssf-box-3__txt-2-2"><?= $args['section_3_sm']['caption_2'] ?></div>
		</div>
		<div class="pb-vsssf-box-3__wrap-3">
			<div class="pb-vsssf-box-3__wrap-3-img"></div>
			<div class="pb-vsssf-box-3__wrap-3-bg"></div>
			<h2 class="pb-vsssf-box-3__txt-3-1"><?= $args['section_3_sm']['text_2_title'] ?></h2>
			<div class="pb-vsssf-box-3__txt-3-2"><?= $args['section_3_sm']['text_2_body'] ?></div>
		</div>
		<div class="pb-vsssf-box-3__wrap-4">
			<div class="pb-vsssf-box-3__wrap-4-bg-addon"></div>
			<h2 class="pb-vsssf-box-3__txt-4-1"><?= $args['section_3_sm']['text_3_title'] ?></h2>
			<div class="pb-vsssf-box-3__txt-4-2"><?= $args['section_3_sm']['text_3_body'] ?></div>
			<h2 class="pb-vsssf-box-3__txt-4-title"><?= $args['section_3_sm']['video_title'] ?></h2>
			<div class="pb-vsssf-box-3__txt-4-video">
				<?php if ($args['section_3']['video_type'] === 'embed') : ?>
					<div class="video-player embed-responsive embed-responsive-16by9">
						<?= $args['section_3']['video_embed'] ?>
					</div>
				<?php elseif ($args['section_3']['video_type'] === 'file') :
					$video_file_aspect_ratio = '0.5625';
					$video_file = $args['section_3']['video_file'];
					$video_file_poster = $args['section_3']['video_poster'];
					$video_file_poster_url = !empty($video_file_poster) ? $video_file_poster['url'] : ''; ?>
					<div class="video-player__file">
						<?= do_shortcode(
							"[flowplayer src='{$video_file['url']}'
										ratio='{$video_file_aspect_ratio}'
										poster='{$video_file_poster_url}'
										class='no-toggle fp-edgy' ]"
						) ?>
					</div>
				<?php endif; ?>
			</div>
			<h6 class="pb-vsssf-box-3__txt-4-subtitle"><?= $args['section_3_sm']['video_subtitle'] ?></h6>
		</div>
	</div>

	<div class="pb-vsssf-box-4">
		<div class="pb-vsssf-box-4__wrap-1">
			<div class="pb-vsssf-box-4__bg"></div>
			<div class="pb-vsssf-box-4__txt">
				<div class="clearfix"><?= $args['section_4_sm']['text_1'] ?></div>
				<div style="text-align: right">
					<a href="#id-hss-sf-end" class="vss-v-link-dark"></a>
				</div>
			</div>
		</div>
	</div>

</section>
<section id="id-hss-sf-end" style="margin-top: 60px"></section>
