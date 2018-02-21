<?php 
$title = "Activity log";
require_once "inc/memberHeader.php";
$result=mysqli_query($conn,"SELECT * FROM member INNER JOIN memberreward ON member.memberId=memberreward.memberId INNER JOIN reward ON memberreward.rewardId=reward.rewardId WHERE memberreward.memberId='$_SESSION[memberId]'");
if($member == null)
	header('location:index.php');
?> 



<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Redeem Reward History</title>
</head>

<body class="background">
<div id="activity"> 

<h1>Claimed Reward History</h1>
<br>
<br> 
	
	<div>
	<table style="width: 100%;text-align:center;table-layout: fixed;">
			<tr>
				<td class="rightBorder">Date/Time</td> 
				<td class="rightBorder">Claimed Reward</td> 
				<td class="bottomBorder">Quantity</td>
			</tr> 
			
<?php
while($row=mysqli_fetch_array($result))
{  

echo "<tr>";

echo"<td>";
echo $row['claimDateTime'];
echo"</td>";  

echo"<td>";
echo $row['rewardName'];
echo"</td>";  

echo"<td>";
echo$row['claimQuantity'];
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

