<?php
session_start();
?>

<html>
<head>
	<title>LOGOUT</title>
	<link rel="stylesheet" type="text/css" href="style/style_new.css">
</head>
<body>
	<div class="n1">
		<div class="logo">
               <p>Online voting system</p>
          </div>
			<ul>
               
          	</ul> 	
	</div>
<?php
session_destroy();
?>

	<div class="b1">

		<form name="form5">
              
               <center>
     	<label>You have been successfully logged out</label>
          <br>
     	<label>Return to </label>
     </center>
     <br>
		<center>
               <a href="login.html">Login</a>
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
