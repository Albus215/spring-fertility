<?php
$args = wp_parse_args($args, [
	'background' => '',
	'title' => '',
	'text' => '',
	'label' => '',
	'url' => '',
	'fineprint' => '',
]);
$bk_color = $args['background'];

?>

<div class="container-fluid <?php echo esc_html($bk_color); ?>">
	<div class="home-singlecta row">
		<div class="col-lg-12">
			<h2><?php echo $args['title']; ?></h2>
			<p><?php echo $args['text']; ?></p>
			<div>
				<a class="btn" href="<?php echo esc_url($args['url']); ?>"><?php echo esc_html($args['label']); ?></a>
			</div>
		</div>
	</div>
	<?php if ($args['fineprint']) : ?>
		<p style="text-align:center;font-size:.8em;margin-top:55px;margin-bottom:0px;"><?php echo esc_html($args['fineprint']) ?></p>
	<?php endif; ?>
</div>
