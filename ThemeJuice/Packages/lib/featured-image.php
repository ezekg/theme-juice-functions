<?php

/**
 * Get featured image
 *
 * @param {String} $size (full) - Size of image
 * @param {String} $part (url)  - Part of the image to fetch
 *
 * @return {String|False}
 */
function tj_featured_image( $size = "full", $part = "url" ) {
  global $post;

  if ( $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), $size ) ) {
    switch ( $part ) {
      case "url" :
        return $featured_image[0];
      case "width" :
        return $featured_image[1];
      case "height" :
        return $featured_image[2];
      default :
        return false;
    }
  } else {
    return false;
  }
}
