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
						<h2> Order Food:</h2>	
						<form action="" method="POST"  onsubmit="return quantityChack()">
						<table>
							<tr>
							    <td><label>Quantity:</label></td>
								<td><input id="qChack" type="number" name="quantity" min="1" max="500" /></td>
								<td></td>
								
								<td><input type="submit" name="submit" value="Order"/></td>
							</table>
						</form>
            				
					<?php 
					
						
						$package_id=$_GET['package_id'];
						$day_name=$_GET['day_name'];
						
						
						$query=mysql_query("SELECT * FROM package where package_id='".$package_id."'");
						
					
							while($row=mysql_fetch_array($query))
							{
					?>
			
							<table >
										<tr>
										<td>
										   <img style="height:316px; width:900px; border-radius:4px;" src="../uploads/<?php echo $row['img'];?>"</img>
										</td>
										</tr>
										<tr>
							</table>
				<?php
						}
					?>
			</div>
			<div class="footer">
				<p>&copy;Chines food Resturant</p>
			</div>
			</div>			
					
	
<script>
 function quantityChack(){
	 if(document.getElementById('qChack').value == ""){
		alert('Please enter a number');
		document.getElementById('qChack').style.borderColor = "red";
		return false;
	 } else{
		 alert('Your Order Successful');
		// header('location:home_user.php');
		 window.location.href='home_user.php';
	 }
 }
</script>
	
</div>
</body>
</html>
	<?php
		if(isset($_POST['submit']))
		{ 
		
			
			$username = $_SESSION["sess_user"];
			$quantity = $_POST['quantity'];
			date_default_timezone_set('Asia/Dacca');
			$date = date('Y/m/d h:i:s a', time()); //with time
			$currentdate = date("Y-m-d",strtotime($date));
			$currenttime = date("H:i:s",strtotime($date)); //without date
			
			$company = "SELECT cname FROM registration WHERE username='".$username."'";
			$row=mysql_query($company);
			$cname=mysql_fetch_array($row);
			$cname= $cname['cname'];
			
			$sql="insert into `order` values('','".$username."','".$cname."',".$package_id.",".$quantity.",'".$day_name."','".$currentdate."','".$currenttime."')";
			mysql_query($sql);
		}	
	?>
<?php
}
?>



