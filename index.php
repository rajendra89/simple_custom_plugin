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
	add_filter('manage_posts_columns' , 'add_action_column');
add_action( 'manage_posts_custom_column' , 'custom_columns', 10, 2 );
	

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