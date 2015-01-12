<?php

/**
 * Render search form
 *
 * @param {Bool}   $display     - Automatically echo output
 * @param {String} $placeholder - Placeholder text inside of field
 *
 * @return {String}
 */
function tj_search_form( $display = true, $placeholder = "Search" ) {
    $buffer = array();

    $buffer[] = "<form role='search' method='get' class='search-field__wrapper' action='" . home_url() . "' >";
    $buffer[] = "<div class='search-field'>";
    $buffer[] = "<input class='search-field__input' type='text' value='" . get_search_query() . "' name='s' id='s' placeholder='$placeholder' />";
    $buffer[] = "<input class='search-field__submit' type='submit' value='". esc_attr__( "Search" ) ."' />";
    $buffer[] = "</div>";
    $buffer[] = "</form>";

    if ( $display ) {
        echo implode( "", $buffer );
    } else {
        return implode( "", $buffer );
    }
}

add_filter( "get_search_form", "tj_search_form" );
