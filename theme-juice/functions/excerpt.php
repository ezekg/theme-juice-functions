<?php

/**
 * Get shortened content by num words
 *
 * @param {Integer} $count   (42) - Number of words in shortened content
 * @param {Bool}    $display      - Automatically echo output
 *
 * @return {String} - Shorted content
 */
function tj_excerpt( $count = 42, $display = true ) {

    $content = strip_tags( do_shortcode( get_the_content() ) );
    $output = implode( "", array_slice( preg_split( "/([\s,\.;\?\!]+)/", $content,  ( $count * 2 + 1 ), PREG_SPLIT_DELIM_CAPTURE ), 0, ( $count * 2 - 1 ) ) );
    $output .= str_word_count( $content ) > $count ? "&hellip;" : "";

    // Echo outout if $display
    if ( $display ) {
        echo $output;
    } else {
        return $output;
    }
}
