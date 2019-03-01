<?php

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	header('location: show.php');
}



if(isset($_POST['form1'])) {

	try {
	
	
		if(empty($_POST['course_name'])) {
			throw new Exception('Name can not be empty');
		}
		
		if(empty($_POST['st_id'])) {
			throw new Exception('Id can not be empty');
		}
		
		
		include('db.php');
		
		$result = mysql_query("update courseplan set course_name='$_POST[course_name]',st_id='$_POST[st_id]' where course_id='$id'");
			
		
		$success_message = 'Data has been updated successfully.';
		
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Update Page</title>
</head>
<body>

<h2>Update Data</h2>

<?php  
if(isset($error_message)) {echo $error_message;}
if(isset($success_message)) {echo $success_message;}
?>

<br>

<?php

include('db.php');

$result = mysql_query("select * from courseplan where course_id='$id'");
while($row=mysql_fetch_array($result)) 
	
{
	$course_name_old = $row['course_name'];
	$st_id_old = $row['st_id'];
	
}

?>


<form action="" method="post">
<table>
	<tr>
		<td>Name: </td>
		<td><input type="text" name="course_name" value="<?php echo $course_name_old; ?>"></td>
	</tr>
	<tr>
		<td>Id: </td>
		<td><input type="text" name="st_id" value="<?php echo $st_id_old; ?>"></td>
	</tr>
	
	<tr>
		<td></td>
		<td><input type="submit" value="Update" name="form1"></td>
	</tr>
</table>

<input type="hidden" name="id" value="<?php echo $id; ?>">

</form>


<br>
<a href="index.php">back to previous</a>
	
</body>
</html>