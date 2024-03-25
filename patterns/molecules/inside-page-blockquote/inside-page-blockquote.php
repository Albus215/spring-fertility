<?php
$args = wp_parse_args( $args, [
	'quote_image' => '',
	'quote_text' => '',
	'quote_url' => '',
] );

?>

<section class="inside-blockquote text-center" style="background-image: url('<?php echo esc_url( $args['quote_image'] ); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<?php if ( $args['quote_url'] ) : ?>
					<a href="<?php echo esc_url( $args['quote_url'] ); ?>">
				
				<?php endif; ?>
					<h4><?php echo esc_html( $args['quote_text'] ); ?></h4>
				
				<?php if ( $args['quote_url'] ) : ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
