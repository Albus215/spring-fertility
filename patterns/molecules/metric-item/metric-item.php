<?php

$args = wp_parse_args( $args, [
	'no-circle' => false,
	'animation' => 'animation',
	'item' => [],
] );
$item = $args['item'];

$circle = ( $args['no-circle'] ? 'm__metric-item__no-circle' : 'm__metric-item__value' );


?>



<?php if ( isset( $item['metric_value'] ) ) : ?>
<li>
	<article class="m__metric-item">
		<p class="<?php echo esc_attr( $circle ); ?>">

			<span 
				class="m__metric-item-box-number  <?php echo esc_html( $args['animation'] ); ?>"
				data-endnumber="<?php echo esc_attr( $item['metric_value'] ); ?>">
				<?php echo esc_html( $item['metric_value'] ); ?>
			</span> 
			<span class="m__metric-item-box-number">
				<?php echo esc_html( $item['metric_unit'] ); ?>
			</span>

		</p>
		<p class="m__metric-item__text"><?php echo esc_html( $item['metric_text'] ); ?></p>
	</article>
</li>
<?php endif; ?>
