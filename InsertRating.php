<?php
include("inc/conn.php");
$sql1="SELECT * FROM feedbackRating WHERE memberId=".$userId."'";
$result = mysqli_query($conn, $sql1);  
if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
			{
				$memberCheck=$row["memberId"];
			}
if (isset($memberCheck)){
			 echo '<script type="text/javascript">
					alert("You have already rate this feedback!");
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'"); 					
					</script>';
}
else{
if($_POST['rateComment']==True){
		
		$sql="INSERT INTO feedbackRating (memberId, feedbackId,feedbackRating)
		VALUES
		('$userId','$_POST[hiddenFeedbackId]','$_POST[feedbackRating]')";
		
		if (mysqli_query($conn,$sql)){ 
			 echo '<script type="text/javascript">
					alert("Thank You For Rating!!");
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookId'].'"); 					
					</script>';
			}
			else{
			 die('Error: ' . mysqli_error($conn));   
			 mysqli_close($conn);
			}
	}
?>