<?php
/**
 * Plugin database schema
 */

// Declare these as global in case erpconnectschema.php is included from a erpconnect.
 global $wpdb;
$prefix =  $wpdb->prefix."erpc_";
$charset_collate = $wpdb->get_charset_collate();

$table = $prefix."filesnfo";
$sql ="CREATE TABLE $table (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL DEFAULT '',
			file_name VARCHAR(255) NOT NULL DEFAULT '',
			file_path TEXT,
			folder_name TEXT,
		  	created_at DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',			
		  	updated_at DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',			
			PRIMARY KEY  (id)
		) $charset_collate;";
$table = $prefix."member";	
$sql .="CREATE TABLE $table (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			ip VARCHAR(255) NOT NULL DEFAULT '',
			website_url VARCHAR(255) NOT NULL DEFAULT '',
			ownername VARCHAR(255) NOT NULL DEFAULT '',
			owneremail VARCHAR(255) NOT NULL DEFAULT '',
			unique_key TEXT,
			PRIMARY KEY  (id),
		) $charset_collate;";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);