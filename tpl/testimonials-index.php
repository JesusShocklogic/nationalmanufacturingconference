<?php
global $wp_query;

$args = array(
    'post_type'         => 'testimonial',
    'post_status'      => 'publish',
    'order'             => 'DESC',
    'posts_per_page'     => '3'
);
// query  
$wp_query = new WP_Query( $args ); ?>

<div class="row position-relative" id="testimonialRow">
    

    <?php

    while ($wp_query->have_posts())
    { $wp_query->the_post(); ?>

        <div class="col-12 col-lg-4 px-4 py-4 d-flex align-items-center">
            <div class="testimonialItem">
                <div class="align-self-center">
                    <div><?php the_content();?></div>
                    <div class="pt-3 text-right" style="font-family: Lato-regular;"> - <?php the_title(); ?></div>
                </div>
            </div>
        </div>

        <?php
    }; wp_reset_query();

    ?>
</div>
