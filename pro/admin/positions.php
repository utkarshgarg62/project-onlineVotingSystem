<?php
session_start();
require('connection.php');
//If your session isn't valid, it returns you to the login screen for protection

//retrive positions from the tbpositions table
$result=mysqli_query($link,"SELECT * FROM tb_position")
or die("There are no records to display ... \n" . mysqli_error());
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>


<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($link, "INSERT INTO tb_position(position_name) VALUES ('$newPosition')" )
        or die("Could not insert position at the moment". mysqli_error() );

// redirect back to positions
 header("Location: positions.php");
}
?>


<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 // delete the entry
 $result = mysqli_query($link,"DELETE FROM tb_position WHERE position_id='$id'")
 or die("The position does not exist ... \n");

 // redirect back to positions
 header("Location: positions.php");
 }
 else
 // do nothing

?>


<html>
<head>
	<title>Manage Positions</title>
	<link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>
	<div class="n1">
		<div class="logo">
               <p>Online voting system</p>
          </div>
			<ul>
              
             
               <li><a href="admin_panel.php">Home</a></li>
               <li><a href="positions.php"class="active">Manage Positions</a></li>
               <li><a href="candidates.php">Manage Candidates</a></li>
               <li><a href="refresh.php">Results</a></li>
               <li><a href="logout_admin.php">Logout</a></li>
            
          	</ul> 	
	</div>


	<div class="b1">
     	<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onSubmit="return positionValidate(this)">
        <center><CAPTION><h3>ADD NEW POSITION</h3></CAPTION></center>
     		<tr>
    <td><input type="text" name="position" /></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="420" align="center">
<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
<tr>
<th>Position ID</th>
<th>Position Name</th>
</tr>
<tr></tr><tr></tr>


<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "</tr>";
  echo "<tr>";
  echo "<td align='center'>" . $row['position_id']."</td>";
  echo "<td align='center'>" . $row['position_name']."</td>";
  echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete</a></td>';
  echo "</tr>";
  echo "<tr>";
  echo "</tr>";
  echo "<tr>";
  echo "</tr>";
  echo "<tr>";
  echo "</tr>";
  echo "<tr>";
  echo "</tr>";
  echo "<tr>";
  echo "</tr>";
}

mysqli_free_result($result);
mysqli_close($link);
?>

</table>



     
	</div>

	<div class="f1">
          <div class="footer">
          <center><p>@ Desgnied By - Komal , Tanmay , Vaibhav , Utkarsh<p></center>
          </div>
	</div>
</body>
</html>


