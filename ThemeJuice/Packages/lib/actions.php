<?php

/**
 * Initial theme setup
 */
add_action( "after_setup_theme", function() {

  /**
   * Make theme available for translation. Translations can be placed into the lang/ directory.
   *
   * @link http://codex.wordpress.org/Function_Reference/load_theme_textdomain
   * @link http://svn.automattic.com/wordpress-i18n/
   */
  load_theme_textdomain( "theme-juice", get_template_directory_uri() . "/lang" );

  /**
   * Enable theme and plugins to manage the head title
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
   */
  add_theme_support( "title-tag" );

  /**
   * Add support for post thumbnails
   *
   * @link http://codex.wordpress.org/Post_Thumbnails
   */
  add_theme_support( "post-thumbnails" );
});

/**
 * Force permalink structure to be "/%postname%/"
 *
 * @link http://codex.wordpress.org/Class_Reference/WP_Rewrite
 */
add_action( "after_switch_theme", function() {
  global $wp_rewrite;

  if ( get_option( "permalink_structure" ) !== "/%postname%/" ) {
    $wp_rewrite->set_permalink_structure( "/%postname%/" );
    $wp_rewrite->flush_rules();
  }
});

/**
 * Clean up WordPress head output
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp_head
 * @see http://wpengineer.com/1438/wordpress-header/
 */
add_action( "init", function() {

  // Display the links to the extra feeds such as category feeds
  remove_action( "wp_head", "feed_links_extra", 3 );
  // Display the links to the general feeds: Post and Comment Feed
  remove_action( "wp_head", "feed_links", 2 );
  // Display the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action( "wp_head", "rsd_link" );
  // Display the link to the Windows Live Writer manifest file
  remove_action( "wp_head", "wlwmanifest_link" );
  // Index link
  remove_action( "wp_head", "index_rel_link" );
  // Previous link
  remove_action( "wp_head", "parent_post_rel_link", 10, 0 );
  // Start link
  remove_action( "wp_head", "start_post_rel_link", 10, 0 );
  // Display relational links for the posts adjacent to the current post
  remove_action( "wp_head", "adjacent_posts_rel_link", 10, 0 );
  // Display the XHTML generator that is generated on the wp_head hook, WP version
  remove_action( "wp_head", "wp_generator" );
  // Remove emoji styles
  remove_action( "wp_head", "print_emoji_detection_script", 7 );
  remove_action( "wp_print_styles", "print_emoji_styles" );
});

/**
 * Remove unnecessary dashboard widgets
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 */
add_action( "admin_init", function() {

  // Incoming links
  remove_meta_box( "dashboard_incoming_links", "dashboard", "normal" );
  // Plugins
  remove_meta_box( "dashboard_plugins", "dashboard", "normal" );
  // Wordpress blog
  remove_meta_box( "dashboard_primary", "dashboard", "normal" );
  // Other wordpress news
  remove_meta_box( "dashboard_secondary", "dashboard", "normal" );
});
