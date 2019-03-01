<?php

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	header('location: show.php');
}



if(isset($_POST['form1'])) {

	try {
	
	
		if(empty($_POST['st_name'])) {
			throw new Exception('Name can not be empty');
		}
		
		if(empty($_POST['st_roll'])) {
			throw new Exception('Roll can not be empty');
		}
		
		if(empty($_POST['st_cgpa'])) {
			throw new Exception('CGPA can not be empty');
		}
		
		
		
		
		include('db.php');
		$result = mysql_query("update registration set st_name='$_POST[st_name]',st_roll='$_POST[st_roll]',st_cgpa='$_POST[st_cgpa]' where st_id='$id'");
			
		
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

$result = mysql_query("select * from registration where st_id='$id'");
while($row=mysql_fetch_array($result)) 
{
	$st_name_old = $row['st_name'];
	$st_roll_old = $row['st_roll'];
	$st_cgpa_old = $row['st_cgpa'];
}

?>


<form action="" method="post">
<table>
	<tr>
		<td>Name: </td>
		<td><input type="text" name="st_name" value="<?php echo $st_name_old; ?>"></td>
	</tr>
	<tr>
		<td>Roll: </td>
		<td><input type="text" name="st_roll" value="<?php echo $st_roll_old; ?>"></td>
	</tr>
	<tr>
		<td>CGPA: </td>
		<td><input type="text" name="st_cgpa" value="<?php echo $st_cgpa_old; ?>"></td>
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