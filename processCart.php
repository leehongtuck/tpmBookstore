<?php
session_start();
$qty = $_GET["qty"];
$bookId = $_GET["bookId"];

$_SESSION['cart'][$bookId] = $qty;
?>