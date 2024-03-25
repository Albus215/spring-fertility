<?php
$args = wp_parse_args( $args, [
	'post' => [],
] );

$image = get_field( 'post_image', $args['post']->ID );
$image_src = ( $image ? $image : get_field( 'general_options_backup_blog_image', 'option' ) );

$title = $args['post']->post_title;
$getlength = strlen( $title );
if ( $getlength > 58 ) {
	$title = substr( $title, 0, 58 ) . '...' ;
}

?>

<div class="container">
	<div class="row">
		<div class="o__blog-featured clearfix">
			<div class="o__blog-featured_image col-xs-12 col-md-6">
				<a href="<?php echo esc_url( get_permalink( $args['post']->ID ) ); ?>">
					<img
						src="<?php echo esc_url( $image_src ); ?>"
						alt="<?php echo esc_attr( $args['post']->post_title ); ?>"
						class="o__blog-featured_img">
				</a>
			</div>
			<div class="o__blog-featured_info col-md-6">
				<a href="<?php echo esc_url( get_permalink( $args['post']->ID ) ); ?>">
					<h3 class="o__blog-featured_title"><?php echo esc_html( $title ); ?></h3>
				</a>
				<p class="o__blog-featured_date">
					<?php use_icon( 'icon-clock', 'icon-clock' ); ?> <?php echo esc_html( human_time_diff( get_the_time( 'U', $args['post'] ), current_time( 'timestamp' ) ) . ' ago' ); ?>
				</p>
				<p class="o__blog-featured_blob"><?php echo esc_html( get_field( 'post_description', $args['post']->ID ) ); ?></p>
				<a href="<?php echo esc_url( get_permalink( $args['post']->ID ) ); ?>" class="btn-blue-outline">Read More</a>
			</div>
		</div>
	</div>
</div>
