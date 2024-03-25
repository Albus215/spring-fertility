<?php
$args = wp_parse_args( $args, [
	'title' => '',
	'date' => '',
	'location' => '',
	'description' => '',
	'content' => '',
	'cta' => '',
	'cta_url' => '',
] );

?>

<article class="o__event-content">
	<div class="row">
		<header class="o__event-content__header  col-md-8 col-md-offset-2">
			<h1 class="o__event-content__title"><b><?php echo esc_html( $args['title'] ); ?></b></h1>
			<div class="o__event-content__metadata">
				<div class="o__event-content__date">
					<?php use_icon( 'icon-calendar', 'icon-calendar' ); ?>
					<?php echo esc_html( $args['date'] ); ?>
				</div>
				<div class="o__event-content__location">
					<?php use_icon( 'icon-location', 'icon-location' ); ?>
					<?php echo esc_html( $args['location'] ); ?>
				</div>
			</div>
		</header>
	</div>
	<div class="row">
		<p class="o__event-content__description col-md-8 col-md-offset-2">
			<?php echo esc_html( $args['description'] ); ?>
		</p>
	</div>
	<div class="row">
		<div class="o__event-content__wrapper col-md-8 col-md-offset-2">
			<?php echo wp_kses_post( wpautop( $args['content'] ) ); ?>
		</div>
	</div>
	<div class="row">
		<div class="o__event-content__cta">
			<a
				class="btn-blue-medium"
				href="<?php echo esc_url( $args['cta_url'] ); ?>"
				target="_blank"
			>
				<?php echo esc_html( $args['cta'] ); ?>
			</a>
		</div>
	</div>
</article>
