<?php 
$title = "Feedback Rating Log";
require_once "inc/managerHeader.php";
$result=mysqli_query($conn, "SELECT * FROM feedbackrating AS fr INNER JOIN member AS m ON fr.memberId = m.memberId INNER JOIN feedback AS f on fr.feedbackId = f.feedbackId");
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Member Feeback Rating Log</title>

</head>

<body>
<div id="log"> 

<h1>Member Transaction Log</h1>
<br>
<br> 
	
	<div>
	<table style="width: 100%;text-align:center;table-layout: fixed;">
			<tr>
				<td class="rightBorder">Date/Time</td> 
				<td class="bottomBorder">Description</td>
			</tr> 
			
<?php
while($row=mysqli_fetch_array($result))
{  

echo "<tr>";

echo"<td>";
echo $row['feedbackRatingDateTime'];
echo"</td>";  

echo"<td>";
echo $row['memberName'];
echo " has rated ";
echo $row['bookComment'];
echo "   as  ";
echo $row['feedbackRating'];
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