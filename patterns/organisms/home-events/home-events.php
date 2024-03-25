<?php
use Lean\Load;
use Spring\Modules\Events\Events;


$args = wp_parse_args( $args, [
	'title' => '',
	'text' => '',
	'empty_events' => '',
	'posts' => [],
] );

$events = Events::filter_active_events( $args['posts'] );

?>

<div class="o__home-events">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h3 class="o__home-events__title"><?php echo esc_html( $args['title'] ); ?></h3>
				<p class="o__home-events__text"><?php echo esc_html( $args['text'] ); ?></p>
			</div>
		</div>

<?php
		if ( ! empty( $events ) ) :
?>
		<div class="row">
			<ul class="o__home-events-list clearfix">

<?php
				foreach ( $events as $post ) :
					Load::molecule( 'home-event/home-event', [
						'post' => $post,
					] );
				endforeach;
?>

			</ul>
		</div>
		<div class="o__home-events-link">
			<a href="/events" class="btn-blue-outline">View More</a>
		</div>

<?php
		else :
?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<p class="o__home-events__text"><?php echo esc_html( $args['empty_events'] ); ?></p>
			</div>
		</div>
<?php
		endif;
?>

	</div>
</div>
