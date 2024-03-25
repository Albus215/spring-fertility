<?php
/**
 * Created by PhpStorm.
 * User: Жанна
 * Date: 16.02.2019
 * Time: 14:25
 */
use Lean\Load;
/**
 * Template Name: Egg Hunt page template
 */

$formID = get_field('form_id');
get_header();

if (have_rows('egg_hunt_content')) {
	while (have_rows('egg_hunt_content')) {
		the_row();

		switch (get_row_layout()) {
            case 'main' : ?>
            <script>
                $('#menu-item-2906 a').click(function (e) {
                    e.preventDefault();
                    $('#modal-toggle-third').prop('checked', true)
                })
                $('.menu-egg-hunt-container a[href^="#"]').click(function(e) {
                    e.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: $( $(this).attr('href') ).offset().top - 130
                    }, 600);
                    return false;
                });
                $('.blue-text.anchored-link').click(function(e) {
                    e.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: $( $(this).attr('href') ).offset().top
                    }, 600);
                    return false;
                })
            </script>
            <div class="main-section-wrapper container-fluid" style="background-image: url(<?= get_sub_field('background'); ?>)">
                <div class="container">
                    <div class="main-section">
                        <div class="left-background-wrapper">
                            <img src="<?= get_sub_field('left_background')?>" class="left-background img-responsive">
                        </div>
                        <div class="egg-hunt-main-titles">
                            <p class="small-text"><?= get_sub_field('small_title') ?></p>
                            <h1 class="main-text"><?= get_sub_field('main_title') ?></h1>
                        </div>
                        <div class="egg-hunt-btn-wrapper">
		                    <?php $title = get_sub_field('button')['title'];
		                    $url = get_sub_field('button')['url'];
		                    ?>
                            <div class="lightbox" >
                                <div class="form-container modal-container">
                                    <input id="modal-toggle-first" type="checkbox">
                                    <label class="egg-hunt-btn blue-to-rose egg-hunt-text-bold"  for="modal-toggle-first"><?= $title ?></label>
                                    <label class="modal-backdrop" for="modal-toggle-first"></label>
                                    <div class="modal-content">
                                        <label class="modal-close" for="modal-toggle-first">&#x2715;</label>
	                                    <?= gravity_form( $formID, false, false, false, '', true ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="hashtag">#<?=get_sub_field('hashtag') ?></h3>
                    </div>
                </div>
            </div>

		    <?php
                break;
            case 'game_description' : ?>
            <div id="how-it-works" class="game-description-wrapper container-fluid" style="background-image: url(<?= get_sub_field('background'); ?>)">
               <div class="container">
                   <div class="game-description">
                       <div class="game-description-titles ">
                           <p class="small-text"><?= get_sub_field('small_title') ?></p>
                           <h2 class="main-text"><?= get_sub_field('main_title') ?></h2>
                           <p class="egg-hunt-text day-of-prizes-description"><?= get_sub_field('description') ?></p>
                       </div>
                   </div>
                   <div class="game-steps-wrapper">
                       <div class="container game-steps">
                           <?php
                                $google = get_sub_field('google_play_link');
                                $app = get_sub_field('app_store_link');
                           ?>
			               <?php while( have_rows('steps') ): the_row();
				               $image = get_sub_field('step');
				               $title = get_sub_field('title');
				               $description = get_sub_field('description');
				               ?>
                               <div class="col-sx-12 col-sm-4 game-step">
                                   <img src="<?= $image ?>">

                                   <h3 class="game-step-title main-text"><?= $title ?></h3>
                                   <?php if (get_sub_field('google_store') || get_sub_field('app_store')) : ?>
                                       <div class="stores-icons">
                                           <div class="app-store-icon">
                                               <a href="<?= $app ?>" target="_blank"><img src="<?= get_sub_field('app_store')?>"></a>
                                           </div>
                                           <div class="google-play-icon">
                                               <a href="<?= $google ?>" target="_blank"><img src="<?= get_sub_field('google_store')?>"></a>
                                           </div>
                                       </div>
                                   <?php endif; ?>
                                   <div class="game-step-description egg-hunt-text"><?= $description ?></div>
                               </div>
			               <?php endwhile; ?>
                       </div>
                   </div>
                   <div class="game-final-step">
                       <div class="game-final-step-description">
                           <h3 class="main-text"><?= get_sub_field('finish') ?></h3>
                           <p class="egg-hunt-text"><?= get_sub_field('finish_description') ?></p>
                           <div class="egg-hunt-btn-wrapper">
		                       <?php $title = get_sub_field('button')['title'];
		                       $url = get_sub_field('button')['url'];
		                       ?>
                               <div class="lightbox" >
                                   <div class="form-container modal-container">
                                       <input id="modal-toggle-second" type="checkbox">
                                       <label class="egg-hunt-btn egg-hunt-text-bold"  for="modal-toggle-second"><?= $title ?></label>
                                       <label class="modal-backdrop" for="modal-toggle-second"></label>
                                       <div class="modal-content">
                                           <label class="modal-close" for="modal-toggle-second">&#x2715;</label>
				                           <?= gravity_form( $formID, false, false, false, '', true ); ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
		    <?php
                break;
            case 'prize' : ?>
                <div id="what-you-win" class="prizes-wrapper container-fluid" style="background-image: url(<?= get_sub_field('background'); ?>)">
                    <div class="container">
                        <div class="hunt-prizes">
                            <div class="girl-wrapper">
                                <img src="<?= get_sub_field('girl')?>" class="girl img-responsive">
                            </div>
                            <div class="prizes-titles">
                                <div class="prize-titles-headers">
                                    <p class="small-text"><?= get_sub_field('small_title') ?></p>
                                    <p class="small-text"><?= get_sub_field('prize') ?></p>
                                    <h2 class="main-text purple-title"><?= get_sub_field('main_title') ?></h2>
                                    <h2 class="main-text"><?= get_sub_field('main_title_white') ?></h2>
                                    </div>
                                <div class="golden-line-wrapper">
                                    <img src="<?= get_sub_field('golden_line')?>" class="img-responsive">
                                </div>
                                <p class="egg-hunt-text day-of-prizes-description"><?= get_sub_field('description') ?></p>
                                <h3 class="hashtag">#<?=get_sub_field('hashtag') ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

		    <?php break;
            case 'day_of_prize' : ?>
            <div class="hunt-day-of-prizes-wrapper container-fluid" style="background-image: url(<?= get_sub_field('background'); ?>)">
                <div class="container">
                    <div class="hunt-day-of-prizes">
                        <div class="golden-egg-wrapper">
                            <img src="<?= get_sub_field('golden_egg')?>" class="golden-egg img-responsive">
                        </div>
                        <div class="day-of-prizes-titles ">
                            <p class="small-text"><?= get_sub_field('small_title') ?></p>
                            <h2 class="main-text"><?= get_sub_field('main_title') ?></h2>
                            <p class="egg-hunt-text day-of-prizes-description"><?= get_sub_field('description') ?></p>
	                        <?php $title = get_sub_field('button')['title'];
	                        $url = get_sub_field('button')['url'];
	                        ?>
                            <div class="egg-hunt-btn-wrapper">
                                <div class="lightbox" >
                                    <div class="form-container modal-container">
                                        <input id="modal-toggle-third" type="checkbox">
                                        <label class="egg-hunt-btn egg-hunt-text-bold"  for="modal-toggle-third"><?= $title ?></label>
                                        <label class="modal-backdrop" for="modal-toggle-third"></label>
                                        <div class="modal-content">
                                            <label class="modal-close" for="modal-toggle-third">&#x2715;</label>
				                            <?= gravity_form( $formID, false, false, false, '',true ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


		    <?php break;
			case 'spring_difference' : ?>
				<div id="meet-spring" class="container">
					<div class="spring-difference-titles">
                        <p class="small-text"><?= get_sub_field('small_title') ?></p>
						<h2 class="main-text"><?= get_sub_field('main_title') ?></h2>
					</div>
					<div class="team-info-hunt">
						<div class="container-fluid">
							<div class="team-hunt-img col-sx-12 col-sm-6">
								<img src="<?= get_sub_field('team_photo')?>" class="img-responsive">
							</div>
							<div class="col-sx-12 col-sm-4">
                                <p class="team-info-hunt-desc egg-hunt-text"><?= get_sub_field('right_text')?></p>
                                <?php $title = get_sub_field('right_button')['title'];
                                      $url = get_sub_field('right_button')['url'];
                                ?>
								<div class="egg-hunt-btn-wrapper">
                                    <a class="egg-hunt-btn egg-hunt-text-bold" target="_blank" href="<?= $url ?>"><?= $title ?></a>
                                </div>
							</div>
						</div>
					</div>
                    <div class="egg-hunt-advantages-wrapper">
                        <div class="container egg-hunt-advantages">
		                    <?php while( have_rows('items') ): the_row();
			                    $image = get_sub_field('image');
			                    $title = get_sub_field('title');
			                    $description = get_sub_field('description');
			                    ?>
                                <div class="col-sx-12 col-sm-4 egg-hunt-advantage-item">
                                    <img src="<?= $image ?>">
                                    <h3 class="egg-hunt-advantages-title main-text"><?= $title ?></h3>
                                    <div class="egg-hunt-advantages-description egg-hunt-text"><?= $description ?></div>
                                </div>
		                    <?php endwhile; ?>
                        </div>
                    </div>
				</div>


			<?php break;
			case 'testimonial' : ?>
			   <div class="egg-hunt-testimonials">
                    <?php
                        Load::organisms( 'testimonials/testimonials', [
                            'items' => get_sub_field( 'testimonials' ),
                            'images' => get_sub_field( 'video' ),
                        ]);
                        ?>
               </div>
				<?php
                break;
            case 'last_hunt': ?>
                <div class="prizes-wrapper last-hunt-wrapper container-fluid" style="background-image: url(<?= get_sub_field('background'); ?>)">
                    <div class="container">
                        <div class="last-hunt">
                            <div class="spring-difference-titles">
                                <p class="small-text"><?= get_sub_field('small_title') ?></p>
                                <h2 class="main-text"><?= get_sub_field('main_title') ?></h2>
                            </div>

                            <div class="egg-video last-hunt-video">
                                <div class="video-player embed-responsive embed-responsive-16by9">
                                    <iframe width="560" height="315" src="<?= get_sub_field('video'); ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>

                            <div class="last-hunt">
                                <h3 class="hashtag">#<?=get_sub_field('hashtag') ?></h3>
                            </div>
                            <div class="egg-hunt-btn-wrapper">
	                            <?php $title = get_sub_field('button')['title'];
	                            $url = get_sub_field('button')['url'];
	                            ?>
                                <div class="lightbox">
                                    <div class="form-container  modal-container">
                                        <input id="modal-toggle-four" type="checkbox">
                                        <label class="egg-hunt-btn egg-hunt-text-bold"  for="modal-toggle-four"><?= $title ?></label>
                                        <label class="modal-backdrop" for="modal-toggle-four"></label>
                                        <div class="modal-content">
                                            <label class="modal-close" for="modal-toggle-four">&#x2715;</label>
				                            <?= gravity_form( $formID, false, false, false, '', false ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="egg-hunt-btn-wrapper button-right">
		                        <?php $title = get_sub_field('button_rules')['title'];
		                        $url = get_sub_field('button_rules')['url'];
		                        ?>
                                <div class="lightbox" >
                                    <div class="modal-container">
                                        <input id="modal-toggle" type="checkbox">
                                        <label class="egg-hunt-btn egg-hunt-text-bold egg-hunt-btn-grey"  for="modal-toggle"><?= $title ?></label>
                                        <label class="modal-backdrop" for="modal-toggle"></label>
                                        <div class="modal-content">
                                            <label class="modal-close" for="modal-toggle">&#x2715;</label>
                                            <p class="egg-hunt-text"><?= get_sub_field('contest_rules')?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
                break;

		}
	}
} ?>

<div class="egg-hunt-footer">
    <script>
        $('.blue-text.anchored-link').click(function(e) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 600);
            return false;
        })
    </script>
    <?php get_footer(); ?>
</div>
