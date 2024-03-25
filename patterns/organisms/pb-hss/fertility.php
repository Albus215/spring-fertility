<?php
/**
 * Horiontal Scroll Section - Egg Freezing
 */

use Lean\Load;

if (wp_is_mobile()) :
	Load::organism('pb-hss/fertility-sm', $args);
else :
	$args = wp_parse_args($args, [
		'section_1' => [],
		'section_2' => [],
		'section_3' => [],
		'section_4' => [],
	]);
	?>
	<section class="pb-hss__section"
			 data-hs-section>
		<div class="pb-hss__box"
			 data-hs-section-box>
			<div class="pb-hss__content"
				 data-hs-section-content>
				<section class="pb-hss__content-wrap pb-hss-sf">

					<section class="pb-hss-sf__box-1">

						<div class="pb-hss-sf__box-1__bg-img"
							 style="background-image: url(<?= $args['section_1']['background']['url'] ?>)"></div>
						<div class="pb-hss-sf__box-1__bg-addon"></div>

						<div class="pb-hss-sf__box-1__txt-1">
							<div class="clearfix">
								<?= $args['section_1']['text_1'] ?>
							</div>
						</div>
						<div class="pb-hss-sf__box-1__txt-2">
							<div class="clearfix">
								<?= $args['section_1']['text_2'] ?>
							</div>
						</div>
						<div class="pb-hss-sf__box-1__txt-3">
							<div class="clearfix">
								<?= $args['section_1']['text_3'] ?>
							</div>
						</div>
					</section>

					<section class="pb-hss-sf__box-2">
						<div class="pb-hss-sf__box-2__bg-addon-1"></div>
						<div class="pb-hss-sf__box-2__bg-addon-2"></div>

						<div class="pb-hss-sf__box-2__txt-1">
							<div class="clearfix">
								<?= $args['section_2']['text_1'] ?>
							</div>
						</div>

						<div class="pb-hss-sf__box-2__txt-2">
							<div class="clearfix">
								<?= $args['section_2']['text_2'] ?>
							</div>
						</div>

						<div class="pb-hss-sf__box-2__txt-3">
							<div class="pb-hss-sf__box-2__txt-3-circle">
								<h2>Selecting <br>Your Sperm</h2>
							</div>
						</div>

						<div class="pb-hss-sf__box-2__txt-4">
							<div class="clearfix">
								<?= $args['section_2']['text_3'] ?>
							</div>
						</div>
					</section>

					<section class="pb-hss-sf__box-3">
						<div class="pb-hss-sf__box-3__bg-addon-1"></div>
						<div class="pb-hss-sf__box-3__bg-addon-2"></div>

						<div class="pb-hss-sf__box-3__txt-1">
							<div class="pb-hss-sf__box-3__txt-1-1">
								<div class="clearfix">
									<?= $args['section_3']['text_1_header'] ?>
								</div>
							</div>
							<div class="pb-hss-sf__box-3__txt-1-2">
								<div class="clearfix">
									<?= $args['section_3']['text_1_col_1'] ?>
								</div>
							</div>
							<div class="pb-hss-sf__box-3__txt-1-3">
								<div class="clearfix">
									<?= $args['section_3']['text_1_col_2'] ?>
								</div>
							</div>
						</div>

						<div class="pb-hss-sf__box-3__txt-2">
							<div class="pb-hss-sf__box-3__txt-2-img"></div>
							<p class="pb-hss-sf__box-3__txt-2-1"><?= $args['section_3']['caption_1'] ?></p>
							<p class="pb-hss-sf__box-3__txt-2-2"><?= $args['section_3']['caption_2'] ?></p>
							<h2 class="pb-hss-sf__box-3__txt-2-3"><?= $args['section_3']['text_2_title'] ?></h2>
						</div>

						<div class="pb-hss-sf__box-3__txt-3">
							<div class="pb-hss-sf__box-3__txt-3-img"></div>
							<div class="pb-hss-sf__box-3__txt-3-1">
								<?= $args['section_3']['text_2_body'] ?>
							</div>
						</div>

						<div class="pb-hss-sf__box-3__txt-4">
							<div class="pb-hss-sf__box-3__txt-4-title">
								<div class="clearfix">
									<h2><?= $args['section_3']['text_3_title'] ?></h2>
								</div>
							</div>
							<div class="pb-hss-sf__box-3__txt-4-body">
								<div class="clearfix">
									<?= $args['section_3']['text_3_body'] ?>
								</div>
							</div>
						</div>

						<div class="pb-hss-sf__box-3__txt-5">
							<div class="pb-hss-sf__box-3__txt-5-title">
								<div class="clearfix">
									<h2><?= $args['section_3']['video_title'] ?></h2>
								</div>
							</div>
							<div class="pb-hss-sf__box-3__txt-5-video">
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
							<div class="pb-hss-sf__box-3__txt-5-subtitle">
								<div class="clearfix">
									<h6>
										<?= $args['section_3']['video_subtitle'] ?>
									</h6>
								</div>
							</div>
							<div class="pb-hss-sf__box-3__txt-5-btn">
								<div class="clearfix text-right">
									<?php if (!empty($args['section_3']['video_button']['url'])) : ?>
										<a href="<?= $args['section_3']['video_button']['url'] ?>"
										   target="<?= $args['section_3']['video_button']['target'] ?>"
										   class="btn"><?= $args['section_3']['video_button']['title'] ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>

					<section class="pb-hss-sf__box-4">
						<div class="pb-hss-sf__box-4__bg-addon-1"></div>

						<div class="pb-hss-sf__box-4__txt-1">
							<div class="clearfix">
								<?= $args['section_4']['text_1'] ?>
							</div>
							<a href="#id-hss-sf-end" class="pb-hss-sf__box-4__txt-1-link"></a>
						</div>
					</section>


				</section>
			</div>
		</div>
	</section>
	<section id="id-hss-sf-end" style="margin-top: 60px"></section>
<?php endif;
