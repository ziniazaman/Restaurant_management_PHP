<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:index.php");
} 
else{
	
	include ('db.php');
	$user=$_SESSION['sess_user'];
	
	//echo "<br/>".$user."<br/>".$fname;
	//$query=mysql_query("SELECT * FROM registration where username='".$user."'" );
	
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bar/bar.css"/>
	<link rel="stylesheet" type="text/css" href="css/dark/dark.css"/>
	<link rel="stylesheet" type="text/css" href="css/default/default.css"/>
	<link rel="stylesheet" type="text/css" href="css/light/light.css"/>
	<link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>
	
    <title>       
    </title>
	
</head>
	
<body>

<div class="main">
		<div class="header">
			<img src="images/ItalianFoodName.jpg" alt="header image can not found"/>
		</div>
		<div class="main-menu">
			<ul>
				<li> <a href="home_admin.php">Home:</a> </li>
				<li> <a href="admin_package.php">All Package Show: </a> </li>
				<li> <a href="create_package.php">Create Package:</a> </li>
				<li> <a href="contact-us.php">Contact-US:</a> </li>
				<li> <a href="orderlist.php">OrderList:</a> </li>
				<li> <a href="logout.php">Log out</a> </li>
				
				
				  <td>
					<h1><?php include("ajax.php") ?></h1>
				</td>
				
			</ul>
		</div>
		<div class="slider" align="center">
		<h1><u>Package List:</u></h1>
			<?php 
						
						$query=mysql_query("SELECT * FROM package");
						
							while($row=mysql_fetch_array($query))
							{
					?>
						
					<table >		
						    <tr >
							<td >
							   <img style="height:316px; width:900px; border-radius:4px;" src="../uploads/<?php echo $row['img'];?>"</img>
							</td>
							<tr>
					         <tr >
							<td >   
					            <a href="update.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">Update</a>  
					            <a href="delete.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">Delete</a>  
							</td>
							<tr>
							<br>
						</table>
					
					<?php
						}
					?>	
		</div>
	<div class="footer">
			<p>&copy;italian food restaurant</p>
	</div>
	
</div>				

</body>
</html>
<?php
}
?>

