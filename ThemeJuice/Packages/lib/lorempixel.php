<?php

/**
 * Generate some lipsum
 *
 * @param {String} $what   ("")  - Subject of image
 * @param {Int}    $width  (640) - Width of image
 * @param {Int}    $height (480) - Height of image
 *
 * @example
 *   ```haml
 *   %img(src="#{tj_lorempixel("animals", 800, 640)}")
 *   ```
 *
 * @return {String}
 */
function tj_lorempixel( $what = "", $width = 640, $height = 480 ) {
  return "http://lorempixel.com/{$width}/{$height}/{$what}";
}

/**
 * @see tj_lorempixel
 */
function tj_dummy_image( $what = "", $width = 640, $height = 480 ) {
  return tj_lorempixel( $what, $width, $height );
}
