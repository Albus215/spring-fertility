<?php
/**
 * The template for displaying normal content in KnowledgeBase.
 */
use Lean\Load;
global $post;

$args = wp_parse_args( $args, [
	'kb_posts' => '',
	'taxp_id' => '',
	'taxp_slug' => '',
] );

$faq_topics = get_terms( 'knowledge_topic', array(
	'hide_empty' => true,
	'parent' => $args['taxp_id'],
	'orderby' => 'ID',
) );

/* If it's the first loop it has an class called in */
$first = 'in';
$first_arrow = 'true';


	foreach ( $faq_topics as $value ) :
		$parent_taxid = $value->term_id;

?>
	<h3 class="faq-left">
		<?php echo esc_html( $value->name ); ?>
	</h3>

	<a class="anchor"
		name="<?php echo esc_attr( $value->name ); ?>"
		id="<?php echo esc_attr( $value->name ); ?>"
		href="#<?php echo esc_url( $value->name ); ?>"><small> </small></a>

	<div class="panel-group"
		id="<?php echo esc_attr( $value->slug ); ?>"
		role="tablist" aria-multiselectable="true">


<?php

	$faq_post = new WP_Query( array(
		'posts_per_page' => 50,
		'orderby' => 'ID',
		'order'   => 'ASC',
		'post_type' => 'knowledge',
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'knowledge_topic',
				'field' => 'slug',
				'terms' => $args['taxp_slug'],
			),
			array(
				'taxonomy' => 'knowledge_topic',
				'field' => 'slug',
				'terms' => $value->slug,
			),

		),
	) );


	if ( $faq_post->have_posts() ) {
		while ( $faq_post->have_posts() ) {

			$faq_post->the_post();

				$collapse = 'c' . $post->post_name;
				$heading = $post->post_name;

				Load::molecules( 'knowledge-faq-panel/knowledge-faq-panel', [
					'heading' => $heading,
					'first_arrow' => $first_arrow,
					'first' => $first,
					'data-parent' => $value->slug,
					'collapse' => $collapse,
					'title' => get_the_title(),
					'content' => get_the_content(),
				] );
			$first = '';
			$first_arrow = 'false';
		}

		wp_reset_postdata();
	}


?>

	</div>


<?php
	endforeach;
?>
