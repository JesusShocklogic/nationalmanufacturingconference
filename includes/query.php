<?php

function get_query($args)
{
    global $wp_query;

    $post_type = (isset($args['post_types']) && $args['post_types'] != "") ? $args['post_types'] : "post";
    $cat = (isset($args['post_categories'])) ? $args['post_categories'] : null;
    $posts_per_page = isset($args['posts_per_page']) ? $args['posts_per_page'] : 3;

    if (isset($args['posts_per_page'])) {
        if ($args['posts_per_page'] == 0) {
            $posts_per_page = "";
        } else {
            $posts_per_page = $args['posts_per_page'];
        }
    }

    $query_args = array(
        'post_type'         => $post_type,
        'posts_per_page'   => $posts_per_page,
        'cat' => $cat,
        'offset'            => 0,
        'post_status'      => 'publish',
        'orderby'           => 'date', // for example'orderby' => 'name'
        'order'             => 'DESC', // ASC ascended , DESC descend
        'post__not_in' => array(get_the_ID()), //Avoid showing current post
    );

    $wp_query = new WP_Query($query_args);

    return $wp_query;
}
