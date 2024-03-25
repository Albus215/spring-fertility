<?php
$args = wp_parse_args( $args, [
	'bkg_image' => '',
	'hero_slogan' => '',
	'quote_author' => '',
	'now_cta_link' => '',
	'now_cta_image' => '',
	'now_cta_label' => '',
	'now_cta_text' => '',
	'later_cta_link' => '',
	'later_cta_image' => '',
	'later_cta_label' => '',
	'later_cta_text' => '',
    'use_alternative_header' => '',
    'blue_text' => '',
    'green_text' => '',
    'main_text' => '',
    'main_blue_text' => '',
    'button_text' => '',
    'button_link' => '',
    'green_area' => '',
] );

?>


<?php if (!$args['use_alternative_header']) : ?>
    <div class="bg-img" style="background-image: url( '<?php echo esc_url( $args['bkg_image'] ); ?>' );"></div>

    <div class="hero-main">

        <div class="container clearfix hero-main__slogan">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $args['hero_slogan']; ?>
				</div>
			</div>
		</div>

    <?php
        if ( $args['quote_author'] ) :
    ?>
        <div class="quote-separator"></div>
        <h4><?php echo esc_html( $args['quote_author'] ); ?></h4>
    <?php
        else :
    ?>
        <div class="quote-missing"></div>
    <?php
        endif;
    ?>

        <div class="hero-cta">
            <a href="<?php echo esc_attr( $args['now_cta_link'] ); ?>">
            <div class="now-cta">
                <div class="circle" style="background-image:url(<?php echo esc_attr( $args['now_cta_image'] ); ?>"></div>
                <div class="circle-cta">
                    <h6><?php echo esc_html( $args['now_cta_label'] ); ?> </h6>
                    <p><?php echo esc_html( $args['now_cta_text'] ); ?></p>
                </div>
            </div>
            </a>

            <a href="<?php echo esc_attr( $args['later_cta_link'] ); ?>">
            <div class="later-cta">
                <div class="circle" style="background-image:url(<?php echo esc_attr( $args['later_cta_image'] ); ?>"></div>
                <div class="circle-cta">
                    <h6><?php echo esc_html( $args['later_cta_label'] ); ?> </h6>
                    <p><?php echo esc_html( $args['later_cta_text'] ); ?></p>
                </div>
            </div>
            </a>
        </div>
    </div>

<?php else : ?>
    <div class="hero-main">
        <div class="hero-main--rainbow">
            Proudly providing care for everyone, regardless of orientation. #PrideMonth
        </div>
        <div class="hero-main--container">
            <div class="hero-main--colored-text">
                <div class="blue-text">
                    <img src="<?= $args['blue_text'] ?>" class="img-responsive">
                </div>
                <div class="green-text">
                    <img src="<?= $args['green_text'] ?>" class="img-responsive">
                </div>
            </div>
            <div class="hero-main--text">
                <p><?= $args['main_text'] ?><a href="<?= $args['button_link'] ?>"><span class="blue-span"> <?= $args['main_blue_text'] ?></span></a></p>
            </div>
            <div class="hero-main--button">
                <a class="btn btn-big" href="<?= $args['button_link'] ?>"><?= $args['button_text'] ?></a>
            </div>
            <div class="hero-main--green-area">
                <img src="<?= $args['green_area'] ?>">
            </div>
        </div>

        <div class="hero-cta">
        <a href="<?php echo esc_attr( $args['now_cta_link'] ); ?>">
            <div class="now-cta">
                <div class="circle" style="background-image:url(<?php echo esc_attr( $args['now_cta_image'] ); ?>"></div>
                <div class="circle-cta">
                    <h6><?php echo esc_html( $args['now_cta_label'] ); ?> </h6>
                    <p><?php echo esc_html( $args['now_cta_text'] ); ?></p>
                </div>
            </div>
        </a>

        <a href="<?php echo esc_attr( $args['later_cta_link'] ); ?>">
            <div class="later-cta">
                <div class="circle" style="background-image:url(<?php echo esc_attr( $args['later_cta_image'] ); ?>"></div>
                <div class="circle-cta">
                    <h6><?php echo esc_html( $args['later_cta_label'] ); ?> </h6>
                    <p><?php echo esc_html( $args['later_cta_text'] ); ?></p>
                </div>
            </div>
        </a>
        </div>
    </div>
    <style type="text/css">
        @media (max-width: 738px) {
            .hero-main--rainbow {
                margin-left: -25px;
                width: calc(100% + 50px);
                background-size: 130% 100%!important;
            }
        }
        @media (min-width: 738px) {
            .hero-main--rainbow {
                margin-top: 65px;
            }
        }
        @media (min-width: 980px) {
            .hero-main--rainbow {
                margin-top: 150px;
            }
        }
        @media (min-width: 1300px) {
            .hero-main--rainbow {
                margin-top: 160px;
            }
        }
        .hero-main--rainbow {
            background: transparent url("/wp-content/themes/spring-fertility/patterns/static/images/hero/rainbow.png") no-repeat center center;
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 5px;
        }
        .bg-img::before {
            background-image: unset!important;
        }
    </style>
<?php  endif; ?>
