<?php
/*
 * Get ID of Pages by its slug.
 * This function is used to get the ID of the Settings Page. and so, been able to use all the features indicated in it.
 */
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}