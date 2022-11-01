<?php
session_start();
require('connection.php');

$result=mysqli_query($link,"SELECT * FROM tb_candidates")
or die("There are no records to display ... \n" . mysqli_error());
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>


<?php
// retrieving positions sql query
$positions_retrieved=mysqli_query($link,"SELECT * FROM tb_position")
or die("There are no records to display ... \n" . mysqli_error());

?>


<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($link, "INSERT INTO tb_candidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" )
        or die("Could not insert candidate at the moment". mysqli_error() );

// redirect back to candidates
 header("Location: candidates.php");
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
 $result = mysqli_query($link,"DELETE FROM tb_candidates WHERE candidate_id='$id'")
 or die("The candidate does not exist ... \n");

 // redirect back to candidates
 header("Location: candidates.php");
 }
 else
 // do nothing
?>



<html>
<head>
     <title>Manage Candidates</title>
     <link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>
     <div class="n1">
          <div class="logo">
               <p>Online voting system</p>
          </div>
               <ul>
              
             
               <li><a href="admin_panel.php">Home</a></li>
               <li><a href="positions.php">Manage Positions</a></li>
               <li><a href="candidates.php"class="active">Manage Candidates</a></li>
               <li><a href="refresh.php">Results</a></li>
               <li><a href="logout_admin.php">Logout</a></li>
            
               </ul>     
     </div>
	<div class="b1">

		
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
     <center><CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION></center>
<tr></center>
    <td><center>Candidate Name</center></td>
    <td><input type="text" name="name" /></td>
</tr>
<tr>
    <td><center>Candidate Position</center></td>
    <td><center><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select</center>
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="480" align="center">
<center><h3>AVAILABLE CANDIDATES</h3></center>
<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
</tr>
<tr></tr><tr></tr>
<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "</tr>";
  
echo "<tr>";
echo "<td align='center'>" . $row['candidate_id']."</td>";
echo "<td align='center'>" . $row['candidate_name']."</td>";
echo "<td align='center'>" . $row['candidate_position']."</td>";
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete</a></td>';
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
