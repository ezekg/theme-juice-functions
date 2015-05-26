<?php

/**
 * Generate some lipsum
 *
 * @param {Int}     $amount (1)     - Amount of type
 * @param {String}  $what   (paras) - Type of lipsum
 *
 * @example
 *   ```php
 *   // 1 paragraph
 *   echo tj_lipsum()
 *
 *   // 5 paragraphs
 *   echo tj_lipsum(5)
 *
 *   // 25 words
 *   echo tj_lipsum(25, "words")
 *   ```
 *
 * @return {String|False}
 */
function tj_lipsum( $amount = 1, $what = "paras" ) {
  $request = "http://www.lipsum.com/feed/json?amount=$amount&what=$what";

  if ( $response = json_decode( file_get_contents( $request ) ) ) {
    return $response->feed->lipsum;
  } else {
    return false;
  }
}
