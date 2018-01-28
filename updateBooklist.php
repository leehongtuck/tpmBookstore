<?php
include("inc/conn.php");
/*TITLE*/
foreach (array_combine($_POST['booktitle'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookTitle='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*DESCRIPTION*/
foreach (array_combine($_POST['bookdesc'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookDescription='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*GENRE*/
foreach (array_combine($_POST['bookgenre'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE genre g INNER JOIN book b ON g.genreId = b.genreId set g.genre='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*PRICE*/
foreach (array_combine($_POST['bookprice'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookPrice='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*BOOK AUTHOR*/
foreach (array_combine($_POST['bookauth'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookAuthor='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*PUBLISHER*/
foreach (array_combine($_POST['bookpub'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookPublisher='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*PUBLISH DATE*/
foreach (array_combine($_POST['bookpubd'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookPublishDate='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}
/*QUANTITY*/
foreach (array_combine($_POST['bookq'] , $_POST['bookid']) as $value => $id ){
	$sql="UPDATE book set bookQuantity='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it";
	}
	else{
		echo "you fail";
	}
}

echo '<script type="text/javascript">
					alert("Book Updated!");
					window.location.replace("vieweditBooklist.php"); 					
					</script>';	

		
?>