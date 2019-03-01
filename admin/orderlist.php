<?php
session_start();
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
				<li> <a href="home_admin.php">Home:</a> </li>
				<li> <a href="admin_package.php">All Package Show: </a> </li>
				<li> <a href="create_package.php">Create Package:</a> </li>
				<li> <a href="contact-us.php">Contact-US:</a> </li>
				<li> <a href="orderlist.php">OrderList:</a> </li>
				<li> <a href="logout.php">Log out</a> </li>
			</ul>
		</div>
			</br>
		<div class="slider" align="center">
					<h3>Ordered Food List</h3>
					<div>
						<table border="1">
							<tr style="background-color: rgba(0, 0, 128, .9); color: #fff;">
								<th>Order ID</th>
								<th>Username</th>
								<th>EMAIL</th>
								<th>Mobile No</th>
								<th>Package Name</th>
								<th>Quantity</th>
								<th>Oredr Time</th>
								<th>Order Date</th>
								<th>Day Name</th>
							</tr>
							<?php
							
								date_default_timezone_set('Asia/Dacca');
								$date = date('Y/m/d h:m:s a', time()); //with time
								$currentdate = date("Y-m-d",strtotime($date));
								//echo $currentdate;
								
								$query=mysql_query("SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id inner JOIN registration ON `order`.username=registration.username WHERE `order`.order_date='".$currentdate."'");
								if($query === FALSE) { 
									die(mysql_error()); // TODO: better error handling
								}
								//echo package_name;
								while($row=mysql_fetch_array($query))
								{
							?>
							<tr>
								<td><?php echo $row['order_id'];?></td>
								<td><?php echo $row['fname']." ".$row['lname'];?></td>
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['mobile'];?></td>
								<td><?php echo $row['package_name'];?></td>
								<td><?php echo $row['quantity'];?></td>
								<td><?php echo $row['order_time'];?></td>
								<td><?php echo $row['order_date'];?></td>
								<td><?php echo $row['day_name'];?></td>								
							</tr>
							<?php
								}
							?>
						</table>
						</br>
					
					<h2>Order Summary</h2>
						<?php 
							$query1=mysql_query("SELECT package.package_name,sum(quantity) as quantity FROM `order` inner JOIN package ON `order`.package_id=package.package_id WHERE `order`.order_date='".$currentdate."' GROUP BY `order`.package_id");
							while($row1=mysql_fetch_array($query1))
							{ 
						?>
							<p style="font-size: 20px;color:#000;margin-bottom: 20px"> Total Order of "<?php echo $row1['package_name'];?>" = <?php echo $row1['quantity'];?></p>
						<?php
							}
						?>
						<?php 
							$query2=mysql_query("SELECT sum(quantity) as quantity FROM `order` WHERE `order`.order_date='".$currentdate."'");
							while($row2=mysql_fetch_array($query2))
							{ 
						?>
							<p style="padding-top: 20px;font-size: 20px;color:#000;">
								So Total Order <span style="padding-left: 90px">
								<strong style="padding-right: 6px">=</strong><?php echo $row2['quantity'];?></span>
							
							</p>
						<?php
							}
						?>						
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