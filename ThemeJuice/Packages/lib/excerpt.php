<?php

/**
 * Get shortened content by num words
 *
 * @param {Int}  $count   (42) - Number of words in shortened content
 * @param {Bool} $display      - Automatically echo output
 *
 * @return {String} - Shorted content
 */
function tj_excerpt( $count = 42, $display = true ) {

  // Trim content after shortcodes are rendered
  $output = wp_trim_words( do_shortcode( get_the_content() ), $count );

  // Echo output if $display
  if ( $display ) {
    echo $output;
  } else {
    return $output;
  }
}
