<?php
namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class GalleryController extends BaseController
{

  public $subpages = [];
  public $callbacks;
  public function register()
  {
    if( !$this->activated('gallery_manager')) return;

    $this->settings = new SettingsApi();

    $this->setSubpages();
    $this->callbacks = new AdminCallbacks();
    $this->settings->addSubPages($this->subpages)->register();
  }

  public function setSubpages(){
		$this->subpages = [
			[
				'parent_slug' => 'starterkit',
				'page_title' => 'Gallery',
				'menu_title' => 'Gallery',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_gallery',
				'callback' => [$this->callbacks, 'adminGallery'] ,
			]
		];
	}
}