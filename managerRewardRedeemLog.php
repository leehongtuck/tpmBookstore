<?php 
$title = "Users Claimed Rewards";
require_once "inc/managerHeader.php";
$result=mysqli_query($conn, "SELECT * FROM member INNER JOIN memberreward ON member.memberId=memberreward.memberId INNER JOIN reward ON memberreward.rewardId=reward.rewardId ");
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

</head>

<body>
<div id="log"> 

<h1>Users Claimed Rewards</h1>
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
echo $row['claimDateTime'];
echo"</td>";  

echo"<td>";
echo $row['memberName'];
echo " has claimed ";
echo $row['claimQuantity']. " ";
echo $row['rewardName'];
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