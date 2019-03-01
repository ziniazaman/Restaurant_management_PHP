
<!doctype html>
<html lang="en">
<head>
	
</head>
<body>

<h2>View All Data from Database</h2>


<br>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>Course_Id</th>
		<th>Course_Name</th>
		<th>Student_Id</th>
	</tr>
	<?php
	
	
		include('db.php');
		
	$i=0;
	$result = mysql_query("select * from courseplan");
	while($row=mysql_fetch_array($result)) 
	{
		$i++;
		?>
		
		<tr>
		<!--<td><?php echo $i; ?></td>--><!--sequintial id like 1,2,3 -->
		<td><?php echo $row['course_id']; ?></td><!--DB Original st_id  -->
		<td><?php echo $row['course_name']; ?></td>
		<td><?php echo $row['st_id']; ?></td>
		
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>


<br>
<a href="index.php">back to previous</a>
	
</body>
</html>