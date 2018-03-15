<?php
/**
 * Plugin Name: Elementor Custom
 * Description: Add new elements and custom settings.
 * Version: 1.0.0
 *
 * Text Domain: elementor-custom
*/

define( 'ELEMENTOR_CUSTOM__FILE__', __FILE__ );
define( 'ELEMENTOR_CUSTOM_PATH', plugin_dir_path( ELEMENTOR_CUSTOM__FILE__ ) );

require( ELEMENTOR_CUSTOM_PATH . 'modules/posts/module.php' );