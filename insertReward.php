<?php
include("inc/conn.php");
//SETTING THE BOOKID VARIABLE
	$sql="SELECT rewardId FROM reward ORDER BY rewardId DESC LIMIT 1 ";
	$result=mysqli_query($conn, $sql);
	$rewardId;
	if($row=mysqli_fetch_array($result)){
	$rewardId=++$row[0];
	}else{
		$rewardId='O001'; 
	}
	//INSERT RECORD INTO DATABASE
	$sql="INSERT INTO reward (rewardId,rewardName,rewardDescription,rewardPoint,rewardQuantity)
	VALUES
	('$rewardId','$_POST[rewardName]','$_POST[rewardDesc]','$_POST[rewardPoint]','$_POST[rewardQuantity]')";
	if (mysqli_query($conn,$sql)){ 
				// Check for errors
				if($_FILES['rewardImage']['error'] > 0){
					die('An error ocurred when uploading.');
				}

				if(!getimagesize($_FILES['rewardImage']['tmp_name'])){
					die('Please ensure you are uploading an image.');
				}

				// Check filetype
				if($_FILES['rewardImage']['type'] != 'image/png' && $_FILES['rewardImage']['type'] != 'image/jpeg'){
					die('Unsupported filetype uploaded.');
				}

				// Check filesize
				if($_FILES['rewardImage']['size'] > 100000000){
					die('File uploaded exceeds maximum upload size.');
				}

				// Check if the file exists
				if(file_exists('img/' . $_FILES['rewardImage']['name'])){
					die('File with that name already exists.');
				}

				// Upload file
				$temp = explode(".", $_FILES["rewardImage"]["name"]);
				$newfilename = "$rewardId".".". end($temp);
				if(!move_uploaded_file($_FILES['rewardImage']['tmp_name'], 'img/' . $newfilename)){
					die('Error uploading file - check destination is writeable.');
				}

				echo '<script type="text/javascript">
				alert("New Reward Added!");
				window.location.replace("vieweditRewardlist.php"); 					
				</script>';

		}

	
	
	else{
	die('Error: ' . mysqli_error($conn));   
	mysqli_close($conn);
				}
?>