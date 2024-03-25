<?php

/**
 * Awards
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
    'title'  => '',
    'repeater'  => [],
]); ?>
<section class="awards container">
    <div class="awards__title">
        <?= wp_kses_post($args['title']); ?>
    </div>
    <div class="awards__wrapper">
        <?php foreach ($args['repeater'] as $item) : ?>
            <div class="awards__item">
                <?= wp_kses_post($item['item']); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>