<?php
/**
 * Template Name: Resource Test
 */

use Lean\Load;

get_header();

$cta = get_field('cta');
$pageContent = get_field('page_content');
$pageTitle = get_field('page_title');

Load::organisms('resources-faq/hero-simple', [
	'title' => !empty($pageTitle) ? $pageTitle : get_the_title(),
]);
?>
	<section class="container clearfix space space-p-top-50 space-p-bottom-25">
		<div class="row">
			<div class="col-md-6">
				<div class="clearfix space-p-top-25 space-p-bottom-25">
					<?= do_shortcode($pageContent['left_column']) ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="clearfix space-p-top-25 space-p-bottom-25">
					<?= do_shortcode($pageContent['right_column']) ?>
				</div>
			</div>
		</div>
	</section>

	<section class="container-fluid o__videos-cta"
		 style="background-image: url(<?= $cta['background_image']['url'] ?>)">
		<div class="row">
			<div class="col-lg-12">
				<?= do_shortcode($cta['content']) ?>
			</div>
		</div>
	</section>
<?php

get_footer();


