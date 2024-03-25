<?php

/**
 * Reviews slider
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
	'repeater' => [],
]); ?>
<section class="reviews-slider container">
	<div class="swiper-container reviews-slider__swiper">
		<div class="reviews-slider__inner swiper-wrapper">
			<?php foreach ($args['repeater'] as $item) : ?>
				<?php if ($item['text_or_video'] === 'text') : ?>
					<div class="reviews-slider__item swiper-slide"><?= wp_kses_post($item['text']); ?></div>
					<?php elseif ($item['text_or_video'] === 'video') : ?>
					<div class="reviews-slider__item quotes-off swiper-slide"><iframe src="<?= esc_url($item['video']); ?>" style="width:100%;min-height:250px;margin:0 auto" height="240" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>
				<?php endif; ?>

			<?php endforeach; ?>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
</section>