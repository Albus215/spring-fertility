<?php
/**
 * Template Name: Resource Test
 */

use Lean\Load;

get_header();

$pageContent = get_the_content();

Load::organisms('resources-faq/hero-simple', [
	'title' => get_the_title(),
]);
?>
	<section class="container clearfix space space-p-top-50 space-p-bottom-25">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
				<div class="clearfix space-p-top-25 space-p-bottom-50">
					<?= do_shortcode($pageContent) ?>
				</div>
			</div>
		</div>
	</section>
<?php

get_footer();


