<?php

/**
 * Fetch image src
 *
 * @param {String} $src
 * @param {String} $dir (assets/images)
 *
 * @example
 *   ```haml
 *   %img(src="#{tj_image_src("logo.jpeg")}")
 *   %img(src="#{tj_image_src("logo.svg", "assets/svg")}")
 *   ```
 *
 * @return {String}
 */
function tj_image_src( $src, $dir = "assets/images" ) {
  return get_template_directory_uri() . "/$dir/$src";
}

/**
 * @see tj_image_src
 */
function tj_svg_src( $src, $dir = "assets/svg") {
  return tj_image_src( $src, $dir );
}
