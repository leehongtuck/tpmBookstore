<?php 
$title = "Activity Log";
require_once "inc/memberHeader.php";
if($member == null)
	header('location:index.php');
?> 

<<<<<<< HEAD

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Activity log</title>

</head>

<body class="background">
<div id="activity"> 

<h1>Purchase History</h1>
<br>
<br>
<form action="" method="post"> 
=======
<div id="activity">
<form action="" method="post">
	<table style="width: 100%">
		<tr>
			<td><select name="SearchDate" id="filterBtn">
			<option>Select Date</option>
			</select>
			</td>
			
			<td><select name="SearchType" id="filterBtn">
			<option>Select Type of Activity</option>
			</select>
			</td>
			
			
            </form>
            </td>		
       </tr>
	</table>
>>>>>>> d69950a60df3ef93210bcd26936d477b97a3c287
	
	<div>
	<table style="width: 100%;text-align:center">
			<tr>
				<td class="rightBorder">Date</td>
				<td class="rightBorder">Type</td>
				<td class="bottomBorder">Activity Description</td>
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
