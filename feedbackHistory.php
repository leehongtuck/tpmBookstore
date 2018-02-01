<?php 
$title = "Activity_log";
require_once "inc/memberHeader.php" 
$result=mysqli_query($conn,"SELECT * FROM ");
?> 


<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Activity log</title>

</head>

<body class="background">
<div id="activity"> 

<h1>Feedback History</h1>
<br>
<br>
<form action="" method="post"> 
	
	<div>
	<table style="width: 100%;text-align:center">
			<tr>
				<td class="rightBorder">Date</td> 
				<td class="bottomBorder">Description</td>
			</tr>
			
		</table>
	
	</div>
</form>
</div> 


</body>

</html> 

<?php
include_once("inc/memberFooter.php");
?>
