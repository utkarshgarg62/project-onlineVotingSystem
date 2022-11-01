<html>
<head>
	<title>Access denied</title>
	<link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>
	<div class="n1">
		<div class="logo">
               <p>Online voting system</p>
          </div>
			<ul>
               <li><a href="../home.html">home</a></li>
               <li><a href="../login.html">Login</a></li>
               <li><a href="../register.php">Register</a></li>
               <li><a href="admin_login.php"class="active">Admin Login</a></li>
            
          	</ul> 	
	</div>

	<div class="b1">
		<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);
	ob_start();
	session_start();
	require('connection.php');
		$myusername=$_POST['myusername'];
		$mypassword=$_POST['mypassword'];
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = mysqli_real_escape_string($link,$myusername);
			$mypassword = mysqli_real_escape_string($link,$mypassword);
			
	$sql="SELECT * FROM tb_admin WHERE email='$myusername' and password='$mypassword'" or die(mysqli_error());
	$result=mysqli_query($link,$sql) or die(mysqli_error());
	$count=mysqli_num_rows($result);
	
	if($count==1)
	{
		$user = mysqli_fetch_assoc($result);
		$_SESSION['member_id'] = $user['member_id'];
		header("location:admin_panel.php");
	}
	else 
	{
		echo "<form name='form9'><center><label>Wrong Username or Password<br>Return to</label>
		<br><br><a href=\"admin_login.php\">login</center></a></form>";
	}
	ob_end_flush();
?>
		
	</div>

	<div class="f1">
          <div class="footer">
          <center><p>@ Desgnied By - Komal , Tanmay , Vaibhav , Utkarsh<p></center>
          </div>
	</div>
</body>
</html>


