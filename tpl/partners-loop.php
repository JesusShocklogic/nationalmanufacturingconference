<?php

$cat_arg = [
    'post_type'         => 'partner',
    'post_status'      => 'publish',
    'order'         => 'DESC'
];

$categories = get_categories($cat_arg); ?>
<div class="row align-items-center justify-content-center" id="partnerRow">

    <?php
    foreach ($categories as $category) { ?>

        <?php
        $args = array(
            'post_type'     => 'partner',
            'post_status'   => 'publish',
            'order'         => 'DESC',
            'cat'           => $category->term_id
        );

        $wp_query = new WP_Query( $args );
        if($wp_query->have_posts()){ ?>

            <div class="col-12">
                <h1 class="title text-center"><?= $category->name; ?></h1>
            </div>

            <?php
            while ($wp_query->have_posts())
            { $wp_query->the_post(); ?>

                <div class="col-10 col-sm-6 col-md-4 col-lg-2">
                    <img class="w-100 d-block img-fluid mx-auto" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-10">
                    <?= get_the_content(); ?>
                </div>
                <div class="d-block w-100 py-5"></div>

                <?php
            }; wp_reset_query();
        }
    }
    ?>
</div>
