<?php
$bookId=$_GET['bookId'];
$quantity=$_GET['qty'];

if(isset($_SESSION['cart'])){
    $_SESSION['cart']["$bookId"] = $quantity;
}
else{
    $_SESSION['cart'] = array(
        "$bookId" => "$quantity"
    );
}

echo "Success!";
?>