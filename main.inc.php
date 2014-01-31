<?php 
/*
Plugin Name: Export Data
Version: auto
Description: Export data from database into a spreadsheet
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=
Author: plg
Author URI: http://le-gall.net/pierrick
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

global $prefixeTable;

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+

defined('EXPORT_DATA_ID') or define('EXPORT_DATA_ID', basename(dirname(__FILE__)));
define('EXPORT_DATA_PATH' ,   PHPWG_PLUGINS_PATH . EXPORT_DATA_ID . '/');
define('EXPORT_DATA_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . EXPORT_DATA_ID);

// +-----------------------------------------------------------------------+
// | Add event handlers                                                    |
// +-----------------------------------------------------------------------+

// admin plugins menu link
add_event_handler('get_admin_plugin_menu_links', 'export_data_admin_plugin_menu_links');

/**
 * admin plugins menu link
 */
function export_data_admin_plugin_menu_links($menu) 
{
  array_push(
    $menu,
    array(
      'NAME' => 'Export Data',
      'URL' => EXPORT_DATA_ADMIN,
      )
    );
  
  return $menu;
}
?>