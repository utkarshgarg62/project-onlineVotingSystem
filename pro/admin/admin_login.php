<html>
<head>
	<title>ADMIN_LOGIN</title>
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

		<form name="form3" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
     	<h2>Admin Login</h2>
     	<label>E-mail</label>
     	<input type="text" name="myusername" placeholder="email" required><br>
     	<label>Password</label>
     	<input type="password" name="mypassword" placeholder="Password" required><br>
		<center>
     	<button type="submit">Login</button>
     	</center>
     	</form>
	</div>

	<div class="f1">
          <div class="footer">
          <center><p>@ Desgnied By - Komal , Tanmay , Vaibhav , Utkarsh<p></center>
          </div>
	</div>
</body>
</html>
