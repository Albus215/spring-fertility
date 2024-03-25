<?php
/**
 * CTA With Background
 */
$args = wp_parse_args($args, [
	'background_image' => '',
	'content' => '',
	'button' => [],
	'bottom_text' => '',
]);

$ctaBgImg = !empty($args['background_image']) ?
	(' style="background-image: url(' . $args['background_image']['url'] . ');" ') :
	'';
$content = $args['content'];
$btn = $args['button'];
$bottomTxt = $args['bottom_text'];

if (!empty($content) || !empty($btn)) : ?>
	<div class="o__ctawbg" <?= $ctaBgImg ?> >
		<div class="o__ctawbg-box container">
			<?php if (!empty($content)) : ?>
				<div class="o__ctawbg-content text-center">
					<?= do_shortcode($content) ?>
				</div>
			<?php endif; ?>
			<?php if (!empty($btn)) : ?>
				<div class="o__ctawbg-btn text-center">
					<a class="btn" href="<?= $btn['url'] ?>" target="<?= $btn['target'] ?>"><?= $btn['title'] ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if (!empty($bottomTxt)) : ?>
		<div class="o__ctawbg-bottom container">
			<p class="text-center">
				<?= $bottomTxt ?>
			</p>
		</div>
	<?php endif; ?>
<?php endif;
