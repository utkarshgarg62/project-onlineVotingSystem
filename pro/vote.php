<?php
  require('connection.php');
  session_start();
  if(empty($_SESSION['member_id']))
  {
  header("location:access-denied.php");
  }
?>


<?php
  $positions=mysqli_query($link,"SELECT * FROM tb_position")
  or die("There are no records to display ... \n" . mysqli_error());
?>


<?php
  if (isset($_POST['Submit']))
  {
    $position = addslashes( $_POST['position'] ); //prevents types of SQL injection
    $result = mysqli_query($link,"SELECT * FROM tb_candidates WHERE candidate_position='$position'")
    or die(" There are no records at the moment ... \n");
    }
  else
  // do something
?>





<html>
<head>
     <title>Welcome</title>
     <link rel="stylesheet" type="text/css" href="style/style_new.css">
     <script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  if(confirm("Your vote is for "+int))
  {
  xmlhttp.open("GET","save.php?vote="+int,true);
  xmlhttp.send();
  window.location.href = "thank.php";
  }
  else
  {
  alert("Choose another candidate ");
  }

}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })

    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body>
     <div class="n1">
          <div class="logo">
               <p>Online voting system</p>
          </div>
               <ul>
              
             
               <li><a href="student.php"class="active">Home</a></li>
               <li><a href="vote.php">Vote Here</a></li>
        
               <li><a href="logout.php">Logout</a></li>
            
               </ul>     
     </div>
     <div class="b1">

        
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
  <table width="420" align="center">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
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
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>

<table width="270" align="center">
<tr>
    <th>Candidates:</th>
</tr>
<?php
//loop through all table rows
//if (mysqli_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)'></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($link);
//}
  }
else
// do nothing
?>
<tr>
    <label>Note: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</label>
    <br>
    <br>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

</table>

</form>
          
         
     
     </div>

     <div class="f1">
          <div class="footer">
          <center><p>@ Desgnied By - Komal , Tanmay , Vaibhav , Utkarsh<p></center>
          </div>
     </div>
</body>
</html>


