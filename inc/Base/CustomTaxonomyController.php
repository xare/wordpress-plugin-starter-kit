<?php
namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomTaxonomyController extends BaseController
{
  public $callbacks;
  public $subpages = [];

  public function register()
  {
    if( !$this->activated('taxonomy_manager')) return;

    $this->settings = new SettingsApi();

    $this->setSubpages();
    $this->callbacks = new AdminCallbacks();
    $this->settings->addSubPages($this->subpages)->register();

    add_action ( 'init', [$this, 'activate']);
  }

  public function activate() {

  }

  public function setSubpages(){
		$this->subpages = [
			[
				'parent_slug' => 'starterkit',
				'page_title' => 'Taxonomy Types',
				'menu_title' => 'Taxonomy',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_taxonomy',
				'callback' => [$this->callbacks, 'adminTaxonomy'] ,
			]
		];
	}
}