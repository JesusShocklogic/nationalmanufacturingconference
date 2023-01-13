<?php
/*
 * The Variable category is been received from the page caller of this template part using set_query_var
 */
$cat = get_query_var('category');
$blog_ID = get_current_blog_id();
$custom_Prefix = $wpdb->base_prefix.$blog_ID;
$table = $custom_Prefix."synclogic_speakers";
$avatar = get_template_directory_uri()."/img/avatar-placeholder2.png";
if($cat)
    $speakers = synclogic_get_all_speakers_by_category($cat);
else
    $speakers = synclogic_get_all_speakers_authors();
?>
<style>
.ratio-1x1 {
    --bs-aspect-ratio: 100%;
}
.ratio {
    position: relative;
    width: 100%;
}
.ratio::before {
    display: block;
    padding-top: var(--bs-aspect-ratio);
    content: "";
}
.ratio>* {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

<div class="row text-center" id="speakerLoop">
    <?php
    /* Speaker pictures */
    foreach($speakers as $cont => $speaker){
        $image = !empty($speaker->image_profile) ? $speaker->image_profile : $avatar;
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-20 pb-3" id="speaker">
            <!-- Button trigger modal -->
            <a class="d-block" data-toggle="modal" data-target="#speaker-<?= $cat ?>-<?= $cont; ?>">
                <div class="ratio ratio-1x1" style="margin: 0 auto;">
                    <img style="box-shadow: 4px 4px 10px #0000001A;object-fit: cover;" class="d-block mx-auto img-fluid rounded-circle" src="<?= $image ?>" alt="#speaker-<?= $cat ?>-<?= $cont; ?>" >
                </div>
                <div>
                    <div class="pt-3"><b><h5><?= $speaker->speaker_name." ".$speaker->speaker_family_name; ?></h5></b></div>
                </div>
            </a>
        </div>
        <?php
    } ?>

</div>

<?php
/* Speaker Modals */
foreach($speakers as $cont => $speaker){
    $image = !empty($speaker->image_profile) ? $speaker->image_profile : $avatar;
    ?>
    <!-- Modal -->
    <div class="modal fade" id="speaker-<?= $cat ?>-<?= $cont; ?>" tabindex="-1" role="dialog" aria-labelledby="speaker-<?= $cont; ?>Title" aria-hidden="true">
        <div class="modal-dialog align-self-center bg-white px-5 py-lg-5" role="document">
            <div class="row text-center position-relative">
                <div class="col-12">
                    <div class="ratio ratio-1x1 w-50" style="margin: 0 auto;">
                        <img style="box-shadow: 4px 4px 10px #0000001A;object-fit: cover;" class="d-block mx-auto img-fluid rounded-circle" src="<?= $image ?>" alt="#speaker-<?= $cat ?>-<?= $cont; ?>">
                    </div>
                </div>
                <div class="col-12 pt-3 pb-1 dcolor_1_color">
                    <b><h4 style="font-family: lato-bold; margin-bottom: 0;"><?= $speaker->speaker_name." ".$speaker->speaker_family_name; ?> </h4></b>
                </div>
                <div class="col-12" style="font-family: lato-italic; color: #848484">
                    <div> <?php echo $speaker->job_title ?> </div>
                    <div> <?php echo $speaker->company; ?> </div>
                </div>
                <div class="col-12 pt-3">
                    <div class="text-left"> <?php echo $speaker->biography; ?> </div>
                </div>
            </div>

            <button type="button" class="close position-absolute dcolor_1_color" data-dismiss="modal" aria-label="Close" style="right: 1rem; top: 0.5rem;">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    </div>
    <?php
} ?>

</div>