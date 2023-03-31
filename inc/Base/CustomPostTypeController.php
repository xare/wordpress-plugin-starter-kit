<?php
namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{
  public $callbacks;
  public $subpages = [];
  public $custom_post_types = [];

  public function register()
  {
    if( !$this->activated('cpt_manager')) return;

    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();
    $this->setSubpages();
    $this->settings->addSubPages($this->subpages)->register();

    $this->storeCustomPostTypes();
    if( ! empty($this->custom_post_types))
      add_action ( 'init', [$this, 'registerCustomPostTypes']);
  }

  public function storeCustomPostTypes() {
    $this->custom_post_types = [[
      'post_type' => 'starterkit_book',
      'name' => "Books",
      'singular_name' => "Book",
      'public' => true,
      'has_archive' => true,
    ],
    [
      'post_type' => 'starterkit_comic',
      'name' => "Comic Books",
      'singular_name' => "Comic Book",
      'public' => true,
      'has_archive' => false,
    ]];
  }
  public function registerCustomPostTypes()
  {
    foreach($this->custom_post_types as $post_type){
      register_post_type($post_type['post_type'],[
        'labels' => [
          'name' => $post_type['name'],
          'singular_name' => $post_type['singular_name']
        ],
        'public' => $post_type['public'],
        'has_archive' => $post_type['has_archive'],
      ]);
    }

  }


  public function setSubpages(){
		$this->subpages = [
			[
				'parent_slug' => 'starterkit',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'starterkit_cpt',
				'callback' => [$this->callbacks, 'adminCustomPostType'] ,
			]
		];
	}
}