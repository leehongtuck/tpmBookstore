<?php 
$title = "Activity Log";
require_once "inc/memberHeader.php";
/*if($member == null)
	header('location:index.php');*/
?> 



<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Purchase History</title>

</head>

<body class="background">
<div id="activity"> 

<h1>Purchase History</h1>
<br>
<br>
<form action="" method="post"> 
	
	<div>
	<table style="width: 100%;text-align:center">
			<tr>
				<td class="rightBorder">Date/Time</td> 
				<td class="rightBorder">Book Name</td>
				<td class="bottomBorder">Book Quantity</td>
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
