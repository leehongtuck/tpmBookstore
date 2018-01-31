<?php
include("inc/conn.php");
//SETTING THE BOOKID VARIABLE
	$sql="SELECT bookId FROM book ORDER BY bookId DESC LIMIT 1 ";
	$result=mysqli_query($conn, $sql);
	$bookId;
	if($row=mysqli_fetch_array($result)){
	$bookId=++$row[0];
	}else{
		$bookId='O001'; 
	}
	//INSERT RECORD INTO DATABASE
	$sql="INSERT INTO book (bookId,bookTitle,bookDescription,bookPrice,bookAuthor,bookPublisher,bookPublishDate,genreId)
	VALUES
	('$bookId','$_POST[bkTitle]','$_POST[bkDesc]','$_POST[bkPrice]','$_POST[bkAuth]','$_POST[bkpub]','$_POST[bkpubd]','$_POST[bkGenre]')";
	if (mysqli_query($conn,$sql)){ 
				// Check for errors
				if($_FILES['bookImage']['error'] > 0){
					die('An error ocurred when uploading.');
				}

				if(!getimagesize($_FILES['bookImage']['tmp_name'])){
					die('Please ensure you are uploading an image.');
				}

				// Check filetype
				if($_FILES['bookImage']['type'] != 'image/png' && $_FILES['bookImage']['type'] != 'image/jpeg'){
					die('Unsupported filetype uploaded.');
				}

				// Check filesize
				if($_FILES['bookImage']['size'] > 100000000){
					die('File uploaded exceeds maximum upload size.');
				}

				// Check if the file exists
				if(file_exists('img/' . $_FILES['bookImage']['name'])){
					die('File with that name already exists.');
				}

				// Upload file
				$temp = explode(".", $_FILES["bookImage"]["name"]);
				$newfilename = "$bookId".".". end($temp);
				if(!move_uploaded_file($_FILES['bookImage']['tmp_name'], 'img/' . $newfilename)){
					die('Error uploading file - check destination is writeable.');
				}

				echo '<script type="text/javascript">
				alert("New Book Added!");
				window.location.replace("vieweditBooklist.php"); 					
				</script>';

		}

	
	
	else{
	die('Error: ' . mysqli_error($conn));   
	mysqli_close($conn);
				}
?>