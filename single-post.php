<?php
  /*
  * Template Name: Index
  */

  get_header();
?>

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>

        <!-- Section 1 -->
        <div>
            <?= get_header_banner(get_the_ID()); ?>
        </div>

        <div class="st-p">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>


<?php
    }wp_reset_postdata(); // end while
}//end if
else{
    //No content Found
} // end else
?>

<?php get_footer(); ?>
