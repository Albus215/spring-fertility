<?php
$args = wp_parse_args($args, [
	'title'               => '',
	'subtitle'            => '',
	'process_step_1'      => '',
	'process_step_2'      => '',
	'process_step_3'      => '',
	'process_step_4'      => '',
	'process_step_5'      => '',
	'process_step_6'      => '',
	'statistics_number_1' => '',
	'statistics_number_2' => '',
	'statistics_number_3' => '',
	'statistics_number_4' => '',
	'statistics_title_1'  => '',
	'statistics_title_2'  => '',
	'statistics_title_3'  => '',
	'statistics_title_4'  => '',
]);

?>
<div class="pb-opti">
	<div class="container clearfix">
		<div class="pb-opti__box">
			<h2 class="pb-opti__title"><?= $args['title'] ?></h2>
			<div class="pb-opti__process">
				<?php for ($i = 1; $i <= 6; $i++) : ?>
					<h5 class="pb-opti__process-item">
						<?= $args['process_step_' . $i] ?>
					</h5>
				<?php endfor; ?>
			</div>
			<div class="pb-opti__stats">
				<?php for ($i = 1; $i <= 4; $i++) : ?>
					<div class="pb-opti__stats-item">
						<h4 class="pb-opti__stats-number"><?= $args['statistics_number_' . $i] ?></h4>
						<p class="pb-opti__stats-title"><?= $args['statistics_title_' . $i] ?></p>
					</div>
				<?php endfor; ?>
			</div>
			<p class="pb-opti__subtitle"><?= $args['subtitle'] ?></p>
		</div>
	</div>
</div>
