<?php
/**
 * @package starterkit
 */

 namespace Inc\Base;

 class SettinsLinks
 {
  public function register(){
    add_filter( 'plugin_action_links_'.PLUGIN, [ $this, 'settings_link' ]);
  }

  public function settings_link($links) {
    $settings_link = '<a href="admin.php?page=starterkit">Settings</a>';
    array_push($links, $settings_link);
    return $links;
  }

 }