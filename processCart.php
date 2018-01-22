<?php
$qty = $_GET["qty"];
$bookId = $_GET["bookId"];

$_SESSION['cart']["$bookId"] = $qty;
echo $_GET["qty"];
echo $_GET["bookId"];
?>