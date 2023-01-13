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
<?php
$blog_ID = get_current_blog_id();
$custom_Prefix = $wpdb->base_prefix . $blog_ID;
$table = $custom_Prefix . "synclogic_speakers";
$speakers = synclogic_get_all_speakers_authors();
?>

<div class="slider-speakers-index text-center">
    <?php
    /* Speaker pictures */
    foreach ($speakers as $cont => $speaker) {
    ?>
        <div id="speaker">
            <!-- Button trigger modal -->
            <a class="d-block" data-toggle="modal" data-target="#speaker-<?= $cont; ?>">
                <div class="ratio ratio-1x1 text-center w-speakers-div" style="margin: 0 auto;">
                    <img style="box-shadow: 4px 4px 10px #0000001A;object-fit: cover;" class="d-block mx-auto img-fluid rounded-circle" src="<?= $speaker->image_profile; ?>" alt="#speaker-<?= $cont; ?>">
                </div>
                <div>
                    <div class="pt-3" id="name"><b>
                            <h5><?= $speaker->speaker_name . " " . $speaker->speaker_family_name; ?> </h5>
                        </b></div>
                </div>
            </a>
        </div>
    <?php
        if ($cont == 8) {
            break;
        }
    } ?>
	
</div>

<style>
	.w-speakers-div{
		width: 16vw;
	}

	@media (max-width: 758px) {
		.w-speakers-div{
			width: 200px;
		}
	}
</style>

<?php
/* Speaker Modals */
$cont = 0;
foreach ($speakers as $cont => $speaker) {
?>
    <!-- Modal -->
    <div class="modal fade" id="speaker-<?= $cont; ?>" tabindex="-1" role="dialog" aria-labelledby="speaker-<?= $cont; ?>Title" aria-hidden="true">
        <div class="modal-dialog align-self-center bg-white px-5 py-lg-5" role="document">
            <div class="row text-center position-relative">
                <div class="col-12">
                    <div class="ratio ratio-1x1 text-center" style="width: 50%;margin: 0 auto;">
                        <img style="box-shadow: 4px 4px 10px #0000001A;object-fit: cover;" class="d-block mx-auto img-fluid rounded-circle" src="<?= $speaker->image_profile; ?>" alt="#speaker-<?= $cont; ?>">
                    </div>
                </div>
                <div class="col-12 pt-3 pb-1 dcolor_1_color">
                    <b>
                        <h4 style="font-family: lato-bold; margin-bottom: 0;"><?= $speaker->speaker_name . " " . $speaker->speaker_family_name; ?></h4>
                    </b>
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
    if ($cont == 8) {
        break;
    }
} ?>

</div>