<?php


require_once('../../../wp-load.php');

/**
 * After t f's comment about putting global before the variable.
 * Not necessary (http://php.net/manual/en/language.variables.scope.php)
 */
global $title = $_POST['title'];


function insertuser(){
  global $wpdb, $title, $email;
  $table_name = $wpdb->prefix . "leapfrog";
  $wpdb->insert($table_name, array('title' => $title) ); 
}

insertuser();