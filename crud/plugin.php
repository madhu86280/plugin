<?php

/*
  Plugin Name: CRUD Operations
  Description: Plugin for performing update,delete and insert operations.
  Version: 1
  Author: Madhu Banga
 */
//creating database
/*global $at_db_version;
$at_db_version = '1.0';

function at_datatable() {
    global $wpdb;
    global $at_db_version;

    $table_name = $wpdb->prefix . 'user_list';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name(100) DEFAULT '' NOT NULL,
		email(100) DEFAULT '' NOT NULL,
		contact(100) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    add_option('at_db_version', $at_db_version);
}

register_activation_hook(__FILE__, 'at_datatable');*/
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'user_list';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		email text NOT NULL,
		contact bigint(12), 
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );
//adding in menu
add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('user_list', //page title
        'User Listing', //menu title
        'manage_options', //capabilities
        'User_Listing', //menu slug
        user_list //function
    );
    //adding submenu to a menu
    add_submenu_page('User_Listing',//parent page slug
        'User_insert',//page title
        'user Insert',//menu titel
        'manage_options',//manage optios
        'User_Insert',//slug
        'user_insert'//function
    );
    add_submenu_page( null,//parent page slug
        'User_update',//$page_title
        'User Update',// $menu_title
        'manage_options',// $capability
        'User_Update',// $menu_slug,
        'User_update'// $function
    );
    add_submenu_page( null,//parent page slug
        'User_delete',//$page_title
        'User Delete',// $menu_title
        'User_options',// $capability
        'User_Delete',// $menu_slug,
        'User_delete'// $function
    );
}


// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'User_list.php');
require_once (ROOTDIR.'User_insert.php');
require_once (ROOTDIR.'User_update.php');
require_once (ROOTDIR.'User_delete.php');
?>