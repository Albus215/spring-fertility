<?php
$args = array(
	'prev_text' => '<',
	'next_text' => '>',
)
?>

<div class="container">
	<div class="o__blog-pagination">

		<?php echo wp_kses_post( paginate_links( $args ) ); ?>
	</div>
</div>
