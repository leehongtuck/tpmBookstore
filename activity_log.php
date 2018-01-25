<?php 
$title = "Activity_log";
require_once "inc/memberHeader.php"?> 


<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Activity log</title>
</head>

<body class="background">
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
	
	<div>
	
		<table style="width: 100%">
			<tr>
				<td>Date</td>
				<td>Type</td>
				<td>Activity Description</td>
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
