<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'items' => '',
	'team_title' => '',
	'team_subtitle' => '',
]);

$toPagePost = get_posts([
	'numberposts' => 1,
	'post_type' => 'page',
	'post_status' => 'publish',
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-templates/team-overview.php',
])[0];
?>

<div class="container">
	<div class="row inside-page-team">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<h2><?php echo esc_html($args['team_title']); ?></h2>
			<h4><?php echo esc_html($args['team_subtitle']); ?></h4>
			<?php Load::organisms('team/list', [
				'members' => $args['items'],
				'split_by' => 2,
			]); ?>
			<?php if (!empty($toPagePost)) : ?>
				<div style="margin-top: 25px; margin-bottom: 25px" class="clearfix">
					<a href="<?= get_permalink($toPagePost->ID) ?>" class="btn-blue-outline">
						Meet the team
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
