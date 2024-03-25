<?php
global $post;
$args = wp_parse_args($args, [
	'posts' => [],
	'order' => 'DESC',
]);


?>

<div class="o__blog-list o__blog-press container">
	<div class="row">
		<?php
		if ($args['posts']->have_posts()) :
			while ($args['posts']->have_posts()) :
				$args['posts']->the_post();

				$tax = get_field('pressreleases_type', $post->ID);

				if (strpos($tax->name, 'Media') !== false) :
					$url = get_field('pressreleases_external_url', $post->ID);
					$target = '_blank';
					$title = $post->post_title;

				else :
					$target = '_self';
					$thepost = get_field('pressreleases_post', $post->ID);
					$url = get_permalink($thepost->ID);
					$title = $thepost->post_title;

				endif;
				$image = get_field('pressrelease_image', $post->ID);
				$image_src = ($image ? $image : get_field('general_options_backup_blog_image', 'option'));

				if (strpos($tax->name, 'Media') !== false) :
					?>

					<div class="col-sm-12">
						<div class="row o__blog-item_videopost">
							<div class="col-md-6">
								<div class="o__blog-item_img">
									<a href="<?php echo esc_url($url); ?>">
										<img
											src="<?php echo esc_url($image_src); ?>"
											alt="<?php echo esc_attr($post->post_title); ?> - Preview"
											class="o__blog-item_img">
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="o__blog-item">
									<h3 class="o__blog-item_title">
										<?php echo esc_attr(strtolower($post->post_title)); ?>
									</h3>
									<p class="o__blog-item_date">
										<?php echo esc_html(human_time_diff(get_the_time('U', $post), current_time('timestamp')) . ' ago'); ?>
									</p>
									<p class="o__blog-item_blob">
										<?php echo esc_html(get_field('pressreleases_excerpt', $post->ID)); ?></p>
									<p class="text-right">
										<a class="o__blog-item_link" href="<?php echo esc_url($url); ?>"
										   target="<?php echo esc_attr($target); ?>">
											READ ON
										</a>
									</p>
								</div>
							</div>
						</div>
					</div>

				<?php
				else :
					?>

					<div class="col-md-6">
						<div class="o__blog-item">
							<h3 class="o__blog-item_title"><?php echo esc_attr(strtolower($post->post_title)); ?></h3>
							<p class="o__blog-item_date">
								<?php echo esc_html(human_time_diff(get_the_time('U', $post), current_time('timestamp')) . ' ago'); ?>
							</p>
							<p class="o__blog-item_blob"><?php echo esc_html(get_field('pressreleases_excerpt', $post->ID)); ?></p>
							<p>
								<a class="o__blog-item_link" href="<?php echo esc_url($url); ?>"
								   target="<?php echo esc_attr($target); ?>">
									READ ON
								</a>
							</p>
						</div>
					</div>

				<?php
				endif;
			endwhile;
		endif;
		?>
	</div>
</div>
