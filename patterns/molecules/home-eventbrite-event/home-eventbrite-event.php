<?php
/**
 * @var $post WP_Post
 */
$args = wp_parse_args($args, [
	'post' => new stdClass(),
]);
$post = $args['post'];
//$date = date_create_from_format( 'M d, Y / g:iA', get_field( 'start_ts', $post->ID ) );
//$date_str = ( $date instanceof DateTime ) ? $date->format( 'M d' ) : get_field( 'start_ts', $post->ID );
$date_str = get_field('event_date_start', $post->ID);
$date = date_create_from_format('Y-m-d H:i:s', $date_str);

//	'date' => date('M d, Y / g:iA', get_field( 'start_ts', $post->ID )),

$short_description = $post->post_excerpt;
//$textParts = explode("\n", $post->post_content);
//// $description = '';
//foreach ($textParts as $txt) {
//	if (stristr($txt, 'come') || stristr($txt, 'join')) {
//		$short_description = strip_tags($txt);
//		break;
//	}
//}
$link_new_tab = boolval(get_field('event_link_open_in_a_new_tab', $post->ID));

?>


<li class="m__home-event col-md-6">
	<div class="row" style="width: 100%; margin: 0">
		<div class="col-sm-7 col-md-12">
			<div class="m__home-event__image"
				 style="background-image: url( '<?php echo esc_attr(get_the_post_thumbnail_url($post->ID)); ?>'); ">
			</div>
		</div>

		<div class="m__home-event__content col-sm-5 col-md-12">
			<h4 class="m__home-event__title"><?php echo esc_html($post->post_title); ?></h4>
			<div class="m__home-event__text"><?php echo esc_html($short_description); ?></div>
			<div class="m__home-event__metadata clearfix">
				<div class="m__home-event__date">
					<?php use_icon('icon-calendar', 'icon-calendar'); ?>
					<?php echo $date->format('F j, g A'); ?>
				</div>
				<?php
				/*
				 * Previous version - link to event on a website
				 *
				<a href="<?php //echo esc_url( get_post_permalink( $post->ID ) ); ?>" class="m__home-event__link">Event Details</a>
				 *
				*/
				?>
				<a href="<?php echo esc_url(get_field('event_link', $post->ID)); ?>"
				   class="m__home-event__link"
				   target="<?= $link_new_tab ? '_blank' : '' ?>">
					Event Details
				</a>
			</div>
		</div>
	</div>
</li>
