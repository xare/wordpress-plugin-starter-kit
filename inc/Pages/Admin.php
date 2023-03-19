<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
/**
*
*/
class Admin extends BaseController
{

	public $settings;
	public $pages = [];
	public $subpages = [];
	public $callbacks;


	public function register() {
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
		$this->setSubpages();
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		$this->settings
			->addPages( $this->pages )
			->withSubPage( 'Dashboard' )
			->addSubPages( $this->subpages )
			->register();
	}

	public function setPages(){
		$this->pages = [
			[
				'page_title' => __('Starter kit','starter-kit'),
				'menu_title' =>  __('Starter kit','starter-kit'),
				'capability' => 'manage_options',
				'menu_slug' => 'starter-kit',
				'callback' => [$this->callbacks, 'adminDashboard'] ,
				'icon_url' => 'dashicons-store',
				'position' => 110
			]
		];
	}
	public function setSubpages(){
		$this->subpages = [
			[
				'parent_slug' => 'starter-kit',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_cpt',
				'callback' => [$this->callbacks, 'adminCPT'] ,
			],
			[
				'parent_slug' => 'starter-kit',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_taxonomies',
				'callback' => [$this->callbacks, 'adminTaxonomy'] ,
			],
			[
				'parent_slug' => 'starter-kit',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_widgets',
				'callback' => [$this->callbacks, 'adminWidgets'] ,
			]
		];
	}

	public function setSettings()
	{
		$args = [
			[
				'option_group'=> 'starterkit_options_group',
				'option_name' => 'text_example',
				'callback' => [$this->callbacks, 'starkerkitOptionsGroup']
			],
			[
				'option_group'=> 'starterkit_options_group',
				'option_name' => 'first_name',
				]
		];
		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = [
			[
				'id'=> 'starterkit_admin_index',
				'title' => 'Settings',
				'callback' => [$this->callbacks, 'starkerkitAdminSection'],
				'page' => 'starterkit-plugin' //From menu_slug
				]
		];
		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = [
			[
				'id'=> 'text_example',
				'title' => 'Text Example',
				'callback' => [$this->callbacks, 'starkerkitTextExample'],
				'page' => 'starterkit-plugin', //From menu_slug
				'section' => 'starterkit_admin_index',
				'args' => [
						'label_for' => 'text_example',
						'class' => 'example-class'
					]
				],
				[
					'id'=> 'first_name',
					'title' => 'First Name',
					'callback' => [$this->callbacks, 'starkerkitFirstName'],
					'page' => 'starterkit-plugin', //From menu_slug
					'section' => 'starterkit_admin_index',
					'args' => [
							'label_for' => 'text_example',
							'class' => 'example-class'
						]
					]
		];
		$this->settings->setFields( $args );
	}

}