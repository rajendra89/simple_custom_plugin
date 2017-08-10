<?php

/**
* 	Plugin Name: Leapfrog
*	Description: A simple custom Plugin 
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
	add_action( 'wp_enqueue_scripts', 'prefix_enqueue' );

	add_action('wp_head','head_code');
	

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
//creates new db table on plugin activation
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
//Drop newly created db table on plugin deactivation
function leapfrog_deactivation() {
     global $wpdb;
     $table_name = $wpdb->prefix . 'leapfrog';
     $sql = "DROP TABLE IF EXISTS $table_name;";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
}

//Bootstrap CDN
function prefix_enqueue() 
{       
    // JS
    wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    wp_enqueue_script('prefix_bootstrap');
    // Jquery
    wp_register_script('prefix_jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
    wp_enqueue_script('prefix_jquery');

    // CSS
    wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    wp_enqueue_style('prefix_bootstrap');


}

    

function head_code()
{

$output = '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';    
$output .= '<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>'; 
$output .= '<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>';

echo $output;

}