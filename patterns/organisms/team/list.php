<?php
/**
 * List team members
 */

$args = wp_parse_args($args, [
	'members'  => [],
	'split_by' => 3,
]);
$splitBy = $args['split_by'] === 2 ? 2 : 3;
$colSize = 12 / $splitBy;

if (!empty($args['members'])) :
	$arrayMembers = array_chunk($args['members'], $splitBy);
	$arrayMembersCount = count($arrayMembers); ?>

	<div class="clearfix to-members">
		<?php for ($tm_i = 0; $tm_i < $arrayMembersCount; $tm_i++) : ?>
			<div class="row to-members__row">
				<?php foreach ($arrayMembers[$tm_i] as $member) :
					/** @var $member WP_Post */
					$memberFields = get_fields($member->ID);
					$memberLinks = '';
					$memberLinksArray = [];
					if (!empty($memberFields['links'])) {
						foreach ($memberFields['links'] as $linkItem) {
							$memberLinksArray[] = '<a href="' . $linkItem['link']['url'] . '" ' .
								'target="' . $linkItem['link']['target'] . '">' . $linkItem['link']['title'] . '</a>';
						}
						$memberLinks = implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $memberLinksArray);
					}
					?>

					<div class="col-sm-<?= $colSize ?> to-members__col">
						<?= ($memberFields['team_isfeatured']) ?
							'<a href="' . get_permalink($member->ID) . '" class="to-members__wrap">' :
							'<div class="to-members__wrap">' ?>

						<div class="to-members__photo"
							 style="background-image: url(<?= $memberFields['team_photo'] ?>)">
						</div>
						<div class="to-members__name"><?= $memberFields['team_name'] ?></div>
						<div class="to-members__position"><?= $memberFields['team_specialty'] ?></div>

						<?= ($memberFields['team_isfeatured']) ? '</a>' : '</div>' ?>
						<?php if (!empty($memberLinks)) : ?>
							<div class="to-members__links"><?= $memberLinks ?></div>
						<?php endif; ?>
					</div>

				<?php endforeach; ?>
			</div>
		<?php endfor; ?>
	</div>

<?php endif;
