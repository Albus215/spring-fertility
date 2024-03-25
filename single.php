<?php
use Lean\Load;

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		Load::organism( 'blog/blog-single-hero', [
			'title' => get_the_title(),
			'image' => get_field( 'post_image' ),
			'use_video' => get_field( 'post_use_video' ),
			'video_type' => get_field( 'post_video_type' ),
			'video' => get_field( 'post_video' ),
			'video_file' => get_field( 'post_video_file' ),
			'video_file_aspect_ratio' => get_field( 'post_video_file_aspect_ratio' ),
			'video_file_poster' => get_field( 'post_video_file_poster' ),
		] );

		Load::organism( 'blog/blog-single-content', [
			'title' => get_the_title(),
			'date' => human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ),
			'content' => apply_filters( 'the_content', get_post_field( 'post_content' ) ),
		] );

		Load::organism( 'blog/blog-single-share' );

		Load::organism( 'blog/blog-single-recommended' );
	}
}

?>



<?php
get_footer();
