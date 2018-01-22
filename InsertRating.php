<?php
include("inc/conn.php");
/* Check If Member Is Rating Their Own Comment */
$sql="SELECT * FROM feedback WHERE memberId='$userId'";
$result = mysqli_query($conn, $sql);  
if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
			{
				$memCheck=$row['memberId'];
	}
	}

if($memCheck == $_POST['hiddenMemberId']){
			 echo '<script type="text/javascript">
					alert("You cannot rate on your own comment!");
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'");
					</script>';
}
else{
	/* Check If User Have Already Rated The Comment */
$sql1="SELECT * FROM feedbackRating";
$result1 = mysqli_query($conn, $sql1);  
if(mysqli_num_rows($result1)>0)  
	{  
			 echo '<script type="text/javascript">
					alert("You have already rated this feedback!");
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'"); 					
					</script>';	
	}
else{
	 /* Insert Rating */
if($_POST['rateComment']==True){
		
		$sql="INSERT INTO feedbackRating (memberId, feedbackId,feedbackRating)
		VALUES
		('$userId','$_POST[hiddenFeedbackId]','$_POST[feedbackRating]')";
		
		if (mysqli_query($conn,$sql)){ 
			 echo '<script type="text/javascript">
					alert("Thank You For Rating!!");
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'"); 					
					</script>';
			}
			else{
			 die('Error: ' . mysqli_error($conn));   
			 mysqli_close($conn);
			}
	}
}
<<<<<<< HEAD
	}
=======
}
		
	
>>>>>>> d067ed81835eeb82592e4d8c995a48b46671784f
?>