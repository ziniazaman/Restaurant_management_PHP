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
				<li> <a href="contact-us.php">Contact-US:</a> </li>
				<li> <a href="user_profile.php">Profile:</a> </li>
				<li> <a href="logout.php">Log out</a> </li>
			</ul>
		</div>
		
			</br>
			<div align="center" class="slider">
	<?php 
		$package_id=$_GET['package_id'];
		$day_name=$_GET['day_name'];
		include ('db.php');
		
		//echo $day_name;
	?>

		<div >
			<!-- Modal content-->
			<div >	
				<?php
				$query0=mysql_query("SELECT package_name FROM package where package_id='".$package_id."'");
				while($row=mysql_fetch_array($query0))
				{
				?>
				<div >
						
					<h4  style="padding: 10px 0 0px 33px; text-transform: capitalize;font-size: 30px;"><?php echo $row['package_name'];?></h4>
				</div>
				<?php
				}
				?>
				
				
				<div style="padding: 0 50px;">
					<h4 style="display: block; font-size: 20px; font-weight: normal">Item name: </h4>
					<?php
						$query1=mysql_query("SELECT item_name FROM item where package_id='".$package_id."'");
						while($row=mysql_fetch_array($query1))
						{
					?>
						<h4 style="display:block; margin-bottom: 7px;width: 235px;height: 42px;padding-left: 10px;font-size:18px; text-transform: capitalize; border:2px solid #111; border-radius: 4px;padding-top: 8px;"><?php echo $row['item_name'];?></h4>					
					<?php
						}
					?>
				
					<?php
					 $query2=mysql_query("SELECT package_price FROM package where package_id='".$package_id."'");
					while($row=mysql_fetch_array($query2))
					{
					 ?>
						<h4 style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px;margin-top: 26px">Price: </h4>
							<h4 style="border: 2px solid #111; border-radius: 4px; height:42px; padding-left:10px; width: 108px;padding-top:8px;"><?php echo $row['package_price'];?></h4>
					<?php
					}
					?>
					
					<?php
					$query3=mysql_query("SELECT time FROM package where package_id='".$package_id."'");
					while($row=mysql_fetch_array($query3))
					{
					?>
						<h4 style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px;margin-top: 26px">Available Time: (before) </h4>
							<h4 style="border: 2px solid #111; border-radius: 4px; height:42px; padding-left:10px; width: 108px;padding-top:8px;"><?php echo $row['time'];?></h4>
					<?php
					
					$time=$row['time'];
					}
					?>
					<br>
					<?php
						date_default_timezone_set('Asia/Dacca');
						$day = strtolower(date('l')); //with time
						$date = date('Y/m/d h:m:s a', time()); //with time
						$currenttime = date("H:m:s",strtotime($date)); //without date
						//$day = date('l', $currenttime);
						//echo $day."<br/>".$currenttime;
						if($day_name==$day)
						{	
							if($currenttime > $time && $time!='00:00:00')
							{
								?>
								<p>
								<a  href="#" type="button" onclick="showAlert()" role="button">Order Now</a>
								</p>
								<?php
							}
							

							
							if($currenttime < $time || $time=='00:00:00')
							{
								?>
								<p>
								<a  href="order.php?package_id=<?php echo $package_id;?>&day_name=<?php echo $day_name;?>"  type="button" role="button">Order Now</a>
								</p>
							<?php
							}
							
						}
						else
						{
						?>
						<p>
						<a  href="order.php?package_id=<?php echo $package_id;?>&day_name=<?php echo $day_name;?>"  type="button" role="button">Order Now</a>
					    </p>
						<?php
						}
						?>
					
				</div>
			</div>
		</div>
		
			</div>
				<div class="footer">
				<p>&copy;I food Resturant</p>
			</div>
		</div>			
</body>
</html>

<?php
}
?>