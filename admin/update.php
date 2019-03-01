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
		<div class="slider" align="center">
			<?php 
					$package_id=$_GET['package_id'];
					include ('db.php');
					
					if(isset($_POST['update']))
					{ 
						$package_name = $_POST['package_name'];
						$price = $_POST['package_price'];
						//echo $price;
						$sql1 = "UPDATE package SET package_price=".$price." WHERE package_id=".$package_id."";
						//$sql2 = "UPDATE package SET package_name=".$package_name." WHERE package_id=".$package_id."";
						$query=mysql_query($sql1);
						//$query=mysql_query($sql2);
						
						
						 header('location:admin_package.php');
					}
					
					//while($row=mysql_fetch_array($query))
						
			?>

	<table>
		<form action="update.php?package_id=<?=$package_id?>" method="post" style="padding: 20px 58px" onsubmit="return updateChack()">
					<tr><td><h1><u>Package Name:</u></h1></td>
						<?php
							$query0=mysql_query("SELECT package_name FROM package where package_id='".$package_id."'");
							while($row=mysql_fetch_array($query0))
							{
						?>
					<td>
						<h3 style="font-size: 30px;text-transform: capitalize;"><?php echo $row['package_name'];?></h3>
						<?php
							}
						?>
					</td>
					</tr>
					
					<tr><td>&nbsp; </td></tr>
					<tr><td>&nbsp; </td></tr>
					<tr>
					<td for="" style="display: block; font-size: 20px; font-weight: normal">Item name:</td>
					
					<td><?php
					$query1=mysql_query("SELECT item_name FROM item where package_id='".$package_id."'");
					while($row=mysql_fetch_array($query1))
					{
					?>
					
						
						 <input type="text" name="item_name" readonly value="<?php echo $row['item_name'];?>" style="display:block; margin-bottom: 7px;width: 235px;height: 42px;padding-left: 10px;font-size:18px; text-transform: capitalize; border:2px solid #ddd; border-radius: 4px"/>
						
						
						
					<?php
						}
					?>
					</td>
					</tr>
					<tr>
					<?php
						$query2=mysql_query("SELECT package_price FROM package where package_id='".$package_id."'");
						while($row=mysql_fetch_array($query2))
						{
					?>
						<td for="" style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px">Price:</td>
						 <td><input id="uCheck" type="number" name="package_price" min="1" max="999999" value="<?php echo $row['package_price'];?>" style="border: 2px solid #ddd; border-radius: 4px; height:42px; padding-left:10px; width: 108px;"/>
						 </td>
						 </tr>
					<?php
						}
					?>
				<tr>					
					<td style="display: block; font-size: 20px; font-weight: normal; margin-bottom: 11px">Available Day: </td>	
					<td>
							<?php
								$query3=mysql_query("SELECT day_name FROM day where package_id='".$package_id."'");
								$day=array('saturday','sunday','monday','tuesday','wednesday','thursday','friday');
								$day_available=array();
								while($row=mysql_fetch_array($query3))
								{
									 
									array_push($day_available,$row['day_name']);
									
								}
								$chk=false;
								foreach($day as $d)
								{
									foreach($day_available as $d_available)
									{
										if($d==$d_available)
										{
											$chk=true;
											break;
										}
										else
										{
											$chk=false;
										}
									}
								if($chk)
								{
							?>
									<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $d; ?>"/><?php echo $d; ?>
								<?php
								}
								else
								{
								?>
									<input type="checkbox" name="day_name[]" disabled value="<?=$d?>"/> <?=$d?>
								<?php
								}
							}				
							?>	
					</td>	
					</tr>
					<tr><td>&nbsp; </td></tr>
					<tr><td>&nbsp; </td></tr>
					<td colspan="2" align="right">
						<input  class="btn_hov" type="submit" name="update" value="Update" style="border: 2px solid #96D472;border-radius: 4px; height:42px; width: 108px; font-size: 17px; margin-top: 20px; display:block;background-color: #96D472;color: #fff"/>
						</td>
					</tr>
				</form>
			</table>
	</div>
			
	

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