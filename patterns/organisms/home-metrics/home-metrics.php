<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'no-circle' => false,
	'animation' => 'animation',
	'background' => '',
	'title' => '',
	'items' => [],

]);
$bk_color = $args['background'];
$show_dataset_modal = $args['show_dataset_modal'];
$dataset_modal = $args['dataset_modal'];

?>

<section
	class="o__home-metrics container-fluid <?php echo esc_html($bk_color); ?> <?php echo esc_html($args['animation']); ?>">
	<h2 class="o__home-metrics__title"><?php echo esc_html($args['title']); ?></h2>
	<div class="row">

		<ul class="o__home-metrics__list col-xs-12 col-md-10 col-md-offset-1">
			<?php
			foreach ($args['items'] as $item) {
				Load::molecule('metric-item/metric-item', [
					'no-circle' => $args['no-circle'],
					'animation' => $args['animation'],
					'item' => $item,
				]);
			}
			?>
		</ul>
	</div>
	<?php if ($show_dataset_modal) : ?>
		<p class="text-center">
			<?= $dataset_modal['text'] ?>
		</p>
	<?php endif; ?>
</section>

<?php if ($show_dataset_modal) : ?>\
	<div class="modal fade" id="spring_dataset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span style="font-size: 32px" aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel"><strong><?= $dataset_modal['modal_header'] ?></strong></h4>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<?= do_shortcode($dataset_modal['modal_content']) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

