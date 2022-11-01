<?php
require('connection.php');
$vote = $_REQUEST['vote'];


mysqli_query($link,"UPDATE tb_candidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");

mysqli_close($con);
?> 