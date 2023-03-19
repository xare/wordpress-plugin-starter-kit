<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
/**
*
*/
class Admin extends BaseController
{

	public $settings;
	public $pages = [];
	public $subpages = [];
	public function __construct() {
		$this->settings = new SettingsApi();
		$this->pages = [
			[
				'page_title' => __('Starter kit','starter-kit'),
				'menu_title' =>  __('Starter kit','starter-kit'),
				'capability' => 'manage_options',
				'menu_slug' => 'starter-kit',
				'callback' => function() { echo '<h1> Starterkit Plugin </h1>'; },
				'icon_url' => 'dashicons-store',
				'position' => 110
			]
		];

		$this->subpages = [
			[
				'parent_slug' => 'starter-kit',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_cpt',
				'callback' => function(){ echo '<h1>CPT Manager</h1>'; }
			],
			[
				'parent_slug' => 'starter-kit',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_taxonomies',
				'callback' => function(){ echo '<h1>Taxonomies Manager</h1>'; }
			],
			[
				'parent_slug' => 'starter-kit',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_widgets',
				'callback' => function(){ echo '<h1>Widgets Manager</h1>'; }
			]
		];
	}

	public function register() {
		$this->settings
			->addPages( $this->pages )
			->withSubPage( 'Dashboard' )
			->addSubPages( $this->subpages )
			->register();
	}


}