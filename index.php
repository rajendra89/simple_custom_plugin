<?php



/**
* 	Plugin Name: Leapfrog
*	Description: A custom Plugin
*	Plugin URI: http://github.com/rajendra89
*	Version: 1.0.0
*	Author: Rajendra Rijal
*	Author URI: http://rajendrarijal.com.np
*/

if(is_admin()){
	register_activation_hook( __FILE__, 'leapfrog_activation' );
	add_filter('manage_posts_columns' , 'add_action_column');
	add_action( 'manage_posts_custom_column' , 'custom_columns', 10, 2 );
	add_action( 'admin_menu', 'leapfrog_menu' );

	register_deactivation_hook( __FILE__, 'leapfrog_deactivation' );
	

}

function add_action_column($columns) {
    return array_merge( $columns, 
              array('actions' => __('Actions')) );
}


function custom_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'actions':
			include('views/menu.php');

			break;
	}
}



function leapfrog_menu() {
	add_options_page( 
		'Leapfrog Plugins setting Page',
		'Leapfrog Setting',
		'manage_options',
		'leapfrog-setting',
		'action_setting_page'
	);
}

function action_setting_page(){
	include('views/settings.php');

}



function leapfrog_activation(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'leapfrog';
	$sql = "CREATE TABLE $table_name (
	 id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
	 title varchar(50) NOT NULL, 
	 PRIMARY KEY  (id)
	 );";

	$wpdb->query($sql);

	}

function leapfrog_deactivation() {
     global $wpdb;
     $table_name = $wpdb->prefix . 'leapfrog';
     $sql = "DROP TABLE IF EXISTS $table_name;";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
}