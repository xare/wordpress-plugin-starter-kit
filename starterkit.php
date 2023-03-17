<?php
    /*
    Plugin Name: Starter Kit for WP plugin
    Description: A simple Starter Kit plugin for WordPress
    Version: 1.0
    Author: xare
    */

defined( 'ABSPATH' ) or die ( 'Acceso prohibido');

if( !class_exists( 'StarterKit' )){
  class StarterKit
  {
    // Public
    // Can be accessed from everywhere

    // Protected
    // Can only be accessed from the class itself and the extended classes

    // Private
    // Can only be accessed from the class itself

    // Static
    public $plugin;

		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );
		}

    function create_post_type(){
      add_action('init', [$this, 'custom_post_type']);
    }

    function register() {
      // Hook for enqueueing styles
      add_action ( 'admin_enqueue_scripts', [$this, 'enqueue_admin']);
      // Hook for adding admin menus
      add_action('admin_menu', [$this, 'add_admin_pages']);

      add_action ( 'wp_enqueue_scripts', [$this, 'enqueue']);

    }

    function uninstall() {
      // delete a CPT
      // Remove all custom generated data from DB
    }

    function custom_post_type() {
      register_post_type('book',[ 'public' => true, 'label' => 'Books' ]);
    }
      // action function for above hook
      public function add_admin_pages() {
        // Add a new top-level menu (ill-advised):
        add_menu_page(
          __('Starter kit','starter-kit'),
          __('Starter kit','starter-kit'),
          'manage_options',
          'starter-kit',
          [$this,'admin_index'],
          'dashicons-store',
          110);

      // Add a submenu to the custom top-level menu:
      /* add_submenu_page(
          'hello-world',
          __('Settings','hello-world'),
          __('Settings','hello-world'),
          'manage_options',
          'hello-world',
          [$this,'admin_index'],
          'dashicons-store',
          110); */ }

      // Display the admin options page
      function admin_index() {
        // require index
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
      }

      function enqueue() {
        // enqueue all our scripts
        wp_enqueue_style('StarterKitStyle', plugins_url('/assets/starterkit.css', __FILE__ ));
        wp_enqueue_script('StarterKitScript', plugins_url('/assets/starterkit.js', __FILE__));
      }
      function enqueue_admin() {
        // enqueue all our scripts
        wp_enqueue_style('StarterKitAdminStyle', plugins_url('/assets/admin/starterkit.css', __FILE__ ));
        wp_enqueue_script('StarterKitAdminScript', plugins_url('/assets/admin/starterkit.js', __FILE__));
      }

      function activate() {
        require_once plugin_dir_path( __FILE__ ) . 'inc/starterkit-activate.php';
        StarterKitActivate::activate();
      }
  }


  $StarterKit = new StarterKit();
  $StarterKit->register();
  // uninstall
  //register_uninstall_hook(__FILE__, [$StarterKit, 'uninstall']);


  // activation
  register_activation_hook(__FILE__, [$StarterKit, 'activate']);

  // deactivation
  require_once plugin_dir_path(__FILE__).'inc/starterkit-deactivate.php';
  register_deactivation_hook(__FILE__, ['StarterKitDeactivate', 'deactivate']);
}

// others

