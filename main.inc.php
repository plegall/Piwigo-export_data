<?php 
/*
Plugin Name: Export Data
Version: auto
Description: Export data from database into a spreadsheet
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=
Author: plg
Author URI: http://le-gall.net/pierrick
Has Settings: true
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

?>
