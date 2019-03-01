
<!DOCTYPE html>
<html>
<head>
<title>Reg PageS</title>

	<style >
				.error {
					color: red;
				}      
     	
    </style>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
if(isset($_POST['submit'])) 
{
	
	$user = $_POST['user'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$pass = md5($_POST['pass']);//md5();
	$cname = $_POST['cname'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	
	
	$valid=1;
	$msg = "";
	if(empty($user)) {
		$valid=0;
		$msg= "Usear Name Can not be Empty!!'</br>";
					
		
	}
	if(empty($fname)) {
		$valid=0;
		$msg= "First Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(empty($lname)) {
		$valid=0;
		$msg= "Last Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(empty($pass)) {
		$valid=0;
		$msg= "Password  Can not be Empty!!'</br>";
		//echo "<div class='error'>Password Can not be empty</div><br>";
	}
	if(empty($cname)) {
		$valid=0;
		$msg= "Companny Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(empty($email)) {
		$valid=0;
		$msg= "Emai Address  Can not be Empty!!'</br>";
	}
	if(empty($mobile)) {
		$valid=0;
		$msg= "Mobile Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	
	if(!(preg_match("/^[A-Za-z][A-Za-z0-9]{3,21}$/", $user))) {
		$valid=0;
		$msg= "User Name is not correctly!!'</br>";
		//echo "<div class='error'>Please enter a valid username</div><br>";
	}
	if(!(preg_match("/^[+088|088][0-9]{1,15}$/", $mobile))) {
		$valid=0;
		$msg= "Mobile Number is not correctly!!'</br>";
		//echo "<div class='error'>Please enter a valid username</div><br>";
	}
	
	$c1 = substr_count($email,"@");
	$c2 = substr_count($email,".");
	
	if(($c1!=1)||($c2!=1)) {
		$valid=0;
		$msg = "Invalid email: @ count or . count failed";
	}
	else 
	{
		$len = strlen($email);	
		$p1 = strpos($email,"@");
		if(($p1==0)||($p1==$len-1)) {
			$valid=0;
			$msg =  "Invalid email: @ is in 1st position or last position";
		}
		else {	
			$p2 = strpos($email,".");
			if(($p2==0)||($p2==$len-1)) {
				$valid=0;
				$msg =  "Invalid email: . is in 1st position or last position";
			}
			else {
				if($p2<$p1) {
					$valid=0;
					$msg =  "Invalid email: @ must be before .";
				}
				else {
					if($p2-$p1==1) {
						$valid=0;
						$msg =  "Invalid email: there must be one or more characters between @ and .";
					}
				}
			}
		}
			
	}
	
	
	if($valid == 1) 
	{
		include ('db.php');   //chng

		$query=mysql_query("SELECT * FROM registration WHERE username='".$user."'");
		$numrows=mysql_num_rows($query);
		if($numrows==0)
			{
				$sql = "INSERT into registration(username, fname, lname, password, cname, email, mobile, type) VALUES ('".$user."','".$fname."','".$lname."','".$pass."','".$cname."','".$email."','".$mobile."',0)";
				
				$result=mysql_query($sql);
				
				if($result)
				{
					echo "<script>
						alert('Registration Successful!!');
						window.location.href='index.php';
						</script>";
				
				
				//header("Location: home.php");
				}
				else
				{
					echo "<script>
						alert('Registration Fail!!!');
						window.location.href='registation.php';
						</script>";
					
					//header("Location: home.php");
				}
			
	}
	}

else{
	echo "<div class='error'>".$msg."</div>";
}
}
}
 


?>
 <form   onsubmit="return validateForm()" method="post" action="">
     <table> 
     <tr></tr>
     <tr>
     <td>Username</td>
     <td><input id="unameTextField" name="user"  type="text" onclick="hide('unameerrorMessage')" /></td>
     <td><span id="unameerrorMessage" ></span></td>
     </tr>
     
     <tr>
     <td>First name</td>
     <td><input id="fnameTextField" name="fname" type="text" onclick="hide('fnameerrorMessage')"/></td>
     <td><span id="fnameerrorMessage"></span></td>
     </tr>
     <tr>
     <td>Last name</td>
     <td><input id="lnameTextField" name="lname" type="text" onclick="hide('lnameerrorMessage')"/></td>
     <td><span id="lnameerrorMessage"></span></td>
     </tr>
	 <tr>
	 <td>password</td>
     <td><input id="passTextField" name="pass" type="password" onclick="hide('passerrorMessage')" /></td>
     <td><span id="passerrorMessage"></span></td>
      </tr>
     <tr>
	 <td>Company  </td>
	 <td><input id="companyTextField" name="cname" type="text" onclick="hide('companyerrorMessage')" /></td>
     <td><span id="companyerrorMessage"></span></td></td>
	 <tr>
	<td>Address: </td>
	<td><input id="addressTextField" name="address"  type="text" onclick="hide('addresserrorMessage')" /></td>
     <td><span id="addresserrorMessage"></span></td></td>
	 </tr>
	  <tr>
	 <td>Mobile NO::</td>
	 <td><input id="mobTextField" name="mobile" type="text" onclick="hide('moberrorMessage')" /></td>
     <td><span id="moberrorMessage"></span></td></td>
	  </tr>
        
     
     <td colspan="2" align='right'><input type="submit" name="submit" value="Get Started"/></td>
     </tr>
     
  </table>
</form> 
</body>
</html>
	
	
	
	