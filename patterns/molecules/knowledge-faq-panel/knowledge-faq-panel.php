<?php
use Lean\Load;

$args = wp_parse_args( $args, [
	'heading' => '',
	'data-parent' => '',
	'collapse' => '',
	'first' => '',
	'first_arrow' => 'false',
	'title' => '',
	'content' => '',
] );

?>

<div class="panel">
	<div class="panel-heading" role="tab" id="<?php echo esc_attr( $args['heading'] ); ?>">

<?php
	Load::atom( 'panel-heading/panel-heading', [
		'data-parent' => $args['data-parent'],
		'href' => $args['collapse'],
		'class' => 'knowledge-faq__question',
		'aria-control' => $args['collapse'],
		'first_arrow' => $args['first_arrow'],
		'title' => $args['title'],
	] );
?>

	</div>

	<div id="<?php echo esc_attr( $args['collapse'] ); ?>"
		aria-expanded="<?php echo esc_attr( $args['first_arrow'] ); ?>"
		class="panel-collapse collapse <?php echo esc_attr( $args['first'] ); ?>" role="tabpanel"
		aria-labelledby="<?php echo esc_attr( $args['heading'] ); ?>">

		<div class="panel-body">
			<?php echo wp_kses_post( wpautop( $args['content'] ) ); ?>
		</div>
	</div>
</div>
