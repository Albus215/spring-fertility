<?php

/**
 * Images block
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
	'image_repeater'  => [],
]);
if (!empty($args['image_repeater'])) : ?>
	<section class="images-section container">
		<?php foreach ($args['image_repeater'] as $item) : ?>
			<div class="images-section__item">
				<img class="images-section__item-img" style="transform: rotate(<?= $item['image_rotate']; ?>deg) translateY(<?= $item['image_position']['x_coord']; ?>%) translateX(<?= $item['image_position']['y_coord']; ?>%);" src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['alt']; ?>">
				<?php if ($item['icon']) : ?>
					<img class="images-section__item-icon" style="left:<?= $item['icon_position']['left']; ?>px;right:<?= $item['icon_position']['right']; ?>px;top:<?= $item['icon_position']['top']; ?>px;bottom:<?= $item['icon_position']['bottom']; ?>px;" src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['alt']; ?>">
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</section>
<?php endif; ?>