<?php
foreach($_SESSION['cart'] as $key => $value){
    echo $key . $value;
}
echo $_SESSION['cart']["$bookId"];

unset($_SESSION['cart']["$bookId"]);
?>