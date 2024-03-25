<?php

$args = wp_parse_args( $args, [
	'title' => '',
	'date' => '',
	'content' => '',
] );
?>

<div class="container">

	<article class="o__event-content">
		<div class="row">
			<header class="o__event-content__header  col-md-8 col-md-offset-2">
				<h1 class="o__event-content__title" style="line-height: 1.1"><b><?php echo esc_html( $args['title'] ); ?></b></h1>
				<div class="o__event-content__metadata">
<!--					<div class="o__event-content__date">-->
<!--						--><?php //use_icon( 'icon-clock', 'icon-clock' ); ?>
<!--						--><?php //echo esc_html( $args['date'] . ' ago' ); ?>
<!--					</div>-->
				</div>
			</header>
		</div>

		<div class="row">
			<div class="o__event-content__wrapper col-md-8 col-md-offset-2">
				<?php echo wp_kses_post( wpautop( $args['content'] ) ); ?>
			</div>
		</div>
	</article>
</div>
