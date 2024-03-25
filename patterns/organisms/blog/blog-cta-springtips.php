<?php
$cta = get_field('cta_section', get_option('page_for_posts'));
?>
	<div class="container-fluid hscta-blue o__blog-cta-sptingtips"
		 style="<?= !empty($cta['background_image']['url']) ?
			 ('background: url(' . $cta['background_image']['url'] . ') no-repeat center; background-size: cover;') : '' ?>">
		<div class="row">
			<div class="col-lg-12">
				<?= $cta['content'] ?>
				<?php if (!empty($cta['button']['url'])) : ?>
					<div class="text-center"><br>
						<a class="btn" href="<?= $cta['button']['url'] ?>" target="<?= $cta['button']['target'] ?>">
							<?= $cta['button']['title'] ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php
