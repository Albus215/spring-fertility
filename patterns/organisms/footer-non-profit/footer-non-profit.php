<?php

use Lean\Load;

$args = wp_parse_args($args, [
	'post_id' => '',
]);

?>

<div class="row o__footer-non-profit">
	<div class="o__footer-non-profit-link col-xs-6">
		<a href="<?php the_field( 'non_profit_footer_twitter_url', $args['post_id'] ); ?>">
			<span><?php the_field( 'non_profit_footer_twitter_text', $args['post_id'] ); ?></span>
			<i class="o__footer-non-profit-icon"><?php use_icon( 'footer_icon_tw', 'footer_icon_tw' ); ?></i>
		</a>
	</div>
	<div class="o__footer-non-profit-link col-xs-6">
		<a href="mailto:<?php the_field( 'non_profit_footer_contact_email', $args['post_id'] ); ?>">
			<span><?php the_field( 'non_profit_footer_contact_text', $args['post_id'] ); ?></span>
			<i class="o__footer-non-profit-icon"><?php use_icon( 'email_s', 'email_s' ); ?></i>
		</a>
	</div>
</div>
