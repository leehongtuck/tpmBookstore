<?php
require_once "inc/conn.php";

$q = $_REQUEST["q"];
$sql = "SELECT bookId, bookTitle FROM book WHERE bookTitle LIKE '$q%'";
$query= mysqli_query($conn, $sql);
$search = "";
while($result = mysqli_fetch_array($query)){
    $search.= "<p><a href=\"book.php/?". $result[0] ."\">" . $result[1] ."</a></p>";
}
echo $search;
?>