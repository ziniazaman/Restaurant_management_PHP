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
    <script>
        function validateForm() 
        
		         {
					 if(document.myForm.user.value==""){
					 unamevalidate();
					 return false;
					 }
					 
				
					 if(document.myForm.pass.value==""){
                    passvalidate();
					return false;
					 }
					
					 
					displayMessage();
					hide();
                   }	

                function displayMessage(message,e) 
                {
                    var err = document.getElementById(e);
                    err.style.color = "red";
                    err.innerHTML = message;
                    err.style.visibility = 'visible';
					return false;
                }

                function hide(ob) 
				{
                    document.getElementById(ob).style.visibility = 'hidden';
					return false;
                }

        
                function unamevalidate() 
				{

                    var error1 = 'unameerrorMessage';
                    var unameTextField = document.getElementById("unameTextField");
                    if (unameTextField.value == "") {
                        displayMessage("User name required",error1);
						
                    }
                  
                }

                  function passvalidate() {
                    var error2 = 'passerrorMessage';

                    var passTextField = document.getElementById("passTextField");
                    if (passTextField.value == "") {
                        displayMessage("Password required",error2);
						
                    }
                    
               
                   
				}
 
    </script>

</head>
<body>

<div class="main">
		<div class="header">
			<img src="images/ItalianFoodName.jpg" alt="header image can not found"/>
		</div>
		<div class="main-menu">
			<ul>
				<li> <a href="index.php">Home:</a> </li>
				<li> <a href="package.php">All Package: </a> </li>
				<li> <a href="login.php">Login:</a> </li>
				<li> <a href="registation.php">Register:</a> </li>
				<li> <a href="contact-us.php">Contact Us:</a> </li>
			</ul>
		</div>
<div class="slider" align="center">
<form  name="myForm" onsubmit="return validateForm()" method="post" action="login-db.php">
 <table > 
 
     <tr><td><h1><u>Login Form:</u></h1></td></tr>
	 <tr><td>&nbsp; </td></tr>
     <tr>
     <td style="font-size: 26px; ">Username</td>
     <td><input id="unameTextField" name="user"  type="text" onclick="hide('unameerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 40px;margin-bottom: 15px;padding-left: 12px;width: 406px;" /></td>
     <td><span id="unameerrorMessage" ></span></td>
     </tr>
     
    
	 <tr>
	 <td style="font-size: 26px; ">password</td>
     <td><input id="passTextField" name="pass" type="password" onclick="hide('passerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 40px;margin-bottom: 15px;padding-left: 12px;width: 406px;" /></td>
     <td><span id="passerrorMessage"></span></td>
      </tr>
     
        
     
     <td colspan="2" align='right'><input type="submit" name="submit" value="Submit" style="display: block;height: 40px;width: 136px; border: 1px solid #5973A8;font-size: 22px;margin-left: 104px;background-color:#5973A8;border-radius: 4px; color: #fff;letter-spacing: 1px;"/></td>
     </tr>
	 
     
  </table>
</form>
	</div>
	<div class="footer">
			<p>&copy;italian food restaurant</p>
		</div>
	
</div>	
</body>
</html>
