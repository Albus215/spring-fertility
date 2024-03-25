<?php
$args = wp_parse_args( $args, [
	'post' => new stdClass(),
] );
$post = $args['post'];
$date = date_create_from_format( 'M d, Y / g:iA', get_field( 'event_item_date', $post->ID ) );
$date_str = ( $date instanceof DateTime ) ? $date->format( 'M d' ) : get_field( 'event_item_date', $post->ID );

?>


<li class="m__home-event col-md-6">
	<div class="row" style="width: 100%; margin: 0">
		<div class="col-sm-7 col-md-12">
			<div class="m__home-event__image"
				style="background-image: url( '<?php echo esc_attr( get_the_post_thumbnail_url( $post->ID ) ); ?>'); ">
			</div>
		</div>

		<div class="m__home-event__content col-sm-5 col-md-12">
			<h4 class="m__home-event__title"><?php echo esc_html( $post->post_title ); ?></h4>
			<div class="m__home-event__text"><?php echo esc_html( get_field( 'event_item_short_description', $post->ID ) ); ?></div>
			<div class="m__home-event__metadata clearfix">
				<div class="m__home-event__date">
					<?php use_icon( 'icon-calendar', 'icon-calendar' ); ?>
					<?php echo esc_html( $date_str ); ?>
				</div>
				<a href="<?php echo esc_url( get_post_permalink( $post->ID ) ); ?>" class="m__home-event__link">Event Details</a>
			</div>
		</div>
	</div>
</li>
