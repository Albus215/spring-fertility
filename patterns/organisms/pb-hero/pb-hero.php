<?php

/**
 * Hero Section
 */

$args = wp_parse_args($args, [
	'style'                      => 'v1',
	'block_bg' 				     => [],
	'v5_use_alternative_styling' => false,
	'text'                       => '',
	'image_links'                => [],
	'images'                     => [],
	'text_background'            => [],
	'hero_background'            => [],
	'block_description'          => [],
	'block_hints'                => [],
	'right_image'                => [],
	'tabs_with_links'            => [],
]);

if ($args['style'] === 'v1') : // v1 --------------------------------------------------------------------------------
	?>
	<div class="pb__hero-header">
		<div class="pb__hero-header-container">
			<div class="pb__hero-header-left"
				 style="<?= !empty($args['text_background']) ? ('background: transparent url(' . $args['text_background']['url'] . ') no-repeat left center; background-size: cover;') : '' ?>">
				<div class="pb__hero-header-text">
					<?= do_shortcode($args['text']) ?>
				</div>
				<div class="hidden-sm hidden-xs pb__hero-header-addon"></div>
			</div>
			<div class="pb__hero-header-right">
				<? foreach ($args['image_links'] as $item) : ?>
					<div class="pb__hero-header-card"
						 style='background-image: url("<?= spring_tmb_acf($item['image'], 'thumbnail', 'large') ?>")'>
						<div class="pb__hero-header-card-box">
							<a href="<?= $item['link']['url'] ?>">
								<div class="pb__hero-header-link">
									<h3><?= $item['link']['title'] ?></h3>
									<div class="pb__hero-header-arrow"></div>
								</div>
							</a>
							<h6 class="pb__hero-header-card-subtitle"><?= $item['subtitle'] ?></h6>
						</div>
					</div>
				<? endforeach; ?>
			</div>
			<div class="visible-xs visible-sm pb__hero-header-addon"></div>
		</div>
	</div>
<?php elseif ($args['style'] === 'v2') : // v2 ----------------------------------------------------------------------
	?>
	<div class="pb-hero-v2">
		<div class="pb-hero-v2__txt">
			<div class="pb-hero-v2__txt-box clearfix">
				<?= do_shortcode($args['text']) ?>
			</div>
			<div class="pb-hero-v2__addon"></div>
		</div>
		<div class="pb-hero-v2__imgs">
			<div class="pb-hero-v2__img"
				 style="background-image: url(<?= spring_tmb_acf($args['images']['image_1'], 'thumbnail', 'large') ?>)"></div>
			<div class="pb-hero-v2__img"
				 style="background-image: url(<?= spring_tmb_acf($args['images']['image_2'], 'thumbnail', 'large') ?>)"></div>
		</div>
	</div>
<?php elseif ($args['style'] === 'v3') : // v3 ----------------------------------------------------------------------
	?>
	<div class="pb-hero-v3">
		<div class="pb-hero-v3__txt" <?php if($args['block_bg']) : ?> style="background-color:<?= $args['block_bg']; ?>"<?php endif; ?>>
			<div class="pb-hero-v3__txt-box clearfix">
				<?= do_shortcode($args['text']) ?>
			</div>
		</div>
		<div class="pb-hero-v3__img"
			 style="background-image: url(<?= spring_tmb_acf($args['images']['image_1'], 'thumbnail', 'large') ?>)">
		</div>
		<div class="pb-hero-v3__addon" data-paroller-factor="-0.15" data-paroller-type="foreground"
			 data-paroller-direction="vertical"></div>
	</div>
<?php elseif ($args['style'] === 'v4') : // v4 ----------------------------------------------------------------------
	?>
	<div class="pb-hero-v4">
		<div class="pb-hero-v4__txt" <?php if($args['block_bg']) : ?> style="background-color:<?= $args['block_bg']; ?>"<?php endif; ?>>
			<div class="pb-hero-v4__txt-box clearfix">
				<?= do_shortcode($args['text']) ?>
				<a class="pb-hero-v4__scroll-down" href="#id-main-content"></a>
			</div>
		</div>
		<div class="pb-hero-v4__img"
			 style="background-image: url(<?= spring_tmb_acf($args['images']['image_1'], 'thumbnail', 'large') ?>)">
		</div>
		<div class="pb-hero-v4__addon" data-paroller-factor="-0.15" data-paroller-type="foreground"
			 data-paroller-direction="vertical"></div>
	</div>
	<div id="id-main-content"></div>
<?php elseif ($args['style'] === 'v5') : // v5 ---------------------------------------------------------------------- ?>
	<div class="pb-hero-v5 <?= !empty($args['v5_use_alternative_styling']) ? 'pb-hero-v5__alt' : '' ?>"
		 style="<?= !empty($args['hero_background']) ? ('background: transparent url(' . $args['hero_background'] . ') no-repeat right center; background-size: 100% 100%;') : '' ?>">
		<div class="pb-hero-v5__txt">
			<div class="pb-hero-v5__txt-box clearfix">
				<?= do_shortcode($args['text']) ?>
			</div>
		</div>

		<div class="pb-hero-v5__block">
			<div class="pb-hero-v5__block-top-hint">
				<h3><?= $args['block_hints']['top_hint'] ?></h3>
			</div>
			<div class="pb-hero-v5__block-list">
				<?php foreach ($args['block_description'] as $item) : ?>
					<h2><?= $item['title']; ?></h2>
					<ul>
						<?php foreach ($item['list'] as $list_item) : ?>
							<li>
								<h4><?= $list_item['item']; ?></h4>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endforeach; ?>
			</div>
			<div class="pb-hero-v5__block-bottom-hint">
				<h5><?= $args['block_hints']['bottom_hint'] ?></h5>
			</div>
			<div class="pb-hero-v5__block-img">
				<img src="<?= $args['right_image']['url']; ?>" alt="<?= $args['right_image']['title']; ?>">
			</div>
		</div>
		<div class="pb-hero-v5__addon" data-paroller-factor="-0.15" data-paroller-type="foreground"
			 data-paroller-direction="vertical"></div>
	</div>

	<?php if (!empty($args['v5_use_alternative_styling'])) : ?>
		<style>
			@media (min-width: 992px) {
				.pb-hero-v5__alt .pb-hero-v5__txt,
				.pb-hero-v5__alt .pb-hero-v5__block {
					width: 50%;
					max-width: 600px;
				}

				.pb-hero-v5__alt .pb-hero-v5__txt {
					margin: auto 0 auto auto;
					padding: 16px;
				}

				.pb-hero-v5__alt .pb-hero-v5__block {
					margin: auto auto auto 0;
				}
			}

			.pb-hero-v5__alt .pb-hero-v5__block-img,
			.pb-hero-v5__alt .pb-hero-v5__block-bottom-hint,
			.pb-hero-v5__alt .pb-hero-v5__block-top-hint {
				display: none !important;
			}
		</style>
	<?php endif; ?>
<?php elseif ($args['style'] === 'v6') : // v5 ----------------------------------------------------------------------
	?>
	<div class="pb-hero-v6"
		 style="<?= !empty($args['hero_background']) ? ('background: transparent url(' . $args['hero_background'] . ') no-repeat right center; background-size: 100% 100%;') : '' ?>">
		<div class="pb-hero-v6__txt">
			<div class="pb-hero-v6__txt-box clearfix">
				<?= do_shortcode($args['text']) ?>
			</div>
		</div>
		<?php if (!empty($args['tabs_with_links'])) :
			$tabsQty = count($args['tabs_with_links']);
			$tabsWrapClass = '';
			if ($tabsQty % 4 === 0) $tabsWrapClass .= ' pb-hero-v6__block-qty-4ir';
			elseif ($tabsQty % 3 === 0) $tabsWrapClass .= ' pb-hero-v6__block-qty-3ir';
			?>
			<div class="pb-hero-v6__block <?= $tabsWrapClass ?>">
				<?php foreach ($args['tabs_with_links'] as $tabs) : ?>
					<a href="<?= $tabs['tab_link']['url'] ?>">
						<div class="pb-hero-v6__block-item">
							<div class="pb-hero-v6__block-img">
								<img src="<?= $tabs['image_bg']['url'] ?>" alt="<?= $tabs['image_bg']['name']; ?>">
							</div>
							<div class="pb-hero__block-desc">
								<?= wp_kses_post($tabs['tab_name']); ?>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="pb-hero-v5__addon" data-paroller-factor="-0.15" data-paroller-type="foreground"
			 data-paroller-direction="vertical"></div>
	</div>
	<div id="id-main-content"></div>
<?php endif; ?>
