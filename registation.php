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
					 
					 if(document.myForm.fname.value==""){
				    fnamevalidate();
					return false;
					 }
					 if(document.myForm.lname.value==""){
			        lnamevalidate();
					return false;
					 }
					 if(document.myForm.pass.value==""){
                    passvalidate();
					return false;
					 }
					 if(document.myForm.cname.value==""){
					companyvalidate();
					return false;
					 }
					 if(document.myForm.email.value==""){
			        emailvalidate();
					return false;
					 }
					 if(document.myForm.mobile.value==""){
					mobvalidate();
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
				function fnamevalidate() {
                    var error3 = 'fnameerrorMessage';
                 
                    var fnameTextField = document.getElementById("fnameTextField");
                    if (fnameTextField.value == "") {
                        displayMessage("First name required",error3);
						
                    }
                
                }
				function lnamevalidate() {
                    var error4 = 'lnameerrorMessage';
                  
                    var lnameTextField = document.getElementById("lnameTextField");
                    if (lnameTextField.value == "") {
                        displayMessage("Last name required",error4);
						
                    }
             
                }
				
				function companyvalidate() 
				{

                    var error5 = 'companyerrorMessage';
                  
                    var companyTextField = document.getElementById("companyTextField");
                    if (companyTextField.value == "") 
					{
                        displayMessage("Company Name Required",error5);
						
                    }
                  
				}
				
				
				function emailvalidate() 
				{
				var error6 = 'emailerrorMessage';
                  
                    var emailTextField = document.getElementById("emailTextField");
                    if (emailTextField.value == "") 
					{
                        displayMessage("Give your address is Required",error6);
                    }
                   
				}
				
				function mobvalidate() 
				{

                    var error7 = 'moberrorMessage';
                    var error8 = 'moberrorMessage';
                 
                    var mobTextField = document.getElementById("mobTextField");
                    if (mobTextField.value == "") 
					{
                        displayMessage("Mobile Number Required ",error7);
						return false;
						
                    }
					if(mobTextField.length!=15){
						
						displayMessage("Mobile Number is not set Correctly ",error8);
						return false;
						
						
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
<form  name="myForm" onsubmit="return validateForm()" method="post" action="reg-db.php">
 <table> 
 
     <tr><td><h1><u>Regitration Form:</u></h1></td></tr>
	 <tr><td>&nbsp; </td></tr>
     <tr>
     <td style="font-size: 20px; ">Username</td>
     <td style="font-size: 20px; "><input id="unameTextField" name="user"  type="text" onclick="hide('unameerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;"/></td>
     <td><span id="unameerrorMessage" ></span></td>
     </tr>
     
     <tr>
     <td style="font-size: 20px; ">First name</td>
     <td><input id="fnameTextField" name="fname" type="text" onclick="hide('fnameerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;"/></td>
     <td><span id="fnameerrorMessage"></span></td>
     </tr>
     <tr>
     <td style="font-size: 20px; ">Last name</td>
     <td><input id="lnameTextField" name="lname" type="text" onclick="hide('lnameerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;"/></td>
     <td><span id="lnameerrorMessage"></span></td>
     </tr>
	 <tr>
	 <td style="font-size: 20px; ">password</td>
     <td><input id="passTextField" name="pass" type="password" onclick="hide('passerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;"/></td>
     <td><span id="passerrorMessage"></span></td>
      </tr>
     <tr>
	<td style="font-size: 20px; ">Company  </td>
		 <td><input id="companyTextField" name="cname" type="text" onclick="hide('companyerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;"/></td>
         <td><span id="companyerrorMessage"></span></td></td>
	   <tr>
	<td style="font-size: 20px; ">Email: </td>
		 <td><input id="emailTextField" name="email"  type="text" onclick="hide('emailerrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;" /></td>
          <td><span id="emailerrorMessage"></span></td></td>
	    </tr>
	  <tr>
	<td style="font-size: 20px; ">Mobile NO::</td>
		 <td><input id="mobTextField" name="mobile" type="text" onclick="hide('moberrorMessage')" style="margin-left: 4px; border: 1px solid #ddd;border-radius: 4px;height: 20px;margin-bottom: 15px;padding-left: 12px;width: 406px;"/></td>
         <td><span id="moberrorMessage"></span></td></td>
	      </tr>
        
     
     <td colspan="2" align='right'><input type="submit" name="submit" value="Submit"style="display: block;height: 40px;width: 136px; border: 1px solid #5973A8;font-size: 22px;margin-left: 104px;background-color:#5973A8;border-radius: 4px; color: #fff;letter-spacing: 1px;"/></td>
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
