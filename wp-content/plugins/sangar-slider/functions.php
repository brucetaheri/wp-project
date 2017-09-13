<?php
/**
 * Sangar slider functions
 * this will run after pass the PHP version check
 */

if(! defined('SANGAR_SLIDER_VERSION'))
{
	define('SANGAR_SLIDER_VERSION','1.4.6');
	define('SANGAR_SLIDER_DIR_NAME', str_replace("/sangar-slider.php", "", plugin_basename(__FILE__)));
	define('SANGAR_SLIDER_DIR_PATH', plugin_dir_path(__FILE__));
	define('SANGAR_SLIDER_DIR_URL', plugin_dir_url(__FILE__));
	
	// Sangar Slider Addons
	add_filter('sangar_slider_addons', function($args){ 
		
		$args['sangar_slider'] = array(
			'name' => 'Layer Slider',
			'description' => 'Create stuning layered slider using build in WYSIWYG editor',
			'class-name' => 'ssliderGenerateAddonBasic',
			'directory' => plugin_dir_path(__FILE__) . 'premium-basic-slider/functions.php',
			'default-options' => plugin_dir_path(__FILE__) . 'premium-basic-slider/default.php'
		);

		return $args; 
	});
}

$sangar_slider_version = 'Premium';

require_once( plugin_dir_path( __FILE__ ) . 'sangar-core/activate.php');
require_once( plugin_dir_path( __FILE__ ) . 'elements/default-templates.php');
require_once( plugin_dir_path( __FILE__ ) . 'elements/default-pattern-images.php');
require_once( plugin_dir_path( __FILE__ ) . 'elements/default-buttons.php');