<?php
include("inc/conn.php");
/*NAME*/
foreach ($_POST['rewardname'] as $id => $value ){
	$sql="UPDATE reward set rewardName='$value' WHERE rewardId='$id'";
	mysqli_query($conn,$sql);
}
/*DESC*/
foreach ($_POST['rewarddesc'] as $id => $value1 ){
	$sql="UPDATE reward set rewardDescription='$value1' WHERE rewardId='$id'";
	mysqli_query($conn,$sql);
}
/*POINT*/
foreach ($_POST['rewardpoint'] as $id => $value2 ){
	$sql="UPDATE reward set rewardPoint='$value2' WHERE rewardId='$id'";
	mysqli_query($conn,$sql);
}
/*QUANTITY*/
foreach ($_POST['rewardq'] as $id => $value3 ){
	$sql="UPDATE reward set rewardQuantity='$value3' WHERE rewardId='$id'";
	mysqli_query($conn,$sql);
}

echo '<script type="text/javascript">
		alert("Reward Updated!");
		window.location.replace("vieweditRewardlist.php"); 					
	  </script>';	
	
?>