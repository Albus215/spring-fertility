<?php
use Lean\Load;

/**
 * Template Name: Book-Success
 */

get_header();
?>

<div class="bg-inside-hero2" style="background-image: url( <?php esc_url( the_field( 'book_success_hero_image' ) ); ?> )"></div>

<div class="book-success">
	<div class="container-fluid inside-hero">
		<div class="row">
			<div class="md-12">
				<div class="success-btn">

					<svg width="50px" height="37px" viewBox="0 0 24 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					 
						<polygon class="check" fill="#FFF" points="10.5457266 20 4 13.3333333 6.18141014 11.111619 10.5457266 15.5565714 25.8185899 0 28 2.2232"></polygon>

					</svg>

				</div>
			</div>
		</div>
	</div>
</div>

<?php
if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

?>

<div class="container">
	<div class="row text-center">
		<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="row">



<?php

	if ( have_rows( 'book_success_info_block' ) ) :

		while ( have_rows( 'book_success_info_block' ) ) :
			the_row();
?>

		<div class="col-sm-6 col-md-6">
			<div class="book-success-info">
				<div class="icon" style="background-image: url('<?php the_sub_field( 'book_success_info_block_icon' ); ?>')"></div>
				<h5><?php the_sub_field( 'book_success_info_block_title' ); ?></h5>
				<p><?php the_sub_field( 'book_success_info_block_text' ); ?></p>
				<a href="<?php the_sub_field( 'book_success_info_block_link' ); ?>">
					<div class="btn-blue"><?php the_sub_field( 'book_success_info_block_cta' ); ?></div>
				</a>

			</div>
		</div>
<?php
	endwhile;

endif;

?>

	</div>
</div>

<?php
	endwhile;
endif;

get_footer();
