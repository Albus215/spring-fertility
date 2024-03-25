<?php
/**
 * Horiontal Scroll Section - Egg Freezing
 */
use Lean\Load;

if (wp_is_mobile()) :
	Load::organism('pb-hss/egg-freezing-sm', $args);
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
				<section class="pb-hss__content-wrap pb-hss-ef">

					<section class="pb-hss-ef__box-1">
						<div class="pb-hss-ef__box-1__bg-img"
							 style="background-image: url(<?= $args['section_1']['background']['url'] ?>)"></div>
						<div class="pb-hss-ef__box-1__bg-addon"></div>

						<div class="pb-hss-ef__box-1__txt-1">
							<div class="clearfix">
								<?= $args['section_1']['text_1'] ?>
							</div>
						</div>
						<div class="pb-hss-ef__box-1__txt-2">
							<div class="clearfix">
								<?= $args['section_1']['text_2'] ?>
							</div>
						</div>
						<div class="pb-hss-ef__box-1__txt-3">
							<div class="clearfix">
								<?= $args['section_1']['text_3'] ?>
							</div>
						</div>
					</section>

					<section class="pb-hss-ef__box-2">
						<div class="pb-hss-ef__box-2__bg-addon"></div>
						<div class="pb-hss-ef__box-2__img"></div>

						<div class="pb-hss-ef__box-2__txt-1">
							<div class="clearfix">
								<?= $args['section_2']['text_1'] ?>
							</div>
						</div>

						<div class="pb-hss-ef__box-2__txt-2">
							<div class="clearfix">
								<?= $args['section_2']['text_2'] ?>
							</div>
						</div>
					</section>

					<section class="pb-hss-ef__box-3">
						<div class="pb-hss-ef__box-3__bg-addon"></div>

						<div class="pb-hss-ef__box-3__txt-1">
							<div class="pb-hss-ef__box-3__txt-1-title">
								<div class="clearfix">
									<?= $args['section_3']['text_1_title'] ?>
								</div>
							</div>
							<div class="pb-hss-ef__box-3__txt-1-body">
								<div class="pb-hss-ef__box-3__txt-1-img"></div>
								<div class="clearfix">
									<?= $args['section_3']['text_1_body'] ?>
								</div>
							</div>
						</div>
					</section>

					<section class="pb-hss-ef__box-4">
						<div class="pb-hss-ef__box-4__bg-img"></div>

						<div class="pb-hss-ef__box-4__txt-1">
							<div class="clearfix">
								<?= $args['section_4']['text_1'] ?>
							</div>
						</div>

						<!--					<div class="pb-hss-ef__box-4__txt-2">-->
						<!--						<span>Why</span>&nbsp;<span>Now?</span>-->
						<!--					</div>-->
					</section>

				</section>
			</div>
		</div>
	</section>
<?php endif;
