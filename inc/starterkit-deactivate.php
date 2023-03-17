<?php

/**
 * @package StarterKit
 */

 class StarterKitDeactivate {
  public static function deactivate() {
    flush_rewrite_rules();
  }
 }