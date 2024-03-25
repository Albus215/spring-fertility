<?php
use Lean\Load;

$social_networks = get_field( 'social_media_networks', 'option' );
?>
<div class="row">
	<div class="col-sm-6 footer-social">
		<h4><?php echo esc_html( get_field( 'social_media_title', 'option' ) ); ?></h4>
		<ul class="list-inline">

		<?php
		foreach ( (array) $social_networks as $social_network ) :
			$network = $social_network['general_options_network'];
			$network = $network ? strtolower( $network ) : '';
			$social_network = wp_parse_args($social_network, [
				'link' => '',
			]);
		?>

			<li class="ico-<?php echo esc_attr( $network ); ?>">
				<a target="_blank" href="<?php echo esc_url( $social_network['link'] ); ?>"></a>
			</li>

		<?php
		endforeach;
		?>

		</ul>
	</div>
	<div class="col-sm-6 footer-info">
		<h4><?php echo esc_html( get_field( 'contact_title', 'option' ) ); ?></h4>
		<?php echo wp_kses_post( get_field( 'contact_info', 'option' ) ); ?>
	</div>
</div>
