<?php
/*
* Template Name: Single Sponsors
*/
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <!-- Section 1 -->
        <div>
            <?= get_header_banner(get_the_ID()); ?>
        </div>

        <!-- Section 2 -->
        <div class="st-p">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <img style="max-width: 400px;" class="w-50 img-fluid d-block m-auto" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                    </div>
                    <div class="col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    wp_reset_postdata(); // end while
} //end if
else {
    //No content Found
} // end else

get_footer(); ?>