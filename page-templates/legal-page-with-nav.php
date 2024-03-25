<?php
/**
 * Template Name: Legal Page With Nav
 */

use Lean\Load;

get_header();

$infoSections = get_field('info_sections');


Load::organisms('resources-faq/hero-simple', ['title' => get_the_title(),]);
?>
	<section class="clearfix legal-tpl">
		<div class="container">
			<div class="row">
				<?php if (!empty($infoSections)) : ?>
					<div class="col-md-4 col-lg-3" data-legal-accordion>
						<div class="legal-tpl-nav__nav-wrap">
							<h6 class="legal-tpl-nav__nav-title" data-legal-accordion="toggle">
								<?= __('Navigation') ?>
							</h6>
							<ul class="legal-tpl-nav__nav" data-sspy-menu data-legal-accordion="content">
								<?php foreach ($infoSections as $infoSectionKey => $infoSection) : ?>
									<li>
										<a href="#section-<?= sanitize_title($infoSection['title']) ?>">
											<?= $infoSection['title'] ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="col-md-8 col-lg-9 pb-6">
						<?php foreach ($infoSections as $infoSectionKey => $infoSection) : ?>
							<div class="legal-tpl-nav__info pt-3 mt-3"
								 data-section-uid="#section-<?= sanitize_title($infoSection['title']) ?>">
								<h3 class="">
									<?= $infoSection['title'] ?>
								</h3>
								<div class="clearfix the-content pl-0 pr-0 pt-0 pb-3">
									<?= do_shortcode($infoSection['info']) ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php get_footer();
