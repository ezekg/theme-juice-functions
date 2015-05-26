<?php

/**
 * Remove the WordPress version from RSS feeds
 */
add_filter( "the_generator", "__return_false" );

/**
 * Remove admin bar
 */
add_filter( "show_admin_bar", "__return_false" );

/**
 * Fix issue with pagination redirects when on static home page template
 *
 * @TODO - This requires that your permalinks be set to '/%postname%/'
 *  or it will just redirect all pagination to the home page.
 *
 * @see https://core.trac.wordpress.org/ticket/15551
 */
add_filter( "redirect_canonical", function( $url ) {

    // Return url if we're on admin pages - as far as I know this shouldn't
    //  happen, but this is put here for added clarity.
    if ( is_admin() || $GLOBALS["pagenow"] === "wp-login.php" ) {
        return $url;
    }

    // Make sure permalinks are set to '/%postname%/'
    if ( get_option( "permalink_structure" ) === "/%postname%/" ) {

        if ( is_singular() ) {
            $url = false;
        }
    }

    return $url;
});
