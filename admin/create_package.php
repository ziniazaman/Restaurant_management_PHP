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
				
			
				  <td>
					<h1><?php include("ajax.php") ?></h1>
				</td>
				
			</ul>
		</div>
			</br>
		<div class="slider" align="center">			
				
				
	
	              <form action="" method="POST" onsubmit="return checkFormData()" enctype="multipart/form-data">
				  <table>
				  <tr><td colspan="2"><h1><u>Create Package Page:</u></h1></td>
					<tr><td>&nbsp; </td></tr>
					<tr><td>&nbsp; </td></tr>			
							<tr>
								<td style="font-size: 26px; ">Package Name:</td>
								<td>
									<input id="package_name" type="text" name="package_name" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 40px;margin-bottom: 15px;padding-left: 12px;width: 406px;" >
								</td>
							</tr>
									<td style="font-size: 26px; ">Item Name:</td>
									<td>
									<input id="item_name" type="text" name="item_name[]" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 40px;margin-bottom: 15px;padding-left: 12px;width: 406px;" >
									
									
									</td>
							</tr>
							<tr>
								<td style="font-size: 26px; " align="">Price:</td>
								<td>
									<input id="package_price" type="number" name="package_price" min="1" max="999999" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 40px;margin-bottom: 15px;padding-left: 12px;width: 406px;">
								</td>
							</tr>
									
							<tr>		
									<td style="font-size: 26px; ">Image:</td>
									<td>
									<input id="file" type="file" name="file" style="margin-bottom: 12px; margin-top:12px; margin-left: 12px; 22px; height: 37px; width: 186px; outline: none">
									</td>
							</tr>
							<tr>
									<td style="font-size: 26px; ">Available Time:</td>
									
									<td>
										<input id="time" data-format="HH:mm:ss" type="text" name="time" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 40px;margin-bottom: 15px;padding-left: 12px;width: 406px;"></input>
									</td>
							</tr>
							<tr>		
									<td style="font-size: 26px; ">Available Day:</td> 
									<td>
									<input type="checkbox" name="day_name[]" value="saturday"> Saturday 
									
									<input type="checkbox" name="day_name[]" value="sunday"> Sunday
																	
									<input type="checkbox" name="day_name[]" value="monday"> Monday
									
									<input type="checkbox" name="day_name[]" value="tuesday"> Tuesday 
									
									<input type="checkbox" name="day_name[]" value="wednesday"> Wednesday 
									
									<input type="checkbox" name="day_name[]" value="thursday"> Thursday 
									
									<input type="checkbox" name="day_name[]" value="friday"> Friday
									</td>
							</tr>
							<tr>	
								<td>&nbsp; </td>
							</tr>

							<tr>	
								<td>&nbsp; </td>
							</tr>
							<tr>	
									<td align="right" colspan="2">
									<input id="checkBtn" type="submit" name="submit" value="Create Packge" style="display: block;height: 40px;width: 166px; border: 1px solid #5973A8;font-size: 22px;margin-left: 104px;background-color:#5973A8;border-radius: 4px; color: #fff;letter-spacing: 1px;" />
									</td>
							</tr>
				
				</table>
				</form>	
				
					
				

		<?php
			if(isset($_POST['submit']))
			{ 
				
				
				$package_name = trim($_POST['package_name']);
				$price = trim($_POST['package_price']);
				$tmp_time = trim($_POST['time']);
				if(!empty($tmp_time))
				{
					$time=date ('H:m:s',strtotime($tmp_time));
					//$date=date ('y:m:d',strtotime($tmp_date));
				}
				else 
				{
					$time="00:00:00";
				}
				
				
				$file = time($_FILES["file"]["name"]);
				$new_file_name=$file.'.png';
				//echo $new_file_name;
				
				$target_dir = "../uploads/";
				$target_file = $target_dir .$new_file_name;
				$uploadOk = 1;
				
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["file"]["tmp_name"]);
					if($check !== false) {
						//echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "<script>alert('File is not an image.');</script>";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) 
				{
					echo "<script>alert('Sorry, file already exists.');</script>";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["file"]["size"] > 2097152)
				{
					echo "<script>alert('Sorry, your file is too large.');</script>";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) 
				{
					echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) 
				{
					echo "<script>alert('Sorry, your file was not uploaded.');</script>";
				
				// if everything is ok, try to upload file
				} 
				else 
				{
					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
					{
						echo "<script>alert('Package is Created');</script>";
					}
					else 
					{
						echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
					}
				
					$sql1 = "INSERT into package VALUES ('','".$package_name."',".$price.",'".$new_file_name."','".$time."')";
					$query=mysql_query($sql1);
					
					$last_id =  mysql_insert_id();
					foreach($_POST['day_name'] as $day_name)
					{
						$sql3 = "INSERT into day VALUES ('','".trim($day_name)."',".$last_id.")";
						$query=mysql_query($sql3);
					}
					
					foreach($_POST['item_name'] as $item_name)
					{
						if(!empty($item_name)||($item_name!=NULL) )
						{
							$sql2 = "INSERT into item VALUES ('','".trim($item_name)."',".$last_id.")";
							$query=mysql_query($sql2);
							header('location:admin_package.php');
						}
					}
				}
				
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