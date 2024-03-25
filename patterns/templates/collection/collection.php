<?php
use Lean\Load;

$args = wp_parse_args( $args, [
	'post_id' => 0,
]);

if ( 0 >= $args['post_id'] ) {
	return;
}
?>

<section class='collection-template'>
	<div class='o__collection-detail' data-collection-detail>
	<?php
		Load::organism( 'collection-detail/collection-detail', [
			'post_id' => $args['post_id'],
		]);
	?>
	</div>
</section>
