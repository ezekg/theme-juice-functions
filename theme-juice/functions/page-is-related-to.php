<?php

/**
 * Checks if page is $slug, or if it is related to $slug
 *
 * @param {String} $slug - Slug of page to check
 *
 * @return {Bool}
 */
function tj_page_is_related_to( $slug ) {
    global $post;

    // Get page by slug
    $page = get_page_by_path( $slug );

    // Check if it's valid
    if ( $page ) {
        return ( is_page( $slug ) || "$page->ID" === "$post->post_parent" );
    } else {
        return false;
    }
}
