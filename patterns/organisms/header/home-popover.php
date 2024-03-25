<?php
/**
 * Home Popover
 */
$homePopover = get_field('home_popover', 'spring_settings');

if (is_front_page() && !empty($homePopover['show'])) : ?>
	<section class="home-popover">
		<div class="home-popover__bg"
			 data-home-popover-close></div>
		<div class="home-popover__box">
			<div class="home-popover__x"
				 data-home-popover-close></div>
			<div class="home-popover__txt">
				<?= do_shortcode($homePopover['text']); ?>
			</div>
		</div>
	</section>
<?php endif;
