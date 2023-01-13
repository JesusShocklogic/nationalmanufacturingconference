<?php
$data_group = get_field('data_group');
$wp_query = get_query($data_group);
?>

<div class="sponsorsCategory">
    <div class="sponsorsCategory_wrapper">
        <?php if ($data_group['top_content']) : ?>
            <div class="sponsorsCategory_wrapper_top">
                <?= $data_group['top_content'] ?>
            </div>
        <?php endif; ?>

        <div class="sponsorsCategory_wrapper_sponsors">
            <?php
            if ($wp_query->have_posts()) {
                $content = "";
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    $image = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : ""; ?>

                    <div class="sponsorsCategory_wrapper_sponsors_sponsor">
                        <div class="sponsorsCategory_wrapper_sponsors_sponsor_image">
                            <img src="<?= $image ?>" alt="">
                        </div>
                        <div class="sponsorsCategory_wrapper_sponsors_sponsor_content">
                            <?php the_content() ?>
                        </div>
                    </div>

            <?php
                }; //while
                wp_reset_query();
            } else {
                echo "No posts were found";
            }
            ?>
        </div>

        <?php if ($data_group['bottom_content']) : ?>
            <div class="sponsorsCategory_wrapper_bottom">
                <?= $data_group['bottom_content'] ?>
            </div>
        <?php endif; ?>

    </div>
</div>