<?php
session_start();
//echo $_SESSION['sess_user'];
if(!isset($_SESSION['sess_user']))
{
	header("location:../login.php");
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
				<li> <a href="home_user.php">Home:</a> </li>
				<li> <a href="user_package.php">All Package Show: </a> </li>
				<li> <a href="contact-us.php">Contact-US:</a> </li>
				<li> <a href="user_profile.php">Profile:</a> </li>
				<li> <a href="logout.php">Log out</a> </li>
			</ul>
		</div>
		<div class="slider" align="center">
		<h1><u>Package List:</u></h1>
			
					<?php 
						
						$day_name=$_GET['day_name'];
						
						$query=mysql_query("SELECT * FROM package JOIN day ON package.package_id=day.package_id where day.day_name='".$day_name."'");		
							while($row=mysql_fetch_array($query))
							{
					?>
					
							
							<table bordercolor="#111" border="1">
								<tr >
								<td>
								   <img style="width:900px; height:316px;" src="../uploads/<?php echo $row['img'];?>"></img>
								</td>
								</tr>
								<tr>
								 <td>
								 Name:<?php echo $row['package_name'];?></br>
							
								 Price:<a href=""><?php echo $row['package_price'];?>tk</a></br>
							     <a href="show_package.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">ORDER</a>
								 </td>
							</tr>							<br>
						</table>
					
					<?php
						}
					?>

</body>
</html>

<?php
}
?>
