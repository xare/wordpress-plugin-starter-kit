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
	public function __construct() {
		$this->settings = new SettingsApi();
		$this->pages = [
			[
				'page_title' => __( 'Starter kit','starter-kit' ),
				'menu_title' => __( 'Starter kit','starter-kit' ),
				'capability' => 'manage_options',
				'menu_slug' => 'starter-kit',
				'callback' => function(){echo "<h1> Starkit </h1>";},
				'icon_url' => 'dashicons-store',
				'position' => 110
			]
		];;
	}

	public function register() {

		$this->settings->addPages( $this->pages )->register();
	}


}