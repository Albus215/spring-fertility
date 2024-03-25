<?php
$blogPageId = get_option('page_for_posts');
$cta = get_field('cta_section', $blogPageId);
?>
	<div class="container-fluid o__videos-cta"
		 style="background-image: url(<?= $cta['background_image']['url'] ?>)">
		<div class="row">
			<div class="col-lg-12">
				<?= do_shortcode($cta['content']) ?>
			</div>
		</div>
	</div>
<?php
