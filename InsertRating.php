<?php
include("inc/conn.php");

if($_POST['rateComment']==True){
		
		$sql="INSERT INTO feedbackRating (memberId, feedbackId,feedbackRating)
		VALUES
		('$userId','$_POST[hiddenFeedbackId]','$_POST[feedbackRating]')";
		
		if 
		(!mysqli_query($conn,$sql))
		 { die('Error: ' . mysqli_error($conn)); }
		mysqli_close($conn);
		}
?>