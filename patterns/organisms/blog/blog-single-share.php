<?php
$email = get_field( 'contact_email', 'option' );
?>

<div class="row">
	<div class="o__blog-single-share col-md-8 col-md-offset-2">
		<h3 class="o__blog-single-share__title">Share This Post</h3>
		<ul class="o__blog-single-share__list clearfix">
			<li>
				<a href="#facebook" class="o__events-share__button" data-social-share-facebook>
					<?php use_icon( 'footer_icon_fb_cur', 'facebook' ); ?>
				</a>
			</li>
			<li>
				<a href="#twitter" class="o__events-share__button" data-social-share-twitter>
					<?php use_icon( 'twitter', 'twitter' ); ?>
				</a>
			</li>
			<li>
				<a href="#google" class="o__events-share__button" data-social-share-google>
					<?php use_icon( 'footer_icon_g', 'google' ); ?>
				</a>
			</li>
			<li>
				<a href="mailto:<?php echo esc_url( $email ); ?>" class="o__events-share__button" data-social-share-email>
					<?php use_icon( 'email_s', 'email' ); ?>
				</a>
			</li>
		</ul>
	</div>
</div>
