<?php
/**
 * Section Break Container
 */
$args = wp_parse_args($args, [
	'image' => [],
	'content' => '',
	'direction' => 1,
]);

?>
<section class="o-sbc">
	<div class="o-sbc__row">
		<?php if ($args['direction'] === 1) : ?>
			<div class="col-md-6 o-sbc__col o-sbc__col-img o-sbc__col-img-left">
				<div class="o-sbc__wrap-img">
					<img src="<?php echo $args['image']['url']; ?>"
						 alt="<?php echo $args['image']['alt']; ?>">
				</div>
			</div>
			<div class="col-md-6 o-sbc__col o-sbc__col-txt o-sbc__col-txt-right">
				<div class="o-sbc__wrap-txt">
					<?php echo do_shortcode($args['content']); ?>
				</div>
			</div>
		<?php else : ?>
			<div class="col-md-6 o-sbc__col o-sbc__col-txt o-sbc__col-txt-left">
				<div class="o-sbc__wrap-txt">
					<?php echo do_shortcode($args['content']); ?>
				</div>
			</div>
			<div class="col-md-6 o-sbc__col o-sbc__col-img o-sbc__col-img-right">
				<div class="o-sbc__wrap-img">
					<img src="<?php echo $args['image']['url']; ?>"
						 alt="<?php echo $args['image']['alt']; ?>">
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

