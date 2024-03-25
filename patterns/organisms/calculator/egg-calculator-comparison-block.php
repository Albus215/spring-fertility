<?php

$args = wp_parse_args($args, [
	'title'          => 'What are My chances?',
	'subtitle'       => '',
	'info'           => '',
	'compared_items' => [],
]);
$title = $args['title'];
$subtitle = $args['subtitle'];
$info = $args['info'];
$compared_items = $args['compared_items'];

$modalInfoPrefix = 'egg-calc-compare-info-';

?>

<div class="egg-calc egg-calc-compare egg-calc__mobile-width clearfix">
	<div class="egg-calc__form">
		<form data-calc-role="form-calc-comp">
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
					<div class="egg-calc__col-third egg-calc__col-third-sm">
						<select class="egg-calc__form-sel" name="calc_eggs-qty">
							<option value="1">1 Frozen Egg</option>
							<?php for ($i = 2; $i <= 100; $i++) : ?>
								<option <?= $i === 10 ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?>
									Frozen Eggs
								</option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="egg-calc__col-third egg-calc__col-third-sm">
						<select class="egg-calc__form-sel" name="calc_age">
							<option value="29">< 30 Years Old</option>
							<?php for ($i = 30; $i <= 42; $i++) : ?>
								<option <?= $i === 35 ? ' selected ' : '' ?> value="<?= $i ?>">
									<?= $i ?> Years Old
								</option>
							<?php endfor; ?>
							<option value="43">> 42 Years Old</option>
						</select>
						<span style="font-size: 11px; line-height: 1">
										*age at which eggs are frozen
									</span>
					</div>
					<div class="egg-calc__col-third egg-calc__col-third-sm">
						<input type="hidden" name="calc_prior-pregnancy" value="0">
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
			PROBABILITY
			<?php if (!empty($info)) : ?>
				<span class="egg-calc__infolink"
					  data-toggle="modal"
					  data-target="#<?= $modalInfoPrefix . 'main' ?>"></span>
			<?php endif; ?>
		</div>
		<div class="egg-calc__result-content">
			<div class="egg-calc__result-success">
				<div class="egg-calc__result-main">
					<div class="egg-calc__wrap">
						<div class="egg-calc__col-half">
							<div class="egg-calc__result-subtitle">
								AT LEAST 1 CHILD:
							</div>
							<div class="egg-calc__result-animation-box">
								<?php foreach ($compared_items as $compared_item_key => $compared_item) : ?>
									<div class="egg-calc__result-animation"
										 style="<?= !$compared_item['show_in_comparison_diagram'] ? 'opacity: 0' : '' ?>"
										 data-calc-show-comparison="<?= intval($compared_item['show_in_comparison_diagram']) ?>"
										 data-calc-item="<?= $compared_item_key ?>"
										 data-calc-role="item_chance_live_birth"
										 data-calc-dataset="<?= $compared_item['dataset'] ?>"
										 data-calc-color="<?= $compared_item['color'] ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="egg-calc__col-half">
							<div class="egg-calc__result-subtitle">
								2 OR MORE CHILDREN:
							</div>
							<div class="egg-calc__result-animation-box">
								<?php foreach ($compared_items as $compared_item_key => $compared_item) : ?>
									<div class="egg-calc__result-animation"
										 style="<?= !$compared_item['show_in_comparison_diagram'] ? 'opacity: 0' : '' ?>"
										 data-calc-show-comparison="<?= intval($compared_item['show_in_comparison_diagram']) ?>"
										 data-calc-item="<?= $compared_item_key ?>"
										 data-calc-role="item_chance_2plus_children"
										 data-calc-dataset="<?= $compared_item['dataset'] ?>"
										 data-calc-color="<?= $compared_item['color'] ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<?php foreach ($compared_items as $compared_item_key => $compared_item) : ?>
						<div class="egg-calc__result-item-title"
							 data-calc-txt-item="<?= $compared_item_key ?>"
							 style="background-color: <?= $compared_item['color'] ?>">
							<span class="egg-calc__infolink egg-calc__infolink-toggle"
								  aria-expanded="false"
								  data-toggle="collapse"
								  data-target="#<?= $modalInfoPrefix . 'visual-' . $compared_item_key ?>">
								<span class="egg-calc__infolink-toggle-open"></span>
								<span class="egg-calc__infolink-toggle-close"></span>
							</span>
							<?= $compared_item['title'] ?>
							<span class="egg-calc__result-item-subtitle">
								AT LEAST 1 CHILD: <span data-calc-txt-item-number-1></span>
								AT LEAST 2 CHILDREN: <span data-calc-txt-item-number-2></span>
											<?php if (!empty($compared_item['subtitle'])) : ?>
												<br><?= $compared_item['subtitle'] ?>
											<?php endif; ?>
							</span>
							<?php if (!empty($compared_item['info'])) : ?>
								<span class="egg-calc__infolink"
									  data-toggle="modal"
									  data-target="#<?= $modalInfoPrefix . $compared_item_key ?>"><span></span></span>
							<?php endif; ?>
						</div>

						<div class="collapse" id="<?= $modalInfoPrefix . 'visual-' . $compared_item_key ?>">
							<div class="egg-calc__wrap">
								<div class="egg-calc__col-half">
									<div class="egg-calc__result-subtitle">
										AT LEAST 1 CHILD:
									</div>
									<div class="egg-calc__result-animation-box">
										<div
											class="egg-calc__result-animation egg-calc__result-animation-info"
											data-calc-item="<?= $compared_item_key ?>"
											data-calc-role="info_item_chance_live_birth">
										</div>

									</div>
								</div>
								<div class="egg-calc__col-half">
									<div class="egg-calc__result-subtitle">
										2 OR MORE CHILDREN:
									</div>
									<div class="egg-calc__result-animation-box">
										<div
											class="egg-calc__result-animation egg-calc__result-animation-info"
											data-calc-item="<?= $compared_item_key ?>"
											data-calc-role="info_item_chance_2plus_children">
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="egg-calc__result-error egg-calc__wrap">
			</div>
		</div>
	</div>
	<!--	<div class="egg-calc__footer"></div>-->
</div>


<!--Egg Calc Modals section-->
<?php if (!empty($info)) : ?>
	<div class="modal fade" id="<?= $modalInfoPrefix . 'main' ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title"><strong>Result Info</strong></h4>
				</div>
				<div class="modal-body egg-calc__modal-info">
					<?php echo do_shortcode($info) ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php foreach ($compared_items as $compared_item_key => $compared_item) :
	if (!empty($compared_item['info'])) : ?>
		<div class="modal fade egg-calc-compare__info-modal" id="<?= $modalInfoPrefix . $compared_item_key ?>"
			 tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">
							<strong><?= !empty($compared_item['info_title']) ? $compared_item['info_title'] : $compared_item['title'] ?></strong>
						</h4>
					</div>
					<div class="modal-body egg-calc__modal-info">
						<?php echo do_shortcode($compared_item['info']) ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;
endforeach; ?>
