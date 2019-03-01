<?php

if(isset($_POST['form1'])) {

	try {
		
		
		
		if(empty($_POST['st_name'])) {
			throw new Exception('Name can not be empty');
		}
		
		if(empty($_POST['st_roll'])) {
			throw new Exception('Roll can not be empty');
		}
		
		if(empty($_POST['st_cgpa'])) {
			throw new Exception('Cgpa can not be empty');
		}
		
		include('db.php');
		mysql_query("insert into registration (st_name,st_roll,st_cgpa) values('$_POST[st_name]','$_POST[st_roll]','$_POST[st_cgpa]') ");
		
		
		$success_message = 'Data has been inserted successfully.';
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
	<title>Data Insert Page</title>
</head>
<body>

<h2>Insert Data</h2>

<?php  
if(isset($error_message)) {echo $error_message;}
if(isset($success_message)) {echo $success_message;}
?>

<br>


<form action="" method="post">
<table>

	<tr>
		<td>Student_Name: </td>
		<td><input type="text" name="st_name"></td>
	</tr>
	<tr>
		<td>Student_Roll: </td>
		<td><input type="text" name="st_roll"></td>
	</tr>
	<tr>
		<td>Student_CGPA: </td>
		<td><input type="text" name="st_cgpa"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Insert" name="form1"></td>
	</tr>
</table>
</form>

<br>
<a href="../index.php">back to previous</a>
	
</body>
</html>