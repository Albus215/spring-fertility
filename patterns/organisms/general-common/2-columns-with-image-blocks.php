<?php
$args = wp_parse_args($args, [
	'column_1_header' => '',
	'column_2_header' => '',
	'column_1_image_blocks' => [],
	'column_2_image_blocks' => [],
]); ?>

<div class="container clearfix">
	<div class="row">
		<?php for ($col = 1; $col <= 2; $col++) :
			$header = $args["column_{$col}_header"];
			$image_blocks = $args["column_{$col}_image_blocks"]; ?>
			<div class="col-sm-6">
				<div class="clearfix">
					<h3><b><?= $header ?></b></h3>
					<?php foreach ($image_blocks as $image_block) : ?>
						<div class="ibic">
							<div class="ibic__img" style="background-image: url(<?= $image_block['image'] ?>)"></div>
							<div class="ibic__content">
								<div class="ibic__title">
									<?= $image_block['title'] ?>
								</div>
								<div class="ibic__description">
									<?= $image_block['description'] ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</div>
