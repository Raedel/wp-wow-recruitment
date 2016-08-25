<?php
/*
Plugin Name: WordPress WoW Recruitment
Plugin URI: http://erincrocker.net/wpwowrecruitment
Description: A simple WordPress World of Warcraft recruitment widget
Version: 1.0
Author: Erin Crocker
Author URI: http://erincrocker.net
License: GPL2
*/
/*
Copyright 2014  Erin Crocker  (email : erincrocker@hotmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
if(!class_exists('WP_WoW_Recruitment'))
{
    class WP_WoW_Recruitment
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // Initialize Settings
			require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			require_once(sprintf("%s/widget.php", dirname(__FILE__)));
			$WP_WoW_Recruitment_Settings = new WP_WoW_Recruitment_Settings();

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
        } // END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate()
        {
            // Do nothing
        } // END public static function activate

        /**
         * Deactivate the plugin
         */     
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate
			// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=wp_wow_recruitment">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}
    } // END class WP_WoW_Recruitment
} // END if(!class_exists('WP_WoW_Recruitment'))
?>

<?php
if(class_exists('WP_WoW_Recruitment'))
{
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('WP_WoW_Recruitment', 'activate'));
    register_deactivation_hook(__FILE__, array('WP_WoW_Recruitment', 'deactivate'));

    // instantiate the plugin class
    $wp_wow_recruitment = new WP_WoW_Recruitment();
}
?>