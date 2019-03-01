
<!doctype html>
<html lang="en">
<head>
	
</head>
<body>

<h2>View All Data from Database</h2>


<br>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>student_Id</th>
		<th>Student_Name</th>
		<th>Student_Roll</th>
		<th>Student_CGPA</th>
	</tr>
	<?php
	
	include('db.php');
		
	$i=0;
	$result = mysql_query("select * from registration");
	while($row=mysql_fetch_array($result)) 
	{
		$i++;
		?>
		
		<tr>
		<!--<td><?php echo $i; ?></td>--><!--sequintial id like 1,2,3 -->
		<td><?php echo $row['st_id']; ?></td><!--DB Original st_id  -->
		<td><?php echo $row['st_name']; ?></td>
		<td><?php echo $row['st_roll']; ?></td>
		<td><?php echo $row['st_cgpa']; ?></td>
		
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>


<br>
<a href="../index.php">back to previous</a>
	
</body>
</html>