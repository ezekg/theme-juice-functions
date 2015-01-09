<?php

/**
 * Checks if page is $slug, or if it is related to $slugs
 *
 * @param {Array|String} $slugs - Single slug or array of slugs of pages
 *
 * @return {Bool}
 */
function tj_page_is_related_to( $slugs ) {
    global $post;

    // Check if we're dealing with an array of pages
    if ( ! is_array( $slugs ) ) {
        $slugs = array( $slugs );
    }

    foreach ( $slugs as $slug ) {

        // Get page by slug
        $page = get_page_by_path( $slug );

        // Check if it's a valid page
        if ( $page ) {

            // Check if page is related to $slug
            $result = ( is_page( $slug ) || "$page->ID" === "$post->post_parent" );

            if ( $result ) {
                return $result;
            }
        }
    }

    return false;
}
