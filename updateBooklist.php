<?php
include("inc/conn.php");
/*TITLE*/
foreach ($_POST['booktitle'] as $id => $value ){
	$sql="UPDATE book set bookTitle='$value' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 1";
	}
}
/*IMAGE*/
foreach ($_FILES['bookImage']['tmp_name'] as $id => $value){
$target_dir="img/";
$temp = explode(".", $_FILES["bookImage"]["name"][$id]);
$newfilename = "$id".".". end($temp);
$target_file= $target_dir . $newfilename;
if(move_uploaded_file($_FILES["bookImage"]['tmp_name'][$id],$target_file)){
	echo "you made it";
}
else{
	echo "no image updated";
}
}
/*GENRE*/
if (isset($_POST['bookgenre'])) { 
foreach ($_POST['bookgenre'] as $id => $value6 ){
	$sql="UPDATE book set genreId='$value6' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 8";
	}
}
}
/*DESCRIPTION*/
foreach ($_POST['bookdesc'] as $id => $value1 ){
	$sql="UPDATE book set bookDescription='$value1' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 2";
	}
}
/*BOOK AUTHOR*/
foreach ($_POST['bookauth'] as $id => $value2 ){
	$sql="UPDATE book set bookAuthor='$value2' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 3";
	}
}
/*PUBLISHER*/
foreach ($_POST['bookpub'] as $id => $value7 ){
	$sql="UPDATE book set bookPublisher'$value7' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 4";
	}
}
/*PUBLISH DATE*/
foreach ($_POST['bookpubd'] as $id => $value3 ){
	$sql="UPDATE book set bookPublishDate='$value3' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 4";
	}
}

/*PRICE*/
foreach ($_POST['bookprice'] as $id => $value5 ){
	$sql="UPDATE book set bookPrice='$value5' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 6";
	}
}
/*QUANTITY*/
foreach ($_POST['bookq'] as $id => $value6 ){
	$sql="UPDATE book set bookQuantity='$value6' WHERE bookId='$id'";
	if(mysqli_query($conn,$sql)) {
		echo "you made it 8";
	}
}
echo '<script type="text/javascript">
		alert("Book Updated!");
		window.location.replace("vieweditBooklist.php"); 		
	  </script>';	
	
?>