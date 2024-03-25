<?php
/**
 * Team Section
 */

use Spring\Modules\Team\Team;
use Lean\Load;

$teamList = Team::loadSortedByLocations([], '', false);
$teamListN = 0;

$cityTarget = !empty(trim((string)$_GET['location'])) ? sanitize_title($_GET['location']) : '';

if (!empty($teamList)) : ?>

	<div class="pb-to"
		 data-s-tab>



		<div class="pb-to__tabs-dd-team-wrap">
			<select class="pb-to__tabs-dd pb-to__tabs-dd-team"
					data-s-tab-dd
					data-js-sel>
				<?php $teamListN = 0;
				foreach ($teamList as $id => $team) : ?>
					<option <?= ((empty($cityTarget) && $teamListN === 0) || $cityTarget === $id) ? ' selected ' : '' ?>
						value="<?= $id ?>">
						<?= $team['title'] ?>
					</option>
					<?php $teamListN++;
				endforeach; ?>
			</select>
		</div>

		<ul class="pb-to__tabs-header">
			<?php $teamListN = 0;
			foreach ($teamList as $id => $team) : ?>
				<li class="pb-to__tab-header <?= ((empty($cityTarget) && $teamListN === 0) || $cityTarget === $id) ? 'active' : '' ?>"
					data-s-tab-target="<?= $id ?>">
					<?= $team['title'] ?>
				</li>
				<?php $teamListN++;
			endforeach; ?>
		</ul>

		<div class="pb-to__tabs">
			<?php $teamListN = 0;
			foreach ($teamList as $id => $team) : ?>
				<div
					class="pb-to__tab <?= ((empty($cityTarget) && $teamListN === 0) || $cityTarget === $id) ? 'active' : '' ?>"
					data-s-tab-id="<?= $id ?>">
					<h2 class="pb-to__tab-title"><?= $team['title'] ?></h2>
					<div class="pb-to__tab-box">
						<?php Load::organism('team/team-grid', [
							'members' => $team['members'],
							'title'   => __('Our Providers'),
						]); ?>
					</div>
				</div>
				<?php $teamListN++;
			endforeach; ?>
		</div>
	</div>

<?php endif;
