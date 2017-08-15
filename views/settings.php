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


<div id="exTab1" class="container">	
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#1a" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2a" data-toggle="tab">Using nav-pills</a>
			</li>
			<li><a href="#3a" data-toggle="tab">Applying clearfix</a>
			</li>
  		<li><a href="#4a" data-toggle="tab">Background color</a>
			</li>
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1a">
          <h3>Content's background color is the same for the tab</h3>
				</div>
				<div class="tab-pane" id="2a">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
				</div>
        <div class="tab-pane" id="3a">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
				</div>
          <div class="tab-pane" id="4a">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
				</div>
			</div>
  </div>


<hr></hr>
<div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

<div id="exTab2" class="container">	
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2" data-toggle="tab">Without clearfix</a>
			</li>
			<li><a href="#3" data-toggle="tab">Solution</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
				</div>
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
				</div>
        <div class="tab-pane" id="3">
          <h3>add clearfix to tab-content (see the css)</h3>
				</div>
			</div>
  </div>

<hr></hr>

<div class="container"><h2>Example 3 </h2></div>
<div id="exTab3" class="container">	
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#1b" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2b" data-toggle="tab">Using nav-pills</a>
			</li>
			<li><a href="#3b" data-toggle="tab">Applying clearfix</a>
			</li>
  		<li><a href="#4a" data-toggle="tab">Background color</a>
			</li>
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1b">
          <h3>Same as example 1 but we have now styled the tab's corner</h3>
				</div>
				<div class="tab-pane" id="2b">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
				</div>
        <div class="tab-pane" id="3b">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
				</div>
          <div class="tab-pane" id="4b">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
				</div>
			</div>
  </div>






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
 <table class="table table-striped">
 <ul>
 	<li><h2>User ID </h2></li>
 	<li><h2>Full Name </h2></li>
 </ul>
 <ul>
 	<?php foreach($results as  $result) { ?>
 	<li>
 		<h3>
 			<?php echo $result->id; ?>
 		</h3>
 	</li>
 	
 	<li> <h3>		
 		<?php echo $result->title; ?> <br>
 		</h3>
 	</li>
 		
 	<?php	} ?>
 </ul>
 </table>