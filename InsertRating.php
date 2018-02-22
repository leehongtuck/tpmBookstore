<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	include("inc/session.php");
	
	if($member==null){
				echo '<script type="text/javascript">
						alert("Please login to rate this comment!");
						window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'");
					  </script>';		
	}
	else{
		/* Check If Member Is Rating Their Own Comment */
		$sql="SELECT * FROM feedback WHERE memberId='$member[id]' AND bookId ='$_POST[hiddenBookId]'";
		$result = mysqli_query($conn, $sql);  
		if(mysqli_num_rows($result) > 0) {  
		
			$memCheck=$row['memberId'];
			if($memCheck == $_POST['hiddenMemberId']){
				echo '<script type="text/javascript">
						alert("You cannot rate on your own comment!");
						window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'");
						</script>';
			}	
		}
		 else{
			 /* Check If User Have Selected a Rating */
				$rating = isset($_POST['feedbackRating']);
				if($rating == false){
					echo '<script type="text/javascript">
							alert("Please select a rating!"); 
							window.location.replace("bookDetail.php?id='.$_POST['hiddenBookIdRating'].'"); 					
							</script>';					
				}
				else{
				/* Check If User Have Already Rated The Comment */
				$sql1="SELECT * FROM feedbackRating WHERE memberId='$member[id]' AND feedbackId = '$_POST[hiddenFeedbackId]'";
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
					$sql="INSERT INTO feedbackRating (memberId, feedbackId,feedbackRating)
					VALUES
					('$member[id]','$_POST[hiddenFeedbackId]','$_POST[feedbackRating]')";
					
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
		}
	}
}	
?>