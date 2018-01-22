<?php

$bookId='b003';
$quantity=5;

if(isset($_SESSION['cart'])){
    $_SESSION['cart']["$bookId"] = $quantity;
}
else{
    $_SESSION['cart'] = array(
        "$bookId" => "$quantity"
    );
}
/* $_SESSION['cart'] =array(
        'b001' => '3',
        'b002' => '5'
    );*/
echo "Success!";
?>