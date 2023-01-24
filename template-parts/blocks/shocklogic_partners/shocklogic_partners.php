<?php
wp_enqueue_style("modal-partners");

$shocklogic_partners_group = get_field('shocklogic_partners_group');
$wp_query = get_query($shocklogic_partners_group);
$block_id = $block['id'];
$background = $shocklogic_partners_group['background_colour'];
$avatar = default_partners_avatar();

if (isset($shocklogic_partners_group) && $shocklogic_partners_group != null) { ?>
	<div class="shocklogic_partners <?= $shocklogic_partners_group['spacing'] ?>" id="<?= $block_id ?>">
		<div class="shocklogic_partners_wrapper">
			<div class="shocklogic_partners_wrapper_title">
				<?= $shocklogic_partners_group['title'] ?>
			</div>
			<div class="shocklogic_partners_wrapper_partners">
				<?php
				if ($wp_query->have_posts()) {
					$content = "";
					while ($wp_query->have_posts()) {
						$wp_query->the_post();
						$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
						<div class="shocklogic_partners_wrapper_partners_partner">
							<?php
							//click behaviour
							if ($shocklogic_partners_group['click_behaviour'] == "internal") { ?>
								<a href="<?php the_permalink() ?>">
									<img src="<?= $image_url ?>" alt="">
								</a>
							<?php
							} elseif ($shocklogic_partners_group['click_behaviour'] == "external") {
								$data = get_field('data', get_the_ID()); ?>
								<a href="<?= $data['external_url'] ?? '#' ?>" target="_blank">
									<img src="<?= $image_url ?>" alt="">
								</a>
							<?php
							} elseif ($shocklogic_partners_group['click_behaviour'] == "modal") { ?>
								<a data-bs-toggle="modal" data-bs-target="#<?= "partner" . get_the_ID() ?>">
									<img src="<?= $image_url ?>" alt="">
								</a>
							<?php
							}
							?>
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
			if ($shocklogic_partners_group['bottom_text']) { ?>
				<div class="shocklogic_partners_wrapper_bottom_text">
					<?= $shocklogic_partners_group['bottom_text'] ?>
				</div>
			<?php
			}
			?>
		</div>
	</div>

	<?php
	/*
	* Printing modals
	*/
	if ($shocklogic_partners_group['click_behaviour'] == "modal") { ?>
		<div class="shocklogic_partners_wrapper_modals">
			<?php
			if ($wp_query->have_posts()) {
				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

					$title = get_the_title(); ?>

					<!-- Modal -->
					<div class="modal fade" id="<?= "partner" . get_the_ID() ?>" tabindex="-1" aria-labelledby="<?= "partner" . get_the_ID() ?>Label" aria-hidden="true">
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
									</div>
									<div class="modal_dialog_content_body_right">
										<div class="modal_dialog_content_body_right_content">
											<?php the_content() ?>
										</div>
									</div>
								</div>
								<div class="modal-footer d-none"></div>
							</div>
						</div>
					</div>

			<?php
				}; //while
				wp_reset_query();
			} //if
			?>
		</div>
<?php
	} //if click behaviour == modal

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