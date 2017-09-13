<?php
/**
 * Plugin Name: Sangar Slider
 * Plugin URI: https://tonjoo.com/addons/sangar-slider
 * Description: Modern WordPress slideshow for your project.
 * Version: 1.4.6
 * Author: tonjoo
 * Author URI: http://www.tonjoo.com/
 * License: Sangar slider is available under dual license, GPLv2 and Tonjoo License
 * Contributor: Haris Ainur Rozak, Todi Adiyatmo Wijoyo
 */

require_once( plugin_dir_path( __FILE__ ) . 'sangar-core/tonjoo_is_php3.php');
if(defined('TONJOO_IS_PHP3')) require_once('functions.php');

/**
 * Tonjoo License Page
 */
add_action('plugins_loaded','sangar_slider_plugins_loaded_license');
function sangar_slider_plugins_loaded_license() 
{
	// License page submenu
	add_action('admin_menu', 'sslider_license_menu' );
	function sslider_license_menu() {	
		add_submenu_page('sangar_slider_admin', 		
			'Tonjoo License', 
			'Tonjoo License',
			'moderate_comments',
			'sslider_license_page',
			'sslider_license_page_callback');	
	}
	function sslider_license_page_callback() {	
		require_once( plugin_dir_path( __FILE__ ) . 'license-page.php');
	}


	/**
	 * Tonjoo License
	 */
	if (! class_exists('tonjoo_license')) {
		include(plugin_dir_path(__FILE__) . 'library-license-wordpress/tonjoo_license.php');
	}

	Class TonjooPluginLicenseSSLIDER
	{
		public function __construct($key)
		{
			$this->opt['name'] = 'sangar_slider';
			$this->opt['field'] = 'license_status';

			$option = get_option($this->opt['name']);

			if(! isset($option['license_key'])) $option['license_key'] = '';

			$this->data['plugin_name'] = "sangar-slider-premium";
			$this->data['admin_url'] = admin_url("admin.php?page=sslider_license_page");
			$this->data['key'] = $key === false ? $option['license_key'] : $key;
			$this->data['file'] = __FILE__;
			$this->data['status'] = isset($option[$this->opt['field']]) ? unserialize($option[$this->opt['field']]) : false;
		}

		public function show_notification()
		{
			if(! $this->data['status']['status'])
			{
				$tonjoo = new tonjoo_license();
				
				$message = "Please enter your <b>Sangar Slider</b> licese code in <a class='button navbar-button' style='margin:0 5px;' href='". $this->data['admin_url'] ."#opt-license'>Options Page</a>";

				$tonjoo->showNotification($this->data,$message);
			}
		}

		public function reactivate_popup()
		{
			$tonjoo = new tonjoo_license();

			$tonjoo->reactivatePopup($this->data);
		}

		public function set_license()
		{
			$tonjoo = new tonjoo_license();

			return $tonjoo->RegisterKey($this->data);
		}

		public function unset_license()
		{
			$tonjoo = new tonjoo_license();

			return $tonjoo->unRegisterKey($this->data);
		}

		public function get_status()
		{			
			$tonjoo = new tonjoo_license();

			$status = $tonjoo->getStatus($this->data);

			return $status;
		}

		public function get_json()
		{
			$tonjoo = new tonjoo_license();

			return $tonjoo->getJsonLocal($this->data);
		}

		public function license_on_save($post)
		{
			if(isset($post['save_status_license']))
			{	

				$license_status = $this->get_license_status();				
				$license_status['date'] = date('l jS \of F Y h:i:s A', time());

				if(isset($license_status['email']))
				{
					// censoring email
					$license_email = explode('@', $license_status['email']);

					if(isset($license_email[1]))
					{
						$license_email = substr($license_email[0], 0, -3) . '***@' . $license_email[1];
						$license_status['email'] = $license_email;
					}
				}

				$post[$this->opt['name']][$this->opt['field']] = serialize($license_status);
			}
			else if(isset($post['unset_license']))
			{
				$unset_license = $this->unset_license();

				if($unset_license['status'] == false)
				{
					$post[$this->opt['name']][$this->opt['field']] = serialize($this->data['status']);
				}
			}
			else
			{
				$post[$this->opt['name']][$this->opt['field']] = serialize($this->data['status']);
			}

			return $post;
		}

		private function get_license_status()
		{
			$set_license = $this->set_license();
	
			if($set_license['status'])
			{
				$status = $this->get_status();				

				if($status['status'] && $status['data'] != NULL)
				{	
					$return = (array) $status['data'];

					return $return;
				}
				else if($status['status'] && $status['data'] == NULL)
				{
					$return['status'] = false;
					$return['message'] = "Our website is temporary down, please try again later";

					return $return;
				}
				else
				{
					$return['status'] = false;
					$return['message'] = $status['data'];

					return $return;
				}
			}
			else
			{
				$return['status'] = false;
				$return['message'] = $set_license['data'];

				return $return;
			}			
		}
	}

	global $PluginLicense;
	$PluginLicense = new TonjooPluginLicenseSSLIDER(false);
	$PluginLicense->get_json();
	$PluginLicense->show_notification();

	register_activation_hook( __FILE__, 'myplugin_activate_SSLIDER' );
	function myplugin_activate_SSLIDER() {
		global $PluginLicense;

		$PluginLicense->reactivate_popup();
	}
}