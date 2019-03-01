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
				<li> <a href="index.php">Home:</a> </li>
				<li> <a href="">All Package: </a> </li>
				<li> <a href="login.php">Login:</a> </li>
				<li> <a href="registation.php">Register:</a> </li>
				<li> <a href="contact-us.php">Contact Us:</a> </li>
				
				
				
				  <td>
					<h1><?php include("ajax.php") ?></h1>
				</td>
				

			</ul>
		</div>
		<div class="slider" align="center">
		<h1><u>Package List:</u></h1>
		
			
					<?php 
							include ('db.php');
							$query=mysql_query("SELECT * FROM package order by package_id desc");
								while($row=mysql_fetch_array($query))
						{		
					?>		
						<table  >
							<tr align="center">
							   <td><img  style="height:316px; width:900px; border-radius:4px;" src="uploads/<?php echo $row['img'];?>"</img></td>
							</tr>
							<tr>
								 <td>
								 Name:<?php echo $row['package_name'];?></br>
								 Price:<a href=""><?php echo $row['package_price'];?>tk</a></br>
								 <a href="login.php">ORDER</a>
								 </td>
							</tr>
							<br>
						</table>
					
					<?php
						}
					?>	
            <div>					
	<div class="footer">
			<p>&copy;italian food restaurant</p>
	</div>
	
</div>				

</body>
</html>


