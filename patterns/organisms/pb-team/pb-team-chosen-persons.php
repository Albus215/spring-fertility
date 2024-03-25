<?php
/**
 * Team Chosen Persons
 */
$args = wp_parse_args($args, [
	'description' => '',
	'persons'     => [],
]);
$persons = $args['persons'];
$description = $args['description'];

if (!empty($persons)) : ?>
	<section class="pb-tcp">
		<?php if (!empty($description)) : ?>
			<div class="pb-tcp__description">
				<div class="container clearfix">
					<div class="row">
						<div class="col-sm-12">
							<?= do_shortcode($description) ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="pb-tcp__person-wrap">
			<div class="pb-tcp__person-container container clearfix">
				<div class="pb-tcp__person-row row">
					<?php foreach ($persons as $person) : ?>
						<div class="pb-tcp__person-col col-sm-4">
							<div class="pb-tcp__person">
								<div class="pb-tcp__person-img"
									 style="background-image: url(<?= $person['photo']['url'] ?>)"></div>
								<div class="pb-tcp__person-name"><?= $person['title']['name'] ?></div>
								<div class="pb-tcp__person-position"><?= $person['title']['position'] ?></div>
								<?php if (!empty($person['link']['url'])) : ?>
									<div class="pb-tcp__person-link-box">
										<a class="pb-tcp__person-link"
										   href="<?= $person['link']['url'] ?>"
										   target="<?= $person['link']['new_tab'] ? '_blank' : '' ?>">
											<?= $person['link']['title'] ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<style>
		.pb-tcp {
		}

		.pb-tcp__description {
			width: 100%;
			padding: 60px 0 60px 0;
			background: #01a9dc;
		}

		.pb-tcp__description * {
			color: #fff !important;
		}

		.pb-tcp__person-wrap {
			display: block;
			width: 100%;
			position: relative;
			margin-top: -2px;
			padding-bottom: 60px;
		}

		.pb-tcp__person-wrap::before {
			content: "";
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 130px;
			background: #01a9dc;
		}

		.pb-tcp__person-row {
			display: flex;
			flex-flow: row wrap;
			width: 100%;
		}

		.pb-tcp__person-col {
			position: relative;
			z-index: 10;
			text-align: center;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.pb-tcp__person {
			text-align: center;
		}

		.pb-tcp__person-img {
			display: inline-block;
			width: 230px;
			height: 230px;
			border-radius: 50%;
			border: 12px solid #093249;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			background-color: #fff;
		}

		.pb-tcp__person-name {
			padding: 10px 0 0 0;
			font-size: 20px;
			line-height: 1;
			font-weight: bold;
			color: #093249;
		}

		.pb-tcp__person-position {
			line-height: 1;
			padding: 5px 0 0 0;
		}

		.pb-tcp__person-link-box {
			padding: 10px 0 0 0;
		}

		.pb-tcp__person-link {
			background: #fff;
			border: 2px solid #03425c;
			border-radius: 4px;
			color: #03425c;
			display: inline-block;
			font-size: 12px;
			font-weight: 700;
			line-height: 1;
			padding: 8px 12px;
			text-transform: uppercase;
			-webkit-transition: .25s;
			transition: .25s;
		}

		.pb-tcp__person-link:hover {
			background: #03425c;
			color: #fff;
			text-decoration: none;
		}

		@media (max-width: 768px) {
			.pb-tcp__person-col {
				width: 100%;
			}
		}
	</style>
<?php endif;
