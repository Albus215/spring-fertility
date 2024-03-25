<?php
/**
 * Egg Calculator
 */
$args = wp_parse_args($args, [
	'use_demo_mode' => false,
	'button'        => [],
	'description'   => [],
]);

use Lean\Load;

$calculator_info = get_field('egg_calculator', 'spring_settings');


if (empty($args['use_demo_mode'])) : ?>
	<div class="container clearfix">
		<?php Load::organism('calculator/egg-calculator-comparison-block', $calculator_info); ?>
	</div>
<?php else : ?>
	<div class="pb-descr-i">
		<div class="container clearfix space-p-top-75 space-p-bottom-50">
			<div class="row space-p-top-75 space-p-sm-top-25">
				<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
					<?= do_shortcode($args['description']) ?>
				</div>
			</div>
		</div>
		<div class="container clearfix">
			<div class="pb-descr-i__demo">
				<?php Load::organism('calculator/egg-calculator-comparison-block', $calculator_info); ?>
				<div class="pb-descr-i__demo-layer">
					<div class="pb-descr-i__demo-layer-1"></div>
					<div class="pb-descr-i__demo-layer-2"></div>
				</div>
			</div>
		</div>
	</div>
	<?php if (!empty($args['button']['url'])) : ?>
		<div class="container clearfix space-p-top-50 space-p-bottom-50 space-p-sm-top-25 space-p-sm-bottom-25 text-center">
			<a class="btn-dark-blue-outline"
			   href="<?= $args['button']['url'] ?>"
			   target="<?= $args['button']['target'] ?>">
				<?= $args['button']['title'] ?>
			</a>
		</div>
	<?php endif; ?>
<?php endif;
