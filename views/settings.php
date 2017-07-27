<h1> Hello Admin, welcome to your setting page! </h1>
<h2><?php esc_attr_e( 'Tabs', 'leapfrog' ); ?></h2>
<h2 class="nav-tab-wrapper">
	<a href="#" class="nav-tab">Tab #1</a>
	<a href="#" class="nav-tab nav-tab-active">Tab #2</a>
	<a href="#" class="nav-tab">Tab #3</a>
</h2>

<h2><?php esc_attr_e( 'Form Elements: Input Fields', 'leapfrog' ); ?></h2>

<form action="db_conn.php" method="post">
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