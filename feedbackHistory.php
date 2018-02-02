<?php 
$title = "Activity log";
require_once "inc/memberHeader.php";
$result=mysqli_query($conn,"SELECT * FROM member INNER JOIN feedback ON member.memberId=feedback.memberId INNER JOIN book ON feedback.bookId=book.bookId  WHERE feedback.memberId='$_SESSION[memberId]'");
if($member == null)
	header('location:index.php');
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
	
	<div>
	<table style="width: 100%;text-align:center;table-layout: fixed;">
			<tr>
				<td class="rightBorder">Book</td> 
				<td class="rightBorder">Rating/Comment</td> 
				<td class="bottomBorder">Date/Time</td>
			</tr> 
			
<?php
while($row=mysqli_fetch_array($result))
{  

echo "<tr>";

echo"<td>";
echo $row['bookTitle'];
echo"</td>";  

echo"<td>";
echo $row['bookRating'];
echo "/10 ";
echo $row['bookComment'];
echo"</td>";  

echo"<td>";
echo$row['feedbackDateTime'];
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

<?php
include_once("inc/memberFooter.php");
?>
