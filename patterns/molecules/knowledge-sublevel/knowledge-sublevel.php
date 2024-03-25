<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'cpt' => '',
	'topic' => '',
	'subjects' => '',
	'subtitle' => '',
]);

if ($args['subtitle'] instanceof WP_Term) {
	$kb_terms = $args['subtitle']->slug;
} else {
	$kb_terms = [];
}

$kb_posts = new WP_Query([
	'posts_per_page' => 10,
	'orderby' => 'ID',
	'order' => 'ASC',
	'post_type' => 'knowledge',
	'tax_query' => [
		[
			'taxonomy' => 'knowledge_topic',
			'field' => 'slug',
			'terms' => $kb_terms,
		],
	],
]);

if (!empty($args['cpt']) && $args['topic'] instanceof WP_Term) {
	$tax_url = '/' . $args['cpt'] . '/' . $args['topic']->slug . '/';
} else {
	$tax_url = '/';
}


$multiple = (1 < $kb_posts->post_count ? true : false);


$sub_collapse = 'c' . $args['subtitle']->slug;
$sub_header = 'h' . $args['subtitle']->slug;

if ($multiple) :
	?>
	<div class="panel">
		<div class="panel-heading" role="tab" id="<?php echo esc_attr($sub_header); ?>">

			<?php
			Load::atom('panel-heading/panel-heading', [
				'data-parent' => $args['topic']->slug,
				'href' => $sub_collapse,
				'aria-control' => $sub_collapse,
				'first_arrow' => 'false',
				'title' => $args['subtitle']->name,
			]);
			?>
		</div>

		<div id="<?php echo esc_attr($sub_collapse); ?>"
			 aria-expanded="false"
			 class="panel-collapse collapse"
			 aria-labelledby="<?php echo esc_attr($sub_header); ?>">


			<ul>

				<?php

				if (strpos($args['subtitle']->name, 'FAQ') !== false) :
					$faq_topics = get_terms('knowledge_topic', [
						'hide_empty' => true,
						'parent' => $args['subtitle']->term_id,
						'orderby' => 'ID',
					]);

					foreach ($faq_topics as $value) :
						?>

						<li class="sublink">
							<a id="#<?php echo esc_attr($value->slug); ?>"
							   href="<?php echo esc_url($tax_url . $args['subtitle']->slug . '/#' . $value->slug); ?>">
								<?php echo esc_html($value->name); ?>

							</a>
						</li>

					<?php
					endforeach;
				else :

					while ($kb_posts->have_posts()) :
						$kb_posts->the_post();
						?>
						<li class="sublink">
							<a id="<?php echo esc_attr(basename(get_permalink())); ?>"
							   href="<?php echo esc_url($tax_url . basename(get_permalink())); ?>">
								<?php the_title(); ?>
							</a>
						</li>

					<?php
					endwhile;
				endif;
				?>

			</ul>
		</div>
	</div> <!-- panel -->

<?php
else :

	$custom_link = '';
	$use_custom_sublinks = false;
	$custom_sublinks = [];
	if ($args['subtitle'] instanceof WP_Term) {
		$custom_link = get_field('kb_topic_custom_link', $args['subtitle']);
		$use_custom_sublinks = get_field('kb_topic_use_custom_sublinks', $args['subtitle']);
		$custom_sublinks = get_field('kb_topic_custom_sublinks', $args['subtitle']);
	}
	$topic_link = !empty($custom_link) ? $custom_link : ($tax_url . $args['subtitle']->slug);

	if ($use_custom_sublinks && !empty($custom_sublinks)) : // Topic with custom sublinks ?>

		<div class="panel">
			<div class="panel-heading" role="tab" id="<?php echo esc_attr($sub_header); ?>">
				<?php
				Load::atom('panel-heading/panel-heading', [
					'data-parent' => $args['topic']->slug,
					'href' => $sub_collapse,
					'aria-control' => $sub_collapse,
					'first_arrow' => 'false',
					'title' => $args['subtitle']->name,
				]);
				?>
			</div>
			<div id="<?php echo esc_attr($sub_collapse); ?>"
				 aria-expanded="false"
				 class="panel-collapse collapse"
				 aria-labelledby="<?php echo esc_attr($sub_header); ?>">
				<ul>
					<?php foreach ($custom_sublinks as $custom_sublink) : ?>
						<li class="sublink">
							<a href="<?php echo esc_url($custom_sublink['link']['url']); ?>"
							   target="<?php echo $custom_sublink['link']['target']; ?>">
								<?php echo esc_html($custom_sublink['link']['title']); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div> <!-- panel -->

	<?php else : // Regular topic ?>

		<div class="panel single-panel">

			<a class="<?php echo esc_attr($sub_header); ?>"
			   id="<?php echo esc_attr($tax_url . $args['subtitle']->slug); ?>"
			   href="<?php echo esc_url($topic_link); ?>">
				<?php echo esc_html($args['subtitle']->name); ?>

			</a>

		</div> <!-- panel -->

	<?php endif; ?>

<?php
endif;
