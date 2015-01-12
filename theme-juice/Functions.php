<?php

namespace ThemeJuice;

/**
 * Setup and import functions
 *
 * @package Theme Juice Starter
 * @subpackage Theme Juice Functions
 * @author Ezekiel Gabrielse, Produce Results
 * @link https://produceresults.com
 * @copyright Produce Results (c) 2014
 * @since 1.0.0
 */
class Functions {

    /**
     * @var {Array} - Array that contains functions to include
     */
    public $functions;

    /**
     * Constructor
     *
     * @param {Array} $options - Array that contains functions
     */
    public function __construct( $options = array() ) {

        // Merge new options with defaults
        $options = array_merge( array(
            "page-is-related-to" => true,
            "featured-image" => true,
            "search-form" => true,
            "actions" => true,
            "filters" => true,
            "excerpt" => true,
            "title" => true,
        ), $options() );

        // Set functions, discald false values, grab keys
        $this->functions = array_keys( array_filter( $options ) );

        // Add functions
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
        if ( ! function_exists( $function ) && file_exists( $_file = __DIR__ . "/functions/$function.php" ) ) {
            include $_file;
        }
    }
}
