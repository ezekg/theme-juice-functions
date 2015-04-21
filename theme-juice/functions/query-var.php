<?php

/**
 * Get the current query variable
  *
  * @return {Int}
 */
function tj_query_var() {
  $paged = 1;

  if ( get_query_var("paged") ) {
    $paged = get_query_var("paged");
  } elseif ( get_query_var("page") ) {
    $paged = get_query_var("page");
  }

  return $paged;
}
