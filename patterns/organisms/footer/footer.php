<?php
use Lean\Load;



$locations = get_field( 'contact_location', 'option' );

$redMsg = get_field('red_message_text', 'option');
$redMsgShowOn = get_field('red_message_show_on', 'option');
if (empty($redMsgShowOn) || $redMsgShowOn === 'none') {
	$redMsg = '';
} elseif ($redMsgShowOn === 'location' && strpos(get_page_template(), 'page-templates/location-') === false) {
	$redMsg = '';
}


//$post_id = get_the_ID();
?>


<footer class="container-fluid">
	<?php
	$show_non_profit = false;
	if(is_page_template('page-templates/non-profit.php')){
		if( get_field( 'non_profit_footer_twitter_url' )){
			$show_non_profit = true;
		}
	}
	//if ( is_page_template( 'page-templates/non-profit.php' ) ) {
	if($show_non_profit){
		Load::organisms( 'footer-non-profit/footer-non-profit', [
			'post_id' => get_the_ID(),
		] );
	} else {
		Load::organisms( 'footer/footer-social' );
	}
	?>

	<?php
		Load::molecules( 'footer-knowledge/footer-knowledge' );
	?>

	<hr>

	<div class="row footer-locations">

		<?php
		foreach ( (array) $locations as $key => $location ) :
			$name = $location['contact_location_title'];
			$link = $location['link'];
			$address = $location['contact_location_address'];
?>
			<div class="col-sm-4 col-md-3 col-md-offset-1">
				<h5>
					<?php if (!empty($link)) : ?>
						<a style="color: #414548" href="<?= $link ?>"><?php echo esc_html( $name ); ?></a>
					<?php else : ?>
						<?php echo esc_html( $name ); ?>
					<?php endif; ?>
				</h5>
				<p><?php echo wp_kses_post( $address ); ?></p>
			</div>

		<?php
		endforeach;
		?>

	</div>

	<?php if (!empty($redMsg)) : ?>
	<div class="row">
		<div class="col-sm-12">
			<p style="color: #f67866; font-weight: bold; text-align: center; margin: 0">
				<?php echo $redMsg; ?>
			</p>
		</div>
	</div>
	<?php endif; ?>

	<hr>

	<div class="row">
		<div class="col-lg-12">
			<p class="footer-logo"></p>

<?php
$copyright = '';
if ( function_exists( 'get_field' ) ) {
	$copyright = (string) get_field( 'general_options_copyright_text', 'option' );
}
$copyright = str_replace( '%YEAR%', date( 'Y' ), $copyright );
?>

<?php if ( ! empty( $copyright ) ) : ?>
		<p class="copyright"><?php echo $copyright; ?></p>
<?php endif; ?>

		</div>
	</div>

</footer>

<script type="text/javascript">
	(function($) {
		$('a[href^="tel:"]').click(function(){
			var telnumber=$(this).attr('href');
			gtag( 'event', 'click', {
				event_category: 'Phone Links',
				event_label: telnumber
			});
		});
	})( jQuery );
</script>
