<?php 
function insertuser(){
  global $wpdb, $title;
  $title= $_POST['title'];
  $table_name = $wpdb->prefix . "leapfrog";
  $wpdb->insert($table_name, array('title' => $title) ); 

  	echo "Database insertation successful";  

}

insertuser(); ?>

<h1> Hello Admin, welcome to your setting page! </h1>
<h2><?php esc_attr_e( 'Tabs', 'leapfrog' ); ?></h2>
<h2 class="nav-tab-wrapper">
	<a href=" <?php echo plugin_dir_url( __FILE__ ) . 'list.php'; ?>" class="nav-tab">Customer List</a>
	<a href="#" class="nav-tab nav-tab-active">Main</a>
	<a href="#" class="nav-tab">Feedbacks</a>
</h2>

<h2><?php esc_attr_e( 'Form Elements: Input Fields', 'leapfrog' ); ?></h2>

<form action="" method="post">
	<div>
		<label for="">Title</label>
		<input type="text" name="title"> <br>
		<button type="submit" name="submit">Save</button>
	</div>
</form>

<h1>Data from Database</h1>

<?php global $wpdb;
	
	$results= $wpdb->get_results("select *from wp_leapfrog");

 ?>
 <ul>
 	<?php foreach($results as  $result) { ?>
 	
 	<li> <h3>		
 		<?php echo $result->title; ?> <br>
 		</h3>
 	</li>
 		
 	<?php	} ?>
 </ul>