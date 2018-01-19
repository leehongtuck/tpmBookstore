<?php
include("inc/conn.php");
/*check reward quantity*/
$sql1="SELECT * FROM reward WHERE rewardId='".$_POST['hiddenId']."'";
$result1 = mysqli_query($conn, $sql1);  
if(mysqli_num_rows($result1) > 0)  
	{  
		while($row1 = mysqli_fetch_array($result1))  
			{
				$rewardCheck=$row1["rewardQuantity"];

/*check user point*/
$sql="SELECT * FROM member WHERE memberId=".$userId."'";
$result = mysqli_query($conn, $sql);  
if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
			{
				$memberCheck=$row["memberPoint"];
				
$requirePoint= $_POST["hiddenPoint"]*$_POST["quantity"];			
	
			
if ($memberCheck >= $requirePoint && $rewardCheck >= $_POST['quantity']){
$sql="INSERT INTO memberReward (memberId,rewardId,claimQuantity)
VALUES
('$userId','$_POST[hiddenId]','$_POST[quantity]')";

		if (mysqli_query($conn,$sql)){ 
				/*minus user point*/
				$sql2="UPDATE member SET memberPoint=memberPoint-".$requirePoint." WHERE memberId=".$userId."'";
				if(mysqli_query($conn,$sql2)){
					/*minus reward quantity*/
					$sql3="UPDATE reward set rewardQuantity=rewardQuantity-".$_POST['quantity']." WHERE rewardId='".$_POST['hiddenId']."'";
					if(mysqli_query($conn,$sql3)){
					echo '<script type="text/javascript">
					 alert("You have claimed your reward!");
					 window.location.replace("rewardPage.php");  					 
					 </script>';
					}
					 else{
						 
					 }
					 
				}
				else{
				}
				
			}
			else{
			 die('Error: ' . mysqli_error($conn));   
			 mysqli_close($conn);
			}
}
else {
		echo '<script type="text/javascript">
				alert("You do not have enough point to claim the reward or the quantity exceeds.");
				window.location.replace("rewardPage.php"); 					
				</script>';
			}
	}
	}
			}
	}
mysqli_close($conn); 
?>

