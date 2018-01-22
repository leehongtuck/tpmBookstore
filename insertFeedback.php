<?php
include("inc/conn.php");
/* Limit User To Give Feedback Only Once */
$sql1="SELECT * FROM feedback";
$result1 = mysqli_query($conn, $sql1);  
if(mysqli_num_rows($result1) > 1)  
	{  
					echo '<script type="text/javascript">
					alert("You have already insert a feedback!");
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookId'].'"); 					
					</script>';
	}
else{
		/* Check If User Have Selected A Rating Star */
		$rating= isset($_POST['rating']);
		if ($rating == False) {
			echo '<script type="text/javascript">
					alert("Please Select a star!"); 
					window.location.replace("bookDetail.php?id='.$_POST['hiddenBookId'].'"); 					
					</script>';
		}
		else{
			//SETTING THE FEEDBACKID VARIABLE
			$sql="SELECT feedbackId FROM feedback ORDER BY feedbackId DESC LIMIT 1 ";
			$query=mysqli_query($conn, $sql);
			$feedbackId;
			if($result=mysqli_fetch_array($query)){
				echo"what";
				$feedbackId=(int)substr($result[0], 1, 3)+1;
				$feedbackId='F'.str_pad("00", 3, $feedbackId);
			}else{
				$feedbackId='F001'; 
			}
			//INSERT RECORD INTO DATABASE
			$sql="INSERT INTO feedback (feedbackId,bookRating,bookComment,bookId,memberId,feedbackStatus)
			VALUES
			('$feedbackId','$_POST[rating]','$_POST[comment]','$_POST[hiddenBookId]','$userId','0')";
			if (mysqli_query($conn,$sql)){ 
				$lastId = mysqli_insert_id($conn);
				$lastId = mysqli_real_escape_string($conn,$lastId);
				 echo '<script type="text/javascript">
						alert("Thank You For Your Feedback!");
						window.location.replace("bookDetail.php?id='.$_POST['hiddenBookId'].'"); 					
						</script>';
				}
				else{
				 die('Error: ' . mysqli_error($conn));   
				 mysqli_close($conn);
				}
	}
}
			
	
?>
