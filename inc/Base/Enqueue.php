<?php

/**
 * @package starterkit
 */

 namespace Inc\Base;

class Enqueue {
  public function register(){
    add_action ( 'admin_enqueue_scripts', [$this, 'enqueue_admin']);
    add_action ( 'enqueue_scripts', [$this, 'enqueue']);
  }
function enqueue() {
        //enqueue all our scripts
        wp_enqueue_style('StarterKitStyle', PLUGIN_URL . '/assets/starterkit.css');
        wp_enqueue_script('StarterKitScript', PLUGIN_URL . '/assets/starterkit.js');
      }
  function enqueue_admin() {
        // enqueue all our scripts
        wp_enqueue_style('StarterKitAdminStyle', PLUGIN_URL .'/assets/admin/starterkit.css');
        wp_enqueue_script('StarterKitAdminScript', PLUGIN_URL .'/assets/admin/starterkit.js');
      }
}