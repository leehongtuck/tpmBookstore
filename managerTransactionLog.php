<?php 
$title = "Users Transactions";
require_once "inc/managerHeader.php";
$result=mysqli_query($conn, "SELECT * FROM member INNER JOIN payment ON member.memberId=payment.memberId INNER JOIN bookpurchase ON payment.paymentId=bookpurchase.paymentId INNER JOIN book ON bookpurchase.bookId=book.bookId");
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

</head>

<body>
<div id="log"> 

<h1>Users Transactions</h1>
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
echo $row['paymentDateTime'];
echo"</td>";  

echo"<td>";
echo $row['memberName'];
echo " has bought ";
echo $row['purchaseQuantity'] . " ";
echo $row['bookTitle'];
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
