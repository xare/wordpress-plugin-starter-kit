<?php

/**
 * @package StarterKit
 */

namespace Inc\Base;

 class Activate {
  public static function activate() {
    flush_rewrite_rules();

    if ( get_option('starterkit')) {
      return;
    }
    $default = [];
    update_option('starterkit', $default);


  }
 }