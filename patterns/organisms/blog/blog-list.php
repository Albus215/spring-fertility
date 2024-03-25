<?php
global $post;

$args = wp_parse_args( $args, [
	'posts' => [],
	'featured_post_id' => 0,
] );

?>

<div class="o__blog-list container">
	<div class="row">

<?php
	if ( $args['posts']->have_posts() ) :
		while ( $args['posts']->have_posts() ) :
			$args['posts']->the_post();

			if ( $post->ID !== $args['featured_post_id'] ) :
				$image = get_field( 'post_image', $post->ID );
				$image_src = ( $image ? $image : get_field( 'general_options_backup_blog_image', 'option' ) );

				$title = max_title_length( $post->post_title );

?>
			<div class="col-md-4">
				<div class="o__blog-item">
					<div class="o__blog-item_img">

						<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
							<img
								src="<?php echo esc_url( $image_src ); ?>"
								alt="<?php echo esc_attr( $post->post_title ); ?>"
								class="o__blog-item_img">
						</a>
					</div>
					<div class="o__blog-item_info">

						<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
							<h3 class="o__blog-item_title"><?php echo esc_html( $title ); ?></h3>
						</a>
						<p class="o__blog-item_blob"><?php echo esc_html( get_field( 'post_description', $post->ID ) ); ?></p>
						<p class="o__blog-item_date">
							<?php use_icon( 'icon-clock', 'icon-clock' ); ?> <?php echo esc_html( human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ) . ' ago' ); ?>
						</p>
					</div>
				</div>
			</div>

<?php
			endif;
		endwhile;
	endif;
	wp_reset_postdata();
?>

	</div>
</div>
