<?php
namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class TestimonialController extends BaseController
{
  public $callbacks;
  public $subpages = [];

  public function register()
  {
    if( !$this->activated('testimonial_manager')) return;

    $this->settings = new SettingsApi();

    $this->setSubpages();
    $this->callbacks = new AdminCallbacks();
    $this->settings->addSubPages($this->subpages)->register();
  }

  public function setSubpages(){
		$this->subpages = [
			[
				'parent_slug' => 'starterkit',
				'page_title' => 'Testimonial',
				'menu_title' => 'Testimonial',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_testimonial',
				'callback' => [$this->callbacks, 'adminTestimonial'] ,
			]
		];
	}
}