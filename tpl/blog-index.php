<?php
global $wp_query;

$args = array(
    'post_type'         => 'post',
    'post_status'      => 'publish',
    'order'             => 'DESC',
    'posts_per_page'     => '4'
);
// query
$wp_query = new WP_Query( $args ); ?>

<div class="row" id="blogRow_index">

    <?php

    while ($wp_query->have_posts())
    { $wp_query->the_post(); ?>

        <div class="col-12 col-lg-6" style="padding: 10px 10px">
            <a style="background-color: black;" class="d-block overflow-hidden position-relative" href="<?php the_permalink();?>">
                <img class="d-block w-100" src="<?= get_the_post_thumbnail_url()?>" alt="">
                <div id="blogTitle"><h4 class="align-self-center text-center text-lg-right w-100 mb-0"><?php the_title(); ?></h4></div>
            </a>
        </div>

        <?php
    }; wp_reset_query();

    ?>
</div>
