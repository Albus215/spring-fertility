<?php
/**
 * Horiontal Scroll Section - Egg Freezing
 */

use Lean\Load;

$args = wp_parse_args($args, [
	'section_1_sm' => [],
	'section_2_sm' => [],
	'section_3_sm' => [],
	'section_4_sm' => [],
]);

?>
<section class="pb-vssef">

	<div class="pb-vssef-box-1">
		<div class="pb-vssef-box-1__wrap-1">
			<div class="pb-vssef-box-1__bg"
				 style="background-image: url(<?= $args['section_1_sm']['background']['url'] ?>)"></div>
			<div class="pb-vssef-box-1__bg-addon"></div>
			<div class="pb-vssef-box-1__txt-1"><?= $args['section_1_sm']['text_1'] ?></div>
			<div class="pb-vssef-box-1__txt-2"><?= $args['section_1_sm']['text_2'] ?></div>
		</div>
		<div class="pb-vssef-box-1__wrap-2">
			<div class="pb-vssef-box-1__txt-3"><?= $args['section_1_sm']['text_3'] ?></div>
		</div>
	</div>

	<div class="pb-vssef-box-2">
		<div class="pb-vssef-box-2__wrap-1">
			<div class="pb-vssef-box-2__txt-1"><?= $args['section_2_sm']['text_1'] ?></div>
		</div>
		<div class="pb-vssef-box-2__wrap-2">
			<div class="pb-vssef-box-2__bg-addon"></div>
			<div class="pb-vssef-box-2__txt-2"><?= $args['section_2_sm']['text_2'] ?></div>
			<div class="pb-vssef-box-2__img"></div>
		</div>
	</div>

	<div class="pb-vssef-box-3">
		<div class="pb-vssef-box-3__wrap-1">
			<div class="pb-vssef-box-3__title"><?= $args['section_3_sm']['text_1_title'] ?></div>
			<div class="pb-vssef-box-3__img"></div>
			<div class="pb-vssef-box-3__body"><?= $args['section_3_sm']['text_1_body'] ?></div>
			<div class="pb-vssef-box-3__bg-addon"></div>
		</div>
	</div>

	<div class="pb-vssef-box-4">
		<div class="pb-vssef-box-4__wrap">
			<div class="pb-vssef-box-4__bg"></div>
			<div class="pb-vssef-box-4__txt"><?= $args['section_4_sm']['text_1'] ?></div>
		</div>
	</div>

</section>
