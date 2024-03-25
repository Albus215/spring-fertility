<?php
/**
 * The template for displaying the sidebar in KnowledgeBase.
 */
use Lean\Load;
$cpt = 'knowledge_topic';

$topics = get_terms( $cpt, array(
	'hide_empty' => false,
	'parent' => 0,
	'orderby' => 'ID',
));

$args = wp_parse_args( $args, [
	'subjects' => '',
] );

?>

<div class="panel-group panel-base" id="knowledge" role="tablist" aria-multiselectable="true">
	<div class="panel panel-active">
		
<?php
	foreach ( $topics as $topic ) :
		Load::molecules( 'knowledge-toplevel/knowledge-toplevel', [
			'cpt' => $cpt,
			'topic' => $topic,
			'subjects' => $args['subjects'],
		] );
	endforeach;
?>

	</div>
</div>
