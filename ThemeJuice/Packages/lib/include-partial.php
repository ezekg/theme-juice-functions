<?php

/**
 * Include template partial
 *
 * @param {String} $partial      - Path to partial, relative to theme root
 * @param {Array}  $data    ([]) - Array of variables to pass to the partial
 *
 * @example
 *  ```haml
 *  - tj_include_partial("partials/header", array("var" => $val))
 *  ```
 *
 * @return {Void}
 */
function tj_include_partial( $partial, $data = array() ) {
  global $theme;

  // Extract the passed data to usable variables, override any theme
  //  variables passed in to avoid nasty errors
  extract( array_merge( $data, array(
    "theme" => $theme
  )));

  include locate_template("{$partial}.php");
}
