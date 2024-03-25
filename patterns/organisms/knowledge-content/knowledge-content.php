<?php
/**
 * The template for displaying normal content in KnowledgeBase.
 */
use Lean\Load;
global $post;

$args = wp_parse_args( $args, [
	'kb_posts' => '',
	'title' => '',
] );


	while ( $args['kb_posts']->have_posts() ) :
		$args['kb_posts']->the_post();
?>
		<a class="anchor"
			name="<?php echo esc_attr( $post->post_name ); ?>"
			id="<?php echo esc_attr( $post->post_name ); ?>"
			href="#<?php echo esc_url( $post->post_name ); ?>"><small> </small></a>

<?php

		if ( strcasecmp( get_the_title(), $args['title'] ) !== 0 ) :
			echo '<h3>' . get_the_title() . '</h3>';
		endif;
?>
		<p><?php the_content(); ?></p>

<?php
	endwhile;
?>
