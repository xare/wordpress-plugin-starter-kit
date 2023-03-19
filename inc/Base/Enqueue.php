<?php

/**
 * @package starterkit
 */

 namespace Inc\Base;
use \Inc\Base\BaseController;
class Enqueue extends BaseController {
  public function register(){
    add_action ( 'admin_enqueue_scripts', [$this, 'enqueue_admin']);
    add_action ( 'enqueue_scripts', [$this, 'enqueue']);
  }
function enqueue() {
        //enqueue all our scripts
        wp_enqueue_style('StarterKitStyle', $this->plugin_url . '/assets/starterkit.css');
        wp_enqueue_script('StarterKitScript', $this->plugin_url . '/assets/starterkit.js');
      }
  function enqueue_admin() {
        // enqueue all our scripts
        wp_enqueue_style('StarterKitAdminStyle', $this->plugin_url .'assets/admin/starterkit.css');
        wp_enqueue_script('StarterKitAdminScript', $this->plugin_url .'assets/admin/starterkit.js');
      }
}