<?php
global $post;

$args = wp_parse_args( $args, [
	'title' => '',
] );

$categories = get_terms( 'press_type', array(
	'hide_empty' => false,
	'orderby' => 'ID',
	'order'   => 'DESC',
));
?>
	<div class="o__hero-press-categories">
		<ul>
			<?php
			foreach ($categories as $value) :
				$is_current = ($args['title'] === $value->name ? 'cat-item current-cat' : 'cat-item');
				?>
				<li class="<?php echo esc_attr($is_current); ?>">
					<a href="<?php echo esc_url(get_site_url() . '/' . $value->taxonomy . '/' . $value->slug); ?>">
						<?php echo esc_html($value->name); ?>

					</a>
				</li>

			<?php
			endforeach;
			?>
		</ul>
	</div>
<?php
