<?php

/**
 * Fetch image src
 *
 * @param {String} $src
 * @param {String} $dir (assets/images)
 *
 * @example
 *   ```php
 *   echo tj_image_src("logo.jpeg")
 *   echo tj_image_src("logo.svg", "assets/svg")
 *   ```
 *
 * @return {String}
 */
function tj_image_src( $src, $dir = "assets/images" ) {
  return get_template_directory_uri() . "/$dir/$src";
}
