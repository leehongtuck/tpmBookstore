<?php
include("inc/conn.php");
$sql1="SELECT * FROM member WHERE memberId=".$userId."'";
$result = mysqli_query($conn, $sql1);  
if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
			{
				$memberCheck=$row["memberPoint"];
			}
$requirePoint= $_POST["hiddenPoint"]*$_POST["quantity"];			
			
			
if ($memberCheck >= $requirePoint){
$sql="INSERT INTO memberReward (memberId,rewardId,claimQuantity)
VALUES
('$userId','$_POST[hiddenId]','$_POST[quantity]')";

		if (mysqli_query($conn,$sql)){ 
			 echo '<script type="text/javascript">
					alert("You have claimed your reward!");
					window.location.replace("rewardPage.php"); 					
					</script>';
			}
			else{
			 die('Error: ' . mysqli_error($conn));   
			 mysqli_close($conn);
			}
}
mysqli_close($conn); 
?>

