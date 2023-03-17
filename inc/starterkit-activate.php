<?php

/**
 * @package StarterKit
 */

 class StarterKitActivate {
  public static function activate() {
    // flush rewrite rules
    flush_rewrite_rules();
  }
 }