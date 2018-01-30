<?php
include("inc/conn.php");
//SETTING THE GENREID VARIABLE
	$sql="SELECT genreId FROM genre ORDER BY genreId DESC LIMIT 1 ";
	$result=mysqli_query($conn, $sql);
	$genreId;
	if($row=mysqli_fetch_array($result)){
	$genreId=++$row[0];
	}else{
		$genreId='O001'; 
	}
	//INSERT RECORD INTO DATABASE
	$sql="INSERT INTO genre (genreId,genre)
	VALUES
	('$genreId','$_POST[genre]')";
	if (mysqli_query($conn,$sql)){ 

			echo '<script type="text/javascript">
				alert("New Genre Added");
				window.location.replace("vieweditBooklist.php"); 					
				</script>';
			}
	
	else{
	die('Error: ' . mysqli_error($conn));   
	mysqli_close($conn);
				}
