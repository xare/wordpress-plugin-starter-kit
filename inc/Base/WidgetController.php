<?php
namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class WidgetController extends BaseController
{
  public $callbacks;
  public $subpages = [];

  public function register()
  {
    if( !$this->activated('widget_manager')) return;

    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();
    $this->setSubpages();
    $this->settings->addSubPages($this->subpages)->register();

  }

  public function setSubpages(){
		$this->subpages = [
			[
				'parent_slug' => 'starterkit',
				'page_title' => 'Widget',
				'menu_title' => 'Widget',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_widget',
				'callback' => [$this->callbacks, 'adminWidget'] ,
			]
		];
	}
}