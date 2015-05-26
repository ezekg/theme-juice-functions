<?php

/**
 * Get the page title
 *
 * @param {Bool} $display - Automatically echo output
 *
 * @return {String} - Page title
 */
function tj_title( $display = true ) {
  $output = null;

  if ( is_home() ) {
    if ( get_option( "page_for_posts", true ) ) {
      $output = get_the_title( get_option( "page_for_posts", true ) );
    } else {
      $output = __( "Latest Posts", "theme-juice" );
    }
  } elseif ( is_search() ) {
    $output = sprintf( __( "Search results for: %s", "theme-juice" ), get_search_query() );
  } elseif ( is_category() ) {
    $output = single_cat_title( "Category: ", false );
  } elseif ( is_tag() ) {
    $output = single_tag_title( "Tag: ", false );
  } elseif ( is_author() ) {
    $output = sprintf( __( "Author: %s", "theme-juice" ), get_the_author() );
  } elseif ( is_day() ) {
    $output = sprintf( __( "Day: %s", "theme-juice" ), get_the_date() );
  } elseif ( is_month() ) {
    $output = sprintf( __( "Month: %s", "theme-juice" ), get_the_date( "F Y" ) );
  } elseif ( is_year() ) {
    $output = sprintf( __( "Year: %s", "theme-juice" ), get_the_date( "Y" ) );
  } elseif ( is_404() ) {
    $output = __( "Not Found", "theme-juice" );
  } else {
    $output = get_the_title();
  }

  if ( $display ) {
    echo $output;
  } else {
    return $output;
  }
}
