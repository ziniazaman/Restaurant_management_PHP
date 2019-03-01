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
?>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bar/bar.css"/>
	<link rel="stylesheet" type="text/css" href="css/dark/dark.css"/>
	<link rel="stylesheet" type="text/css" href="css/default/default.css"/>
	<link rel="stylesheet" type="text/css" href="css/light/light.css"/>
	<link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>
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
				<li> <a href="ordermodel.php">DAY:</a> </li>
				<li> <a href="contact-us.php">Contact-US:</a> </li>
				<li> <a href="user_profile.php">Profile:</a> </li>
				<li> <a href="logout.php">Log out</a> </li>
			</ul>
		</div>
			</br>
		<div class="slider" align="center">
					<?php
		$query=mysql_query("SELECT * FROM registration WHERE username='".$user."'");
			while($row=mysql_fetch_array($query))
			{
		
	
	?>
	
	
	<h3>Your Profile</h3>
		<table bordercolor="#111" border="1">
						
                    <tr>
						<td> First Name:</td>
						<td><span><?php echo $row['fname'];?></span></td>		
					</tr>
					<tr>
						<td> Last Name</td>
						<td><span><?php echo $row['lname'];?></span></td>		
					</tr>
					<tr>
						<td> Username</td>
						<td><span ><?php echo $row['username'];?></span></td>		
					</tr>
					
					<tr>
						<td> Company Name</td>
						<td><span ><?php echo $row['cname'];?></span></td>		
					</tr><tr>
						<td> Email</td>
						<td><span><?php echo $row['email'];?></span></td>		
					</tr>
					<tr>
						<td> Mobile</td>
						<td><span><?php echo $row['mobile'];?></span></td>		
					</tr>
					
			</table>
		
		<?php
			}
		?>
		
		</br>
				

	
		<div>
			<h3>Your Ordered List</h3>
			<table bordercolor="#111" border="1">
				<tr style="background-color: rgba(0, 0, 128, .9); color: #fff;">
					<td align="center"><strong>order_id</strong></td>
					<td align="center"><strong>Package Name</strong></td>
					<td align="center"><strong>Quantity</strong></td>
					<td align="center"><strong>Oredr Time</strong></td>
					<td align="center" ><strong>Order Date</strong></td>
					<td align="center" ><strong>Day Name</strong></td>
					
					
				</tr>
						
							
							<?php
								
								$query1=mysql_query("SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id where `order`.username='".$user."'");
								
								while($row1=mysql_fetch_array($query1))
								{
							?>
							<tr>
							    <td><?php echo $row1['order_id'];?></td>
								<td><?php echo $row1['package_name'];?></td>
								<td><?php echo $row1['quantity'];?></td>
								<td><?php echo $row1['order_time'];?></td>
								<td><?php echo $row1['order_date'];?></td>
								<td><?php echo $row1['day_name'];?></td>
								
								
							</tr>
							<?php
								}
							?>
							
						</table>
						
	<div class="footer">
			<p>&copy;italian food restaurant</p>
		</div>
	</div>
</div>
</body>
</html>
<?php
}
?>