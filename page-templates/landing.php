<?php
use Lean\Load;
/**
 * Template Name: Landing page template
 */


get_header();

if ( have_rows( 'lending_flexible_content' ) ) {

    while (have_rows('lending_flexible_content')) {

        the_row();

        switch ( get_row_layout() ) {
            case 'background_and_box' : ?>
                <div class="desktop">
                    <div class="container-fluid">
                        <div class="col-xs-12 col-sm-6">
                            <div class="bg-img green-background" style="background-image: url(<?= get_sub_field('background_image') ?>); background-repeat: no-repeat; background-size: cover;">
                                <div class="white-box---container">
                                    <div class="landing-main">
                                        <div class="white-box--content">
                                            <?= get_sub_field('title') ?>
                                            <?= get_sub_field('text') ?>
                                            <div class="modal-container">
                                                <input id="modal-toggle" type="checkbox">
                                                <label class="btn-blue-outline modal-btn"  for="modal-toggle"><?= get_sub_field('button_text')?></label>
                                                <label class="modal-backdrop" for="modal-toggle"></label>
                                                <div class="modal-content">
                                                    <label class="modal-close" for="modal-toggle">&#x2715;</label>
                                                    <p class="spring-title "><?= get_sub_field('form_text')?></p>
                                                    <div class="lightbox-form">
                                                        <?= gravity_form( get_sub_field('form_id'), false, false, false, '', true ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="text--colored">
                                <div class="text--blue">
                                    <img src="<?= get_sub_field('blue_text') ?>" class="img-responsive">
                                </div>
                                <div class="text--green">
                                    <img src="<?= get_sub_field('green_text') ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
				</div>
                </div>
                <div class="bg-img mobile" style="background-image: url(<?= get_sub_field('background_image_mobile') ?>)">
                    <div class="white-box---container col-sm-offset-2">
                        <div class="landing-main">
                            <div class="white-box--content">
                                <?= get_sub_field('title') ?>
                                <?= get_sub_field('text') ?>
                                <div class="modal-container">
                                    <input id="modal-toggle" type="checkbox">
                                    <label class="btn-blue-outline modal-btn"  for="modal-toggle"><?= get_sub_field('button_text')?></label>
                                    <label class="modal-backdrop" for="modal-toggle"></label>
                                    <div class="modal-content">
                                        <label class="modal-close" for="modal-toggle">&#x2715;</label>
                                        <p class="spring-title "><?= get_sub_field('form_text')?></p>
                                        <div class="lightbox-form">
                                            <?= gravity_form( get_sub_field('form_id'), false, false, false, '', true ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php break;
			case 'fertility' : ?>
                <div class="container">
					<div class="fertility">
                        <div class="green-side">
                            <img src="<?= get_sub_field('green_area')?>" class="img-responsive">
                        </div>
                        <?= get_sub_field('title') ?>
                            <?php if( have_rows('fertility_items') ): ?>

                                <div class="container fertility-content">
                                    <?php while( have_rows('fertility_items') ): the_row();
                                        $percent = get_sub_field('percent');
                                        $text = get_sub_field('text');
                                        ?>
                                        <div class="col-sx-12 col-sm-4 mb-5">
                                            <p class="fertility-percent"><?= $percent ?></p>
                                            <p class="fertility-title"><?= $text ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <div class="container">
                            <div class="fertility-text">
                                <?= get_sub_field('text') ?>
                            </div>
                        </div>
					</div>
                    <div class="col-sm-12 button-bottom">
                        <div class="lightbox" style="background-image: url(<?= get_sub_field('background_image')?>)">
                            <div class="modal-container">
                                <input id="modal-toggle" type="checkbox">
                                <label class="btn-blue-outline modal-btn"  for="modal-toggle"><?= get_sub_field('button_text')?></label>
                                <label class="modal-backdrop" for="modal-toggle"></label>
                                <div class="modal-content">
                                    <label class="modal-close" for="modal-toggle">&#x2715;</label>
                                    <p class="spring-title "><?= get_sub_field('form_title_text')?></p>
                                    <div class="lightbox-form">
                                        <?= gravity_form( get_sub_field('form_id'), false, false, false, '', true ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            <?php break;
            case 'person' : ?>
                <div class="person-info">
                    <div class="container-fluid">
                        <div class="dr-img col-sx-12 col-sm-6">
                            <img src="<?= get_sub_field('image')?>" class="img-responsive">
                        </div>
                        <div class="col-sx-12 col-sm-6">
                            <h2><?= get_sub_field('title')?></h2>
                            <div class="bio col-sx-12 ">
                                <?= get_sub_field('text')?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php break;
            case 'reasons' : ?>
                <div class="container">
                    <div class="reasons mb-5">
                        <div class="green-area">
                            <img src="<?= get_sub_field('green_area') ?>">
                        </div>
                        <?= get_sub_field('title') ?>
                        <?php if( have_rows('reasons_items') ): ?>

                            <div class="container reasons-content">
                                <?php while( have_rows('reasons_items') ): the_row();
                                    $image = get_sub_field('image');
                                    $text = get_sub_field('text');
                                    $description = get_sub_field('description');
                                    ?>
                                    <div class="col-sx-12 col-sm-4">
                                        <img src="<?= $image ?>">
                                        <p class="reasons-title"><?= $text ?></p>
                                        <div class="reason-description"><?= $description ?></div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php break;
            case 'science_meets' : ?>
                <div class="science-meets" style="background-image: url(<?= get_sub_field('background_image')?>)">
                    <div class="container-fluid">
                        <div class="col-sx-12">
                            <div class="meets-content">
                                <h2 class="meets-title "><?= get_sub_field('title')?></h2>
                                <div class="meets-text">
                                    <?= get_sub_field('text')?>
                                </div>
                                <div class="meets-button">
<!--                                        <a class="btn btn-white" href="--><?//= get_sub_field('button_link')?><!--">--><?//= get_sub_field('button_text')?><!--</a>-->
                                    <div class="lightbox" style="background-image: url(<?= get_sub_field('background_image')?>)">
                                        <div class="modal-container">
                                            <input id="modal-toggle" type="checkbox">
                                            <label class="btn btn-white"  for="modal-toggle"><?= get_sub_field('button_text')?></label>
                                            <label class="modal-backdrop" for="modal-toggle"></label>
                                            <div class="modal-content">
                                                <label class="modal-close" for="modal-toggle">&#x2715;</label>
                                                <p class="spring-title "><?= get_sub_field('form_title_text')?></p>
                                                <div class="lightbox-form">
                                                    <?= gravity_form( get_sub_field('form_id'), false, false, false, '', false ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php break;
            case 'spring_here' : ?>
                <div class="spring-here" style="background-image: url(<?= get_sub_field('background_image')?>)">
                    <div class="container-fluid">
                        <div class="col-sx-12 col-sm-offset-2 col-sm-4">
                            <div class="spring-content">
                                <h2 class="spring-title "><?= get_sub_field('title')?></h2>
                                <div class="spring-text">
                                    <?= get_sub_field('text')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <?php break;
        }
    }
}

?>




<?php get_footer(); ?>
