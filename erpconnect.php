<?php
/*
  Plugin Name: ERP Connect plugin
  Plugin URI: https://guzzburystudio.com
  description: This is made by guzzbury for import all type data on Your Project.
  Version: 1.0.0
  Author: Guzzbury
  Author URI: https://guzzburystudio.com/about-us/
  Text Domain: erpconnect
  Domain Path: /languages/
*/

class erpconnect {
// this is a cunstruct function for call runtime action 
  public function __construct() {
    add_action( 'init', array( 'erpconnect', 'translations' ), 1 );
    add_action('admin_menu', array('erpconnect', 'admin_menu'));
    add_action('wp_ajax_erpconnect-ajax', array('erpconnect', 'render_ajax_action'));
  }
// this function use of create erp connect menu  
  public static function admin_menu() {
    add_menu_page( __( 'ERP Connect', 'erp-connect' ), __( 'ERP Connect', 'erp-connect' ), 'manage_options', 'erp-connect', array('erpconnect', 'render_admin_action'),plugins_url('/ERPConnect/img/ERP.png'));
  }
// this function use of lunguage translations 
  public static function translations() {
    load_plugin_textdomain( 'erpconnect', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  } 
  // this function use of upload xml file by these action  
  public static function render_admin_action() {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'upload';
    require_once(plugin_dir_path(__FILE__).'erpconnect-common.php');
    require_once(plugin_dir_path(__FILE__)."erpconnect-{$action}.php");
  }
  


}
    
  $erpconnect = new erpconnect();