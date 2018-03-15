<?php
namespace ElementorPro\Modules\Posts\Widgets;

use ElementorPro\Modules\Posts\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_CUSTOM_PATH', plugin_dir_path( WP_PLUGIN_DIR . 'elementor-custom/' ) );

/**
 * Class Posts Update
 */
class Posts_Update {
  public function __construct() {
    $this->add_actions();
  }

  private function add_actions() {
    add_action( 'elementor/widget/posts/skins_init', function( $widget ) {
      require( ELEMENTOR_CUSTOM_PATH . 'modules/posts/skins/skin-custom.php' );
      $widget->add_skin( new Skins\Skin_Custom( $widget ) );
    } );
  }
}

new Posts_Update();