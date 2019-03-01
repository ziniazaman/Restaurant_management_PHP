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
		
		
		<div class="slider">
			<div class="slider1">
				<div class="slider-wrapper theme-light">
					<div class="nivoSlider" id="slider">
						<img src="images/ap.jpg" alt="" title="This site developed by zim"/>
						<img src="images/pizza.jpg" alt=""/>
						<img src="images/chr.jpg" alt="" title="#htmlcaption"/>
						<img src="images/food.jpg" alt=""/>
						<img src="images/foody.jpg" alt=""/>
						<img src="images/bu.jpg" alt=""/>
					</div>
					<div class="nivo-html-caption" id="htmlcaption">
						<p>This is html caption. This is <a href="http://w3schools.com">link</a></p>
					</div>
				</div>
				<!--<img src="images/slider.jpg" alt="slider image can not found" />-->
			</div>
			
		<div class="main-content">
			<div class="content">
					<h1>This is content heading</h1>
					
					<p> Most of what I know are a whole lot of pastas w/ different sauces
					
More wheat shaped differently mixed w/tomato sauce, and some ground beef and of course NY pizza.

I get a sense that the meat and the way it is cooked is not important, but the cheeses, oils, and everything that is going on it that makes it a good meal.

Do italians use a lot of spices, or is it just vegetables oils, and cheeses that they use to garnish their meats with

As you can see I am concerned with meat, what kind of meats do they use.

Do italians like to serve huge quantities of meat.

Also do they cut things into small pieces like the chinese.

Do they like to saute, grill, bake, or etc. which ones.</p>
			</div>
			<div class="sidebar">
				<ul>
				<li><a href="home_user.php">home</a></li>
				<li><a href="about.php">about</a></li>
				<li><a href="contact-us.php">contact</a></li>
				<li><a href="">media</a></li>
			</ul>
			</div>
			
		
		</div>
		
		
		<div class="footer">
			<p>&copy;italian food restaurant</p>
		</div>
	</div>
	
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
		</script>
</body>
</html>

<?php
}
?>