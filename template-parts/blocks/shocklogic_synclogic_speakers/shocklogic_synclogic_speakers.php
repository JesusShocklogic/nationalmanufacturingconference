<?php
wp_enqueue_style("modal-css");

$shocklogic_synclogic_speakers_group = get_field('shocklogic_synclogic_speakers_group');
$block_id = $block['id'];
$background = $shocklogic_synclogic_speakers_group['background_colour'];
$avatar = default_speaker_avatar();

$speakers = null;
if ($shocklogic_synclogic_speakers_group['content_select'] == "all") {
	$speakers = synclogic_get_all_speakers();
}
if ($shocklogic_synclogic_speakers_group['content_select'] == "categories") {
	$categories = "";
	$categories = array_map(function ($category) {
		return $category['category'];
	}, $shocklogic_synclogic_speakers_group['categories']);

	$categories = implode(",", $categories);
	$speakers = synclogic_get_all_speakers_by_categories($categories);
}

if (isset($shocklogic_synclogic_speakers_group) && $shocklogic_synclogic_speakers_group != null) { ?>
	<div class="shocklogic_synclogic_speakers" id="<?= $block_id ?>">
		<div class="shocklogic_synclogic_speakers_wrapper">
			<div class="shocklogic_synclogic_speakers_wrapper_title">
				<?= $shocklogic_synclogic_speakers_group['title'] ?>
			</div>
			<div class="shocklogic_synclogic_speakers_wrapper_speakers">
				<?php
				if ($speakers) {
					$content = "";
					foreach ($speakers as $key => $speaker) {
						$image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;

						$title = $speaker->speaker_name . " " . $speaker->speaker_family_name;
				?>
						<div class="shocklogic_synclogic_speakers_wrapper_speakers_speaker">
							<a data-bs-toggle="modal" data-bs-target="#speaker-<?= $speaker->speaker_id ?>">
								<img src="<?= $image_url ?>" alt="">
							</a>
							<div class="shocklogic_synclogic_speakers_wrapper_speakers_speaker_name"><?= $title ?></div>
						</div>
				<?php
					} //foreach
				} //if
				else {
					echo "No posts were found";
				}
				?>
			</div>
			<?php
			if ($shocklogic_synclogic_speakers_group['bottom_text']) { ?>
				<div class="shocklogic_synclogic_speakers_wrapper_bottom_text">
					<?= $shocklogic_synclogic_speakers_group['bottom_text'] ?>
				</div>
			<?php
			}
			?>
		</div>
	</div>

	<div class="shocklogic_synclogic_speakers_wrapper_modals">
		<?php
		if ($speakers) {
			$content = "";
			foreach ($speakers as $key => $speaker) {
				$image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;

				$title = $speaker->speaker_name . " " . $speaker->speaker_family_name;
		?>

				<!-- Modal -->
				<div class="modal fade" id="speaker-<?= $speaker->speaker_id ?>" tabindex="-1" aria-labelledby="speaker-<?= $speaker->speaker_id ?>Label" aria-hidden="true">
					<div class="modal-dialog modal-xl modal_dialog">
						<div class="modal-content modal_dialog_content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body modal_dialog_content_body">
								<div class="modal_dialog_content_body_left">
									<div class="modal_dialog_content_body_left_image">
										<img src="<?= $image_url ?>" alt="">
									</div>
									<strong><?= $title ?></strong>
									<div><?= ($speaker->job_title ?? '') ?></div>
									<div><?= ($speaker->company ?? '') ?></div>
								</div>
								<div class="modal_dialog_content_body_right">
									<div class="modal_dialog_content_body_right_content">
										<?= $speaker->biography ?>
									</div>
								</div>
							</div>
							<div class="modal-footer d-none"></div>
						</div>
					</div>
				</div>

		<?php
			}; //foreach
		} //if
		?>
	</div>
<?php
}
?>

<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background;
	}
	ITEM;

	echo $classes;

	?>
</style>