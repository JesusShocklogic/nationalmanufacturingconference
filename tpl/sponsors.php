<?php
/*
* Template Name: Sponsors
*/
get_header(); ?>
<style>
	.sponsor_image2{
		width: 100%;
	}
@media (min-width: 576px) {
	.sponsor_image2{
		width: 70%;
	}
	}

@media (min-width: 768px) {
	.sponsor_image2{
		width: 50%;
	}
	}

@media (min-width: 992px) {
	.sponsor_image2{
		width: 30%;
	}
	}

@media (min-width: 1200px) {  }

@media (min-width: 1400px) {  }

</style>
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

        $args = [
            'post_type'         => 'sponsors',
            'post_status'      => 'publish',
            'order'         => 'DESC'
        ];
        ?>

        <div class="st-p bg-<?= $cont; ?>">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center" id="partnerRow">

                    <div class="gutenberg-content w-100">
                        <?php the_content(); ?>
                    </div>
                    <?php

                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) { ?>

                        <?php
                        while ($wp_query->have_posts()) {
                            $wp_query->the_post(); ?>

                            <div class="col-10 pb-4">
                                <img class="d-block img-fluid mx-auto sponsor_image2" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                            </div>
                            <div class="col-12">
                                <?= get_the_content(); ?>
                            </div>
                            <div class="d-block w-100 py-5"></div>

                    <?php
                        };
                        wp_reset_query();
                    } ?>
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
?>
<?php
get_footer();
?>