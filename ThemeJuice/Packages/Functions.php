<?php

namespace ThemeJuice\Packages;

class Functions implements PackageInterface {

  /**
   * @var {Array}
   */
  public $functions;

  /**
   * @var {Array}
   */
  private $defaults = array(
    "actions" => true,
    "excerpt" => true,
    "featured-image" => true,
    "filters" => true,
    "image-src" => true,
    "include-partial" => true,
    "lipsum" => true,
    "lorempixel" => true,
    "page-is-related-to" => true,
    "query-var" => true,
    "search-form" => true,
    "title" => true,
  );

  /**
   * Constructor
   *
   * @param {Array} $options - Array that contains functions
   */
  public function __construct( $options = array() ) {

    // Merge new options with defaults
    $options = array_merge( $this->defaults, $options );

    // Discald false values, grab keys
    $this->functions = array_keys( array_filter( $options ) );

    if ( ! empty( $this->functions ) ) {
      foreach ( $this->functions as $function ) {
        $this->register_function( $function );
      }
    }
  }

  /**
   * Register function
   *
   * @param {String} $function - The name of the function to include
   *
   * @return {Void}
   */
  public function register_function( $function ) {

    // Make sure function doesn't already exist, and that the file itself
    //  exists. If we're all good, then include it.
    if ( ! function_exists( "tj_{$function}" ) && file_exists( $file = __DIR__ . "/lib/{$function}.php" ) ) {
      include $file;
    }
  }
}
