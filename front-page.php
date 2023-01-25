<?php
/*
* Template Name: Front Page
*/

get_header();
include_slick_style();

$settings = get_id_by_slug('settings');

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <!-- Section 1 -->
        <div>
            <?= get_header_banner(get_the_ID()); ?>
        </div>

        <!-- Section 2 -->
        <?php
        if (get_field('section_2_enable')) { ?>
            <div class="st-p bg-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="title"><?php the_field('s2_title'); ?></div>
                            <div><?php the_field('s2_content'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Section 3 - Speakers -->
        <?php if (get_field('section_3_enable')) { ?>
            <div class="st-p bg-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 title"><?php the_field('s3_title'); ?></div>
                        <div class="col-12">
                            <?= get_template_part('tpl/speakers', 'index') ?>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <?php print_button('s3_button', get_the_ID()); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php the_content() ?>


        <!-- Section 7 -->
        <?php if (get_field('section_7_enable')) { ?>
            <div class="st-p bg-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="title"><?php the_field('s6_title'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


<?php
    }
    wp_reset_postdata(); // end while
} //end if
else {
    //No content Found
} // end else

get_footer();
include_slick_script();
include_slick_settings();
?>