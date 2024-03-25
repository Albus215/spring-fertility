<?php
use Lean\Load;
$args = wp_parse_args( $args, [
	'cpt' => '',
	'key' => '',
	'topic' => '',
] );

$topic_collapse = 'c' . $args['topic']->slug;
$topic_header = 'h' . $args['topic']->slug;

?>
	<div class="panel-heading " role="tab" id="h<?php echo esc_attr( $args['topic']->slug ); ?>">

<?php
		Load::atom( 'panel-heading/panel-heading', [
			'data-parent' => 'knowledge',
			'href' => $topic_collapse,
			'aria-control' => $args['topic']->slug,
			'first_arrow' => true,
			'title' => $args['topic']->name,
			'arrow' => false,
		] );
?>

	</div>

	<div role="tabpanel"
		id="<?php echo esc_html( $topic_collapse ); ?>"
		class="panel-collapse collapse"
		aria-labelledby="<?php echo esc_html( $topic_header ); ?>">
		
		<div id="<?php echo esc_html( $args['topic']->slug ); ?>"
			class="panel-group panel-inside"
			role="tablist" aria-multiselectable="true">

<?php
	$subtitles = get_terms( 'knowledge_topic', array(
		'hide_empty' => false,
		'parent' => $args['topic']->term_id,
		'orderby' => 'ID',
	) );

	foreach ( $subtitles as $subtitle ) :
		Load::molecules( 'knowledge-sublevel/knowledge-sublevel', [
			'cpt' => $args['cpt'],
			'topic' => $args['topic'],
			'subjects' => $args['subjects'],
			'subtitle' => $subtitle,
		] );

	endforeach;
?>
		</div>
	</div>
