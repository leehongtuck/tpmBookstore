<?php 
$title = "System log";
require_once "inc/managerHeader.php";
$result=mysqli_query($conn, "SELECT * FROM member INNER JOIN feedback ON member.memberId=feedback.memberId INNER JOIN book ON feedback.bookId=book.bookId");
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Member Feedback Log</title>

</head>

<body>
<div id="log"> 

<h1>Member Feedback Log</h1>
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
echo $row['feedbackDateTime'];
echo"</td>";  

echo"<td>";
echo $row['memberName'];
echo " has rate ";
echo $row['bookTitle'];
echo "     as      ";
echo $row['bookRating'];
echo " / 10 ";
echo"</td>";  

if ($row['bookComment']!=null){

echo"<td>";
echo $row['memberName'];
echo " has commented ";
echo $row['bookTitle'];
echo " “";
echo $row['bookComment'];
echo " ” ";
echo"</td>";  
} 

else{
echo "<td>";
echo " No book comment given";
echo "</td>"; 
}


echo"</tr>";

}
mysqli_close($conn);

?>


</table>
	
	</div>
	</div>


</body>

</html> 
