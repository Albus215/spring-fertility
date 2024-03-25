<?php
global $post;

/**
 * @var WP_Query $postsArr
 */

$args = wp_parse_args($args, [
	'posts' => [],
	'featured_post_id' => 0,
	'current_category' => false
]);
$postsArr = $args['posts'];

?>

<div class="o__blog-list container">
	<div class="row">

		<?php
		$general_backup_image = get_field('general_options_backup_blog_image', 'option');
		$postsList = $postsArr->get_posts();

		if (!empty($postsList)) :
			foreach ($postsList as $post) :
//				if ($post->ID !== $args['featured_post_id']) : // old version? could be restored
				$posts_display_style = $args['current_category'] !== false ?
					(int)get_field('posts_display_style', "category_{$args['current_category']}")
					: 1;
				if (empty($posts_display_style)) $posts_display_style = 1;
				if ($posts_display_style === 2) : // Video
					$custom_thumbnail = get_field('post_image', $post->ID);
					$image_url = has_post_thumbnail($post->ID) ?
						get_the_post_thumbnail_url($post->ID) :
						(
							!empty($custom_thumbnail) ?
								$custom_thumbnail :
								$general_backup_image
						);
					$title = $post->post_title;
					$has_video = !empty(get_field('post_video', $post->ID));
					?>
					<div class="col-sm-12">
						<div class="row o__blog-item_videopost <?= $has_video ? ' o__blog-item_has-video' : '' ?>">
							<div class="col-md-6">
								<div class="o__blog-item_img">
									<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
										<img
											src="<?php echo esc_url( $image_url ); ?>"
											alt="<?php echo esc_attr( $post->post_title ); ?> - Preview"
											class="o__blog-item_img">
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="o__blog-item">
									<h3 class="o__blog-item_title"><?php echo esc_html($title); ?></h3>
									<p class="o__blog-item_date">
										<?php echo esc_html(human_time_diff(get_the_time('U', $post), current_time('timestamp')) . ' ago'); ?>
									</p>
									<p class="o__blog-item_blob"><?php echo esc_html(get_field('post_description', $post->ID)); ?></p>
									<p class="text-right">
										<a class="o__blog-item_link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
											READ ON
										</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				<?php
				else : // Posts
					$title = $post->post_title;
					?>
					<div class="col-md-6">
						<div class="o__blog-item">
							<h3 class="o__blog-item_title"><?php echo esc_html($title); ?></h3>
							<p class="o__blog-item_date">
								<?php echo esc_html(human_time_diff(get_the_time('U', $post), current_time('timestamp')) . ' ago'); ?>
							</p>
							<p class="o__blog-item_blob"><?php echo esc_html(get_field('post_description', $post->ID)); ?></p>
							<p>
								<a class="o__blog-item_link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
									READ ON
								</a>
							</p>
						</div>
					</div>
				<?php
				endif;
//				endif;
			endforeach;
		endif;
//		wp_reset_postdata();
		?>

	</div>
</div>
