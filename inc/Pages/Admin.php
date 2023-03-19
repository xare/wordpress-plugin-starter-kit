<?php

namespace Inc\Pages;

/**
*
*/
class Admin
{


	public function register() {
		add_action( 'admin_menu' , [$this, 'add_admin_pages'] );
	}
	// Display the admin options page
  function admin_index() {
    // require index
    require_once PLUGIN_PATH . 'templates/admin.php';
  }

	public function add_admin_pages() {
		// Add a new top-level menu (ill-advised):
		add_menu_page(
			__( 'Starter kit','starter-kit' ),
			__( 'Starter kit','starter-kit' ),
			'manage_options',
			'starter-kit',
			[ $this , 'admin_index' ],
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
}