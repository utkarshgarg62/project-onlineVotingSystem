<html>
<head>
  <title>REGISTER</title>
  <link rel="stylesheet" type="text/css" href="style/style_new.css">
</head>
<body>
  <div class="n1">
    <div class="logo">
               <p>Online voting system</p>
          </div>
      <ul>
               <li><a href="home.html">home</a></li>
               <li><a href="login.html">Login</a></li>
               <li><a href="register.php"class="active">Register</a></li>
               <li><a href="admin/admin_login.php">Admin Login</a></li>
            
            </ul>

  </div>
  

  <div class="b1">
    <?php
  require('connection.php');
  if (isset($_POST['submit']))
  {
    $myFirstName = addslashes( $_POST['firstname'] );
    $myLastName = addslashes( $_POST['lastname'] );
    $myEmail = $_POST['email'];
    $myPassword = $_POST['password'];
    
    $sql = mysqli_query($link,"INSERT INTO tb_user(first_name, last_name, email, password) VALUES ( '$myFirstName' , '$myLastName' , '$myEmail' , '$myPassword' )" )
    or die( mysqli_error() );
    die( "<form name='f10'><center>
      You have registered for an account.<br>
      Go to <br><br><a href=\"login.html\">Login</a></center></form>" );
  }
  echo '<form action="register.php" method="post" onsubmit="return registerValidate(this)">';

  //echo "<h2>Register Here !</h2>";
  echo " <label>First name</label>
  <input type='text' name='firstname' placeholder='First Name' required><br>";

  echo "<label>Last name</label>
  <input type='text' name='lastname' placeholder='Last Name' required><br>";

  echo "<label>E-mail</label>
  <input type='text' name='email' placeholder='email' required><br>";

  echo "<label>Password</label>
  <input type='password' name='password' placeholder='password' required><br>";

  echo " <center>
          <input type='submit' name='submit' value='Register Account'/>
          </center>";

  echo "</form>";

?>
    

  </div>

  <div class="f1">
    <div class="footer">
    <center><p>@ Desgnied By - Komal , Tanmay , Vaibhav , Utkarsh<p></center>
    </div>
  </div>
</body>
</html>
