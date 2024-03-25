<?php

$args = wp_parse_args( $args, [
	'data-parent' => '',
	'href' => '',
	'aria-control' => '',
	'first_arrow' => '',
	'class' => '',
	'title' => '',
	'arrow' => true,
] );

?>

<a role="button"
	data-toggle="collapse"
	data-parent="#<?php echo esc_attr( $args['data-parent'] ); ?>"
	class="<?php echo esc_attr( $args['class'] ); ?>"
	href="#<?php echo esc_attr( $args['href'] ); ?>"
	aria-expanded="<?php echo esc_attr( $args['first_arrow'] ); ?>"
	aria-controls="<?php echo esc_attr( $args['aria-control'] ); ?>">

<?php
	if ( $args['arrow'] ) :
?>
		<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>

<?php
	endif;
?>
	<?php echo esc_html( $args['title'] ); ?>
</a>
