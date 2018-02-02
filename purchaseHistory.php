<?php 
$title = "Activity Log";
require_once "inc/memberHeader.php"; 
$result=mysqli_query($conn,"SELECT * FROM bookPurchase INNER JOIN book ON bookpurchase.bookId=book.bookId INNER JOIN payment ON bookpurchase.paymentId=payment.paymentId WHERE memberId='$_SESSION[memberId]'");
if($member == null)
	header('location:index.php');
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


	<div>
	<table style="width: 100%;text-align:center"> 
	
	
			<tr>
				<td class="rightBorder">Date/Time</td> 
				<td class="rightBorder">Book Name</td>
				<td class="bottomBorder">Book Quantity</td>
			</tr>
			
<?php
while($row=mysqli_fetch_array($result))
{ 

echo"<tr>";

echo"<td>";
echo$row['paymentDateTime'];
echo"</td>"; 

echo"<td>";
echo$row['bookTitle'];
echo"</td>"; 

echo"<td>";
echo$row['purchaseQuantity'];
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
