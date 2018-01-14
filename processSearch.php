<?php
require_once "inc/conn.php";

$q = $_REQUEST["q"];
$sql = "SELECT name FROM name WHERE name LIKE '%$q%'";
$query= mysqli_query($conn, $sql);
$search = "";
while($result = mysqli_fetch_array($query)){
    $search.= "<p>". $result[0] ."</p>";
}
echo $search;
?>