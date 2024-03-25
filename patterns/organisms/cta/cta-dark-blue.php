<?php
/**
 * CTA Dark Blue
 */
$args = wp_parse_args($args, [
	'content'            => '',
	'use_email_link'     => false,
	'link'               => [
		'url'    => '',
		'title'  => '',
		'target' => '',
	],
	'email_link_title'   => '',
	'email_link_mailto'  => '',
	'email_link_subject' => '',
	'email_link_message' => '',
]);

if (!empty($args['content'])) : ?>
	<section class="o-cta-db">
		<div class="container clearfix">
			<div class="col-lg-6 col-md-8 col-sm-12 col-lg-offset-3 col-md-offset-2">
				<div class="clearfix o-cta-db__txt">
					<?php echo do_shortcode($args['content']); ?>
				</div>
				<div class="clearfix text-center">
					<?php if (!$args['use_email_link']) : ?>
						<a class="btn"
						   href="<?php echo $args['link']['url']; ?>"
						   target="<?php echo $args['link']['target']; ?>">
							<?php echo $args['link']['title']; ?>
						</a>
					<?php else :
						$emailLink = 'mailto:' . $args['email_link_mailto'] .
							'?subject=' . $args['email_link_subject'] .
							'&body=' . $args['email_link_message'];
						?>
						<a class="btn"
						   href="<?php echo $emailLink; ?>">
							<?php echo $args['email_link_title']; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif;
