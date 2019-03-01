<?php

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	
	
	
		include('db.php');
	
	$result = mysql_query("delete from courseplan where st_id='$id'");
		
	header('location: delete.php');
}
else {
	header('location: delete.php');
}