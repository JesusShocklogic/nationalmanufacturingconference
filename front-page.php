<?php
/*
* Template Name: Front Page
*/

get_header();
include_slick_style();

$settings = get_id_by_slug('settings');
?>

<?php
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

        <!-- Section 4 -->
        <?php if (get_field('section_4_enable')) { ?>
            <div class="st-p bg-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="title"><?php the_field('s4_title'); ?></div>
                            <div><?php the_field('s4_content'); ?></div>
                        </div>
                        <div class="col-12">
                            <?= get_template_part('tpl/partners', 'index') ?>
                        </div>
                        <div class="col-12 text-center pt-5">
                            <?php print_button('s4_button', get_the_ID()); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Section 5 - Blog-->
        <?php
        if (get_field('display_blog')) {
        ?>
            <div class="st-p bg-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="title"><?php the_field('s5_title'); ?></div>
                        </div>
                        <div class="col-12">
                            <?= get_template_part('tpl/blog', 'index') ?>
                        </div>
                        <div class="col-12 text-right pt-5">
                            <?php $link = get_field('s5_link'); ?>
                            <a class="readMore" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"><?= $link['title'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <!-- Section 6 -->
        <?php
        if (get_field('section_6_enable')) {

            $sponsors = get_field('sponsors_group');
            $published_posts = wp_count_posts("sponsors");
            if ($sponsors['title'] || $published_posts->publish > 0) {
        ?>
                <div class="st-p">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="title"><?php echo $sponsors['title'] ?></div>
                                <div><?php echo $sponsors['text'] ?></div>
                            </div>
                            <div class="col-12">
                                <?= get_template_part('tpl/sponsors', 'index') ?>
                            </div>
                            <div class="col-12 text-center pt-5">
                                <?php
                                $link = $sponsors['link'];
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                    <a class="btn px-4 py-2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>

        <!-- Section 7 -->
        <?php if (get_field('section_7_enable')) { ?>
            <div class="st-p bg-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="title"><?php the_field('s6_title'); ?></div>
                        </div>
                        <div class="col-12">
                            <?= get_template_part('tpl/testimonials', 'index') ?>
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
?>
<?php
get_footer();
include_slick_script();
include_slick_settings();
?>
