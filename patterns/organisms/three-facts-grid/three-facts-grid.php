<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'title' => '',
	'rows' => [],
	'general' => '',
]);

$is_general = ($args['general'] ? '__gen' : '');

?>

<div class="o__three-facts-grid container-fluid">
	<div class="row">
		<h3 class="o__three-facts-grid-intro"><?php echo esc_html($args['title']); ?></h3>
		<div class="o__three-facts-wrapper">
			<?php foreach ($args['rows'] as $row) : ?>
				<article class="o__three-facts-col col-md-4">

					<?php if ($row['facts_number']) : ?>
						<p class="o__three-facts-number">
							<?php echo esc_html($row['facts_number']); ?>
						</p>
					<?php endif; ?>

					<?php if ($row['facts_intro']) : ?>
						<div class="o__three-facts-text o__three-facts-intro">
							<?php echo wp_kses_post($row['facts_intro']); ?>
						</div>
					<?php endif; ?>

					<img src="<?php echo esc_url($row['facts_image']); ?>"
						 alt="#"
						 class="o__three-facts-img<?php echo esc_attr($is_general); ?>">

					<?php if ($row['facts_title']) : ?>
						<h4 class="o__three-facts-title">
							<?php echo esc_html($row['facts_title']); ?>
						</h4>
					<?php endif; ?>

					<div class="o__three-facts-text">
						<?php echo wp_kses_post($row['facts_text']); ?>
					</div>

				</article>
			<?php endforeach; ?>
		</div>
	</div>
</div>
