<?php
/**
 * EggCalculator Block
 */

$args = wp_parse_args($args, [
	'title' => 'Egg Calculator',
	'subtitle' => 'Whether you have a timeline or just want to know your options, we can help. Enter your information below to see your pregnancy probability.',
	'mobile_view_width' => false,
]);

$title = $args['title'];
$subtitle = $args['subtitle'];
$mobile_view_width_class = $args['mobile_view_width'] ? 'egg-calc__mobile-width' : '';

?>

<div class="egg-calc <?= $mobile_view_width_class ?> clearfix">
	<div class="egg-calc__form">
		<form data-calc-role="form">
			<div class="egg-calc__wrap">
				<div class="egg-calc__col-full">
					<div class="egg-calc__title">
						<?= $title ?>
					</div>
					<div class="egg-calc__subtitle">
						<?= $subtitle ?>
					</div>
				</div>
				<div class="egg-calc__col-full">
					<div class="egg-calc__col-half">
						<select class="egg-calc__form-sel" name="calc_eggs-qty">
							<option value="1">1 Frozen Egg</option>
							<?php for ($i = 2; $i <= 100; $i++) : ?>
								<option <?= $i === 10 ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?> Frozen Eggs
								</option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="egg-calc__col-half">
						<select class="egg-calc__form-sel" name="calc_age">
							<option value="34">< 35 Years Old</option>
							<option selected value="35">35-37 Years Old</option>
							<option value="38">38-39 Years Old</option>
							<option value="40">40 Years Old</option>
							<option value="41">> 41 Years Old</option>
						</select>
					</div>
					<div class="egg-calc__col-half">
						<select class="egg-calc__form-sel" name="calc_prior-pregnancy">
							<option selected value="">Prior Pregnancy?</option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
					<div class="egg-calc__col-half">
						<button class="egg-calc__form-btn" type="submit">
							Calculate >
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="egg-calc__result">
		<div class="egg-calc__result-title">
			Pregnancy Probabilities:
		</div>
		<div class="egg-calc__result-content">
			<div class="egg-calc__result-success">
				<div class="egg-calc__result-main">
					<div class="egg-calc__wrap">
						<div class="egg-calc__col-full">
							<div class="egg-calc__result-subtitle">
								CHANCE OF A CHILD:
							</div>
							<div data-calc-role="chance_live_birth" class="egg-calc__result-animation">

							</div>
						</div>
					</div>
				</div>
				<div class="egg-calc__wrap">
					<div class="egg-calc__col-third">
						<div class="egg-calc__result-subtitle">
							CHANCE OF <br>
							1 CHILD:
						</div>
						<div data-calc-role="chance_1_child" class="egg-calc__result-animation">

						</div>
					</div>
					<div class="egg-calc__col-third">
						<div class="egg-calc__result-subtitle">
							CHANCE OF <br>
							2 CHILDREN:
						</div>
						<div data-calc-role="chance_2_child" class="egg-calc__result-animation">

						</div>
					</div>
					<div class="egg-calc__col-third">
						<div class="egg-calc__result-subtitle">
							CHANCE OF <br>
							3+ CHILDREN:
						</div>
						<div data-calc-role="chance_3_child" class="egg-calc__result-animation">

						</div>
					</div>
				</div>
			</div>
			<div class="egg-calc__result-error egg-calc__wrap">
			</div>
		</div>
	</div>
	<div class="egg-calc__footer"></div>
</div>
