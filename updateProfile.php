<?php
include("inc/conn.php");
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$sql = "UPDATE member SET memberName='$_POST[memName]',memberAddress='$_POST[memAddress]',memberPhone='$_POST[memPhone]',memberCreditCard='$_POST[memCreditCard]' WHERE memberId=$userId;";
	if (mysqli_query($conn,$sql)){
		echo'<script type="text/javascript">
			alert("Your profile has been successfully updated.");
			window.location.replace("myProfile.php"); 					
			</script>';
	}
	else{
		die('Error: ' . mysqli_error($conn));
	}
}
	mysqli_close($conn);
?>