<?php
require('connection.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){
	
    $position = addslashes( $_POST['position'] );

    $results = mysqli_query($link,"SELECT * FROM tb_candidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); // for the first candidate
    $row2 = mysqli_fetch_array($results); // for the second candidate
      if ($row1){
        $candidate_id_1=$row1['candidate_id'];
      $candidate_name_1=$row1['candidate_name']; // first candidate name
      $candidate_1=$row1['candidate_cvotes']; // first candidate votes
      }

      if ($row2){
        $candidate_id_2=$row2['candidate_id'];
      $candidate_name_2=$row2['candidate_name']; // second candidate name
      $candidate_2=$row2['candidate_cvotes']; // second candidate votes
      }
      
}
    else
        // do nothing
	
		 
?>
<?php
// retrieving positions sql query
$positions=mysqli_query($link,"SELECT * FROM tb_position")
or die("There are no records to display ... \n" . mysqli_error());
?>


<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>




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
               <li><a href="candidates.php">Manage Candidates</a></li>
               <li><a href="refresh.php"class="active">Results</a></li>
               <li><a href="logout_admin.php">Logout</a></li>
            
               </ul>     
     </div>
  <div class="b1">
  <form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
    <table width="420" align="center">
    <tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results" /></td>
    </tr>
    
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    </form>
    </table>
<table align="center" border="0" width="400" height="100">
  <tr>
    <th align="center">Candidate Id</th>
  <th align="center">Candidate Name</th>
  <th align="center">Total Vote</th>
  </tr>
  <tr>
    <td align="center">
  <?php if(isset($_POST['Submit'])){echo $candidate_id_1;} ?>
  </td>
    <td align="center">
  <?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>
  </td>
  <td align="center">
    <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?><br>
    </td>
  </tr>
  <tr>
    <td align="center">
  <?php if(isset($_POST['Submit'])){echo $candidate_id_2;} ?>
  </td>
    <td align="center">
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>
  </td>
  <td align="center">
   <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?><br>
 </td>
</tr>
</table>


  </div>
  <div class="f1">
          <div class="footer">
          <center><p>@ Desgnied By - Komal , Tanmay , Vaibhav , Utkarsh<p></center>
          </div>
  </div>
</body>
</html>



