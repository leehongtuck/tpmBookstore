<?php
require_once "inc/conn.php";

$q = $_REQUEST["q"];
$sql = "SELECT bookTitle FROM book WHERE bookTitle LIKE '$q%'";
$query= mysqli_query($conn, $sql);
$search = "";
while($result = mysqli_fetch_array($query)){
    $search.= "<p>". $result[0] ."</p>";
}
echo $search;
?>