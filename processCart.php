<?php
$qty = $_REQUEST["qty"];
$bookId = $_REQUEST["bookId"];

$_SESSION['cart']["$bookId"] = $qty;
echo $_SESSION['cart']["$bookId"];
echo $bookId;
?>