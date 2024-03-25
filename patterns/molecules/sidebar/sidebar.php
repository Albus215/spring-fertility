<?php
/**
 * The template for displaying the sidebar in KnowledgeBase.
 */

$cpt = 'knowledge_topic';

$topics = get_terms( $cpt, array(
	'hide_empty' => false,
	'parent' => 0,
	'orderby' => 'ID',
));

?>

<div class="panel-group panel-base" id="knowledge" role="tablist" aria-multiselectable="true">
	<div class="panel panel-active">
		
<?php
	foreach ( $topics as $key => $topic ) :
		$topic_collapse = 'c' . $topic->slug;
		$topic_header = 'h' . $topic->slug;
?>
		<div class="panel-heading" role="tab" id="h<?php echo esc_html( $topic->slug ); ?>">
			<a role="button"
			data-toggle="collapse"
			data-parent="#knowledge"
			href="#<?php echo esc_html( $topic_collapse ); ?>"
			aria-expanded="true"
			aria-controls="c<?php echo esc_html( $topic->slug ); ?>">
				<?php echo esc_html( $topic->name ); ?>
			</a>
		</div>

		<div role="tabpanel"
			id="<?php echo esc_html( $topic_collapse ); ?>"
			class="panel-collapse collapse"
			aria-labelledby="<?php echo esc_html( $topic_header ); ?>">
			
			<div id="<?php echo esc_html( $topic->slug ); ?>"
				class="panel-group panel-inside"
				role="tablist" aria-multiselectable="true">

<?php
		$subtitles = get_terms( 'knowledge_topic', array(
			'hide_empty' => false,
			'parent' => $topic->term_id,
			'orderby' => 'ID',
		) );

		foreach ( $subtitles as $sub_index => $subtitle ) :

			$kb_posts = new WP_Query( array(
				'posts_per_page' => 10,
				'orderby' => 'ID',
				'order'   => 'ASC',
				'post_type' => 'knowledge',
				'tax_query' => array(
					array(
						'taxonomy' => 'knowledge_topic',
						'field' => 'slug',
						'terms' => $subtitle->slug,
					),
				),
			) );

			$tax_url = '/' . $cpt . '/' . $topic->slug . '/';
			$multiple = ( 1 < $kb_posts->post_count ? true : false );
?>

				<div class="panel">

<?php
			$sub_collapse = 'c' . $subtitle->slug;
			$sub_header = 'h' . $subtitle->slug;

			if ( $multiple ) :
?>

					<a role="button"
						class="collapsed panel-btn"
						data-toggle="collapse"
						data-parent="#<?php echo esc_html( $topic->slug ); ?>"
						href="#<?php echo esc_html( $sub_collapse ); ?>"
						aria-expanded="false"
						aria-controls="<?php echo esc_html( $sub_collapse ); ?>">
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
						<?php echo esc_html( $subtitle->name ); ?>

					</a>
					<div role="tabpanel"
						id="<?php echo esc_html( $sub_collapse ); ?>"
						class="panel-collapse collapse">

						<ul>
<?php
				while ( $kb_posts->have_posts() ) :
					$kb_posts->the_post();
?>
						<li class="sublink">
							<a id="<?php echo esc_attr( basename( get_permalink() ) ); ?>"
								href="<?php echo esc_url( $tax_url . basename( get_permalink() ) ); ?>">
								<?php the_title(); ?>
							</a>
						</li>

<?php
				endwhile;
?>
						</ul>		
					</div>
		
<?php
			else :
?>
					<a role="button"
						id="<?php echo esc_html( $sub_collapse ); ?>"
						class="collapsed panel-btn"
						href="<?php echo esc_html( $tax_url ); ?>"
					>
						<span class="empty-glyphicon" aria-hidden="true"></span>
						<?php echo esc_html( $subtitle->name ); ?>

					</a>

<?php
			endif;
?>

				</div>

<?php

		endforeach;
?>
			</div>
		</div>

<?php
	endforeach;
	?>

	</div>
</div>
