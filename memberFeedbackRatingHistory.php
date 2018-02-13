<?php 
$title = "Activity log";
require_once "inc/memberHeader.php";
$result=mysqli_query($conn,"SELECT * FROM member INNER JOIN feedbackrating ON member.memberId=feedbackrating.memberId INNER JOIN feedback ON feedbackrating.feedbackId=feedback.feedbackId  WHERE feedbackrating.memberId='$_SESSION[memberId]'");
if($member == null)
	header('location:index.php');
?> 



<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Feedback Rating History</title>
</head>

<body class="background">
<div id="activity"> 

<h1>Feedback Rating History</h1>
<br>
<br> 
	
	<div>
	<table style="width: 100%;text-align:center;table-layout: fixed;">
			<tr>
				<td class="rightBorder">Date/Time</td> 
				<td class="rightBorder">Feedback Rating</td> 
				<td class="bottomBorder">Feedback Comment</td>
			</tr> 
			
<?php
while($row=mysqli_fetch_array($result))
{  

echo "<tr>";

echo"<td>";
echo $row['feedbackRatingDateTime'];
echo"</td>";  

echo"<td>";
echo $row['feedbackRating'];
echo"</td>";  

echo"<td>";
echo$row['bookComment'];
echo"</td>";  

echo"</tr>";

}
mysqli_close($conn);

?>







			
		</table>
	
	</div>
	</div>

</body>

</html>



<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
