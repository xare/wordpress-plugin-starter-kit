<?php
    /*
    Plugin Name: Starter Kit for WP plugin
    Description: A simple Starter Kit plugin for WordPress
    Version: 1.0
    Author: xare
    */

use Inc\Base\Activate;
use Inc\Base\Deactivate;

defined( 'ABSPATH' ) or die ( 'Acceso prohibido');

// Require once the Composer Autoload
if( file_exists( dirname( __FILE__).'/vendor/autoload.php' ) ){
  require_once dirname( __FILE__).'/vendor/autoload.php';
}
// Define CONSTANTS
define( 'PLUGIN_PATH' , plugin_dir_path(__FILE__) );
define( 'PLUGIN_URL' , plugin_dir_url(__FILE__) );
define( 'PLUGIN' , plugin_basename(__FILE__) );

/**
 * The code that runs during plugin Activation
 *
 * @return void
 */
function ativate_starterkit(){
  Activate::activate();
}
register_activation_hook( __FILE__, 'activate_starterkit');

/**
 * The code that runs during plugin Deactivation
 *
 * @return void
 */
function deactivate_starterkit(){
  Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_starterkit');

if(class_exists( 'Inc\\Init' )) {
  Inc\Init::register_services();
}