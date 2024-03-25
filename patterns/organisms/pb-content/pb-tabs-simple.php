<?php
/**
 * Tabs Simple
 */
$args = wp_parse_args($args, [
	'tabs' => [],
	'hide_this_section' => false,
]);

if (!empty($args['tabs']) && empty($args['hide_this_section'])) : ?>

	<div class="container clearfix">
		<!--		<div class="row">-->
		<div class="box-sm-12">
			<div class="pb-to"
				 data-s-tab>

				<div style="text-align: center">
					<select class="pb-to__tabs-dd"
							data-s-tab-dd data-js-sel>
						<?php $tabsListN = 0;
						foreach ($args['tabs'] as $id => $tab) :
							$tabId = sanitize_title($tab['header']) . '-stab-' . $id; ?>
							<option <?= ($tabsListN === 0) ? ' selected ' : '' ?>
								value="<?= $tabId ?>">
								<?= $tab['header'] ?>
							</option>
							<?php $tabsListN++;
						endforeach; ?>
					</select>
				</div>

				<ul class="pb-to__tabs-header">
					<?php $tabsListN = 0;
					foreach ($args['tabs'] as $id => $tab) :
						$tabId = sanitize_title($tab['header']) . '-stab-' . $id; ?>
						<li class="pb-to__tab-header <?= ($tabsListN === 0) ? 'active' : '' ?>"
							data-s-tab-target="<?= $tabId ?>">
							<?= $tab['header'] ?>
						</li>
						<?php $tabsListN++;
					endforeach; ?>
				</ul>

				<div class="pb-to__tabs">
					<?php $tabsListN = 0;
					foreach ($args['tabs'] as $id => $tab) :
						$tabId = sanitize_title($tab['header']) . '-stab-' . $id; ?>
						<div class="pb-to__tab <?= ($tabsListN === 0) ? 'active' : '' ?>"
							 data-s-tab-id="<?= $tabId ?>">
							<div class="pb-to__tab-box">
								<div class="the-content space-p-top-25">
									<?= do_shortcode($tab['content']) ?>
								</div>
							</div>
						</div>
						<?php $tabsListN++;
					endforeach; ?>
				</div>
			</div>
			<!--			</div>-->
		</div>
	</div>
<?php endif;

