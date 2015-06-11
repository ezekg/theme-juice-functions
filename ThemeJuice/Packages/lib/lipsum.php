<?php

/**
 * Generate some lipsum
 *
 * @param {Int}    $amount (1)     - Amount of type
 * @param {String} $what   (paras) - Type of lipsum
 *
 * @example
 *   ```haml
 *   // 1 paragraph
 *   = tj_lipsum()
 *
 *   // 5 paragraphs
 *   = tj_lipsum(5)
 *
 *   // 25 words
 *   = tj_lipsum(25, "words")
 *   ```
 *
 * @return {String|False}
 */
function tj_lipsum( $amount = 1, $what = "paras" ) {
  $request = "http://www.lipsum.com/feed/json?amount={$amount}&what={$what}";

  if ( $response = json_decode( file_get_contents( $request ) ) ) {
    return $response->feed->lipsum;
  } else {
    return false;
  }
}

/**
 * @see tj_lipsum
 */
function tj_dummy_text( $amount = 1, $what = "paras" ) {
  return tj_lipsum( $amount, $what );
}
