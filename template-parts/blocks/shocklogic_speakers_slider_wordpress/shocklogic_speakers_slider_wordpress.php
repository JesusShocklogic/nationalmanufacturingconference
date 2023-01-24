<?php
//Initialize Swiper
wp_enqueue_style("swiper-css");
wp_enqueue_script("swiper-js");
wp_enqueue_style("modal-css");

$shocklogic_speakers_slider_wordpress_group = get_field('shocklogic_speakers_slider_wordpress_group');
$wp_query = get_query($shocklogic_speakers_slider_wordpress_group);
$block_id = $block['id'];
$background = $shocklogic_speakers_slider_wordpress_group['background_colour'];
$avatar = default_speaker_avatar();

if (isset($shocklogic_speakers_slider_wordpress_group) && $shocklogic_speakers_slider_wordpress_group != null) { ?>
	<div class="shocklogic_speakers_slider_wordpress" id="<?= $block_id ?>">
		<div class="shocklogic_speakers_slider_wordpress_wrapper">
			<div class="shocklogic_speakers_slider_wordpress_wrapper_title">
				<?= $shocklogic_speakers_slider_wordpress_group['title'] ?>
			</div>
			<div class="shocklogic_speakers_slider_wordpress_wrapper_speakers">
				<div class="swiper mySwiper">
					<div class="swiper-wrapper">
						<?php
						if ($wp_query->have_posts()) {
							$content = "";
							while ($wp_query->have_posts()) {
								$wp_query->the_post();
								$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

								$speaker_wordpress_group = get_field('speaker_wordpress_group', get_the_ID());
								if (((isset($speaker_wordpress_group['name']) && $speaker_wordpress_group['name'] != "") || (isset($speaker_wordpress_group['last_name']) && $speaker_wordpress_group['last_name'] != ""))) {
									$title = ($speaker_wordpress_group['name'] ?? '') . " " . ($speaker_wordpress_group['last_name'] ?? '');
								} else {
									$title = get_the_title();
								} ?>
								<div class="swiper-slide">
									<a data-bs-toggle="modal" data-bs-target="#<?= "speaker" . get_the_ID() ?>">
										<img src="<?= $image_url ?>" alt="">
									</a>
									<div class="shocklogic_speakers_slider_wordpress_wrapper_speakers_name"><?= $title ?></div>
								</div>

						<?php
							}; //while
							wp_reset_query();
						} //if
						else {
							echo "No posts were found";
						}
						?>
					</div>
					<?php
					/*
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
					*/
					?>
				</div>
			</div>

			<div class="shocklogic_speakers_slider_wordpress_wrapper_bottom_text">
				<?= $shocklogic_speakers_slider_wordpress_group['bottom_text'] ?>
			</div>
		</div>
		<div class="shocklogic_speakers_slider_wordpress_wrapper_modals">
			<?php
			if ($wp_query->have_posts()) {
				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;
					$speaker_wordpress_group = get_field('speaker_wordpress_group', get_the_ID());
					if (((isset($speaker_wordpress_group['name']) && $speaker_wordpress_group['name'] != "") || (isset($speaker_wordpress_group['last_name']) && $speaker_wordpress_group['last_name'] != ""))) {
						$title = ($speaker_wordpress_group['name'] ?? '') . " " . ($speaker_wordpress_group['last_name'] ?? '');
					} else {
						$title = get_the_title();
					} ?>

					<!-- Modal -->
					<div class="modal fade" id="<?= "speaker" . get_the_ID() ?>" tabindex="-1" aria-labelledby="<?= "speaker" . get_the_ID() ?>Label" aria-hidden="true">
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
										<div><?= ($speaker_wordpress_group['job_title'] ?? '') ?></div>
										<div><?= ($speaker_wordpress_group['company_organizarion'] ?? '') ?></div>
									</div>
									<div class="modal_dialog_content_body_right">
										<div class="modal_dialog_content_body_right_content">
											<?php the_content() ?>
										</div>
									</div>
								</div>
								<div class="modal-footer"></div>
							</div>
						</div>
					</div>

			<?php
				}; //while
				wp_reset_query();
			} //if
			?>
		</div>
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