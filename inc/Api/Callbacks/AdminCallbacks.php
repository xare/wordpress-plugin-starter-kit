<?php
/**
 * @package starterkit
 */

 namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

 class AdminCallbacks extends BaseController {

  public function adminDashboard() {
    return require_once("$this->plugin_path/templates/adminDashboard.php");
  }
  public function adminCPT() {
    return require_once("$this->plugin_path/templates/adminCPT.php");
  }
  public function adminWidgets(){
    return require_once("$this->plugin_path/templates/adminWidgets.php");
  }
  public function adminTaxonomy(){
    return require_once("$this->plugin_path/templates/adminTaxonomy.php");
  }

  public function starterkitOptionsGroup($input) {
    return $input;
  }

  public function starkerkitAdminSection() {
    echo "visit this section";
  }
  public function starkerkitTextExample() {
    $value = esc_attr(get_option( 'text_example' ));
    echo '<input
      type="text"
      class="regular-text"
      name="text-example"
      value="'.$value.'"
      placeholder="Text Example">';
  }
  public function starkerkitFirstName() {
    $value = esc_attr(get_option( 'first_name' ));
    echo '<input
            type="text"
            class="regular-text"
            name="first-name"
            value="'.$value.'"
            placeholder="First Name">';
  }
 }