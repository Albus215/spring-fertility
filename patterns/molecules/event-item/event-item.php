<?php
$args = wp_parse_args( $args, [
	'title' => '',
	'image' => '',
	'date' => '',
	'date_tz' => '',
	'location' => '',
	'text' => '',
	'url' => '',
	'link_title' => __('EVENT DETAILS'),
	'link_new_tab' => false
] );

$args['link_title'] = !empty(trim($args['link_title'])) ? $args['link_title'] : __('EVENT DETAILS');
$evtDate = date_create_from_format('Y-m-d H:i:s', $args['date']);

$evtDateFormatted = esc_html( $evtDate->format('F j, g') ) .
	(($evtDate->format('i') !== '00') ? ($evtDate->format(':i')) : '') .
	$evtDate->format(' A') .
	' ' .
	(!empty($args['date_tz']) ? $args['date_tz'] : '')
?>

<li class="m__event-item row">
	<a href="<?php echo esc_url( $args['url'] ); ?>"
	   target="<?= $args['link_new_tab'] ? '_blank' : '' ?>">
		<div class="m__event-item-image col-xs-12 col-md-6">
			<img
				src="<?php echo esc_url( $args['image'] ); ?>"
				alt="<?php echo esc_attr( $args['title'] ); ?>"/>
		</div>
	</a>
	<div class="m__event-item-content col-xs-12 col-md-6 col-lg-5">

		<h3 class="m__event-item-title">
			<a href="<?php echo esc_url( $args['url'] ); ?>"
			   target="<?= $args['link_new_tab'] ? '_blank' : '' ?>">
				<?php echo esc_html( $args['title'] ); ?>
			</a>
		</h3>
		<div class="m__event-item-metadata">
			<div class="m__event-item-date">
				<span class="m__event-item-icon-calendar">
					<?php use_icon( 'icon-calendar', 'icon-calendar' ); ?>
				</span>
				<?php echo $evtDateFormatted; ?>
			</div>
		</div>
		<?php
		/*
         * Previous version - event metadata
         *
<div class="m__event-item-metadata">
			<div class="m__event-item-date">
				<span class="m__event-item-icon-calendar">
					<?php use_icon( 'icon-calendar', 'icon-calendar' ); ?>
				</span>
				<?php echo esc_html( $args['date'] ); ?>
			</div>
			<div class="m__event-item-location">
				<span class="m__event-item-icon-location">
					<?php use_icon( 'icon-location', 'icon-location' ); ?>
				</span>
				<?php echo esc_html( $args['location'] ); ?>
			</div>
		</div>
         *
        */
		?>
		<p><?php echo esc_html( $args['description'] ); ?></p>
		<?php
		/*
         * Previous version - link to event on a website
         *
		<a href="<?php echo esc_url( $args['url'] ); ?>" class="m__event-item-cta btn-blue-outline">Event Details</a>
         *
        */
		?>
		<a href="<?php echo esc_url( $args['url'] ); ?>"
		   class="m__event-item-cta btn-blue-outline"
		   target="<?= $args['link_new_tab'] ? '_blank' : '' ?>">
			<?= $args['link_title'] ?>
		</a>
	</div>
</li>
