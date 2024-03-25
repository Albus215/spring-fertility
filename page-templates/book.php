<?php
use Lean\Load;

/**
 * Template Name: Book
 */

get_header();

$heroTitle = get_field('book_a_consult_hero_title');
$heroSubtitle = get_field('book_a_consult_hero_subtitle');

?>

<?php Load::organisms( 'general-hero/general-hero', [
	'hero_img' => get_field( 'book_a_consult_hero_image' ),
	'hero_title' => !empty($heroTitle) ? $heroTitle : get_the_title(),
	'hero_txt' => $heroSubtitle,
	'hero_bg_dark' => false,
] ); ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

?>

<div class="container">
	<div class="row book-info">
		<div class="col-sm-6 col-md-4 col-md-offset-2">
			<?php the_content(); ?>
		</div>

		<div class="col-sm-6 col-md-4 col-md-offset-1">

		<?php

			if ( have_rows( 'book_a_consult_side' ) ) :

				while ( have_rows( 'book_a_consult_side' ) ) :
					the_row();
		?>
			<h3><?php the_sub_field( 'book_a_consult_side_title' ); ?></h3>
			<p><?php echo wp_kses_post( the_sub_field( 'book_a_consult_side_text' ) ); ?></p>

		<?php

				endwhile;
			endif;

		?>

		</div>

	</div>
</div>

		<style>
			.page-template-book select.large.gfield_select {
				font-size: 16px!important;
				font-weight: normal!important;
			}
			.gform_wrapper ul.gfield_checkbox li label {
				font-size: 14px;
			}
			.gform_wrapper .gform_footer input.button,
			.gform_wrapper .gform_footer input[type=submit],
			.gform_wrapper .gform_page_footer input.button,
			.gform_wrapper .gform_page_footer input[type=submit] {
				color: #fff;
				background-color: #00B3E5;
				text-transform: uppercase;
				border: 0;
				font-size: 14px;
				font-weight: bold;
				padding: 0 30px;
				letter-spacing: .12em;
				height: 42px;
				line-height: 42px;
				transition: all .25s linear;
			}

			.gform_wrapper .gform_footer input.button:hover,
			.gform_wrapper .gform_footer input[type=submit]:hover,
			.gform_wrapper .gform_page_footer input.button:hover,
			.gform_wrapper .gform_page_footer input[type=submit]:hover,
			.gform_wrapper .gform_footer input.button:focus,
			.gform_wrapper .gform_footer input[type=submit]:focus,
			.gform_wrapper .gform_page_footer input.button:focus,
			.gform_wrapper .gform_page_footer input[type=submit]:focus, {
				background: #0189AF;
				color: #fff;
			}
		</style>

<?php
	endwhile;
endif;

get_footer();
