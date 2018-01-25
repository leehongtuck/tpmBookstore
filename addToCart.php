<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();

    $bookId=$_POST['hiddenId'];
    $quantity=$_POST['quantity'];

    if(isset($_SESSION['cart'])){
        $_SESSION['cart'][$bookId] = $quantity;
    }
    else{
        $_SESSION['cart'] = array(
            $bookId => $quantity
        );
    }
    echo 
        "<script>alert('Item Added To Cart');
        window.location.replace(\"index.php\");
        </script>";
}
?>