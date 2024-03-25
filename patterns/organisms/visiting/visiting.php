<?php

/**
 * Providing our patients
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
    'title'  => '',
    'image'  => [],
    'background_image'  => [],
    'address'  => '',
]); ?>
<section class="visiting" style="background-image: url(<?= esc_url($args['background_image']['url']); ?>);">
    <div class="container">
        <div class="visiting__title">
            <?= wp_kses_post($args['title']); ?>
        </div>
        <div class="visiting__wrapper">
            <div class="visiting__img">
                <img src="<?= $args['image']['url']; ?>" alt="<?= $args['image']['alt']; ?>">
            </div>
            <div class="visiting__desc">
                <?= wp_kses_post($args['address']); ?>
            </div>
        </div>
    </div>
</section>