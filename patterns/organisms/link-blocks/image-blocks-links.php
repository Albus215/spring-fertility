<?php
/**
 * Image Blocks With Links
 */
$args = wp_parse_args($args, [
	'title'       => '',
	'imageblocks' => [],
]);

if (!empty($args['imageblocks'])) :
	$ibArray = $args['imageblocks']; ?>
	<section class="container clearfix o-ibl__wrap">
		<?php if (!empty($args['title'])) : ?>
			<div class="row">
				<div class="col-sm-12 o-ibl__title">
					<h2 class="text-center"><?php echo $args['title']; ?></h2>
				</div>
			</div>
		<?php endif; ?>
		<div class="o-ibl__row">
			<?php foreach ($ibArray as $ib) :
				if ($ib['use_document_link']) {
					$ibLinkUrl = $ib['link_document_file']['url'];
					$ibLinkTarget = '_blank';
					$ibLinkTitle = $ib['link_document_title'];
				} else {
					$ibLinkUrl = $ib['link']['url'];
					$ibLinkTarget = $ib['link']['target'];
					$ibLinkTitle = $ib['link']['title'];
				} ?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 o-ibl__box-wrap">
					<div class="o-ibl__box">
						<a class="o-ibl__box-img"
						   href="<?php echo $ibLinkUrl; ?>"
						   target="<?php echo $ibLinkTarget; ?>"
						   style="background-image: url(<?php echo $ib['image']['url']; ?>)"></a>
						<a class="o-ibl__box-link"
						   href="<?php echo $ibLinkUrl; ?>"
						   target="<?php echo $ibLinkTarget; ?>">
							<?php echo $ibLinkTitle; ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif;
