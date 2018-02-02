<?php
$title = "Checkout";
require_once "inc/memberHeader.php";
if($_SESSION['cart']==null){
    echo "<script>alert(\"Please add an item to cart before proceeding to checkout.\");
            window.location.replace(\"/tpmBookstore/cart.php\");</script>";
} 
if($_SERVER['REQUEST_METHOD']=="POST"){
    
    //select paymentId
    $sql="SELECT paymentId FROM payment ORDER BY paymentId DESC LIMIT 1 ";
			$result=mysqli_query($conn, $sql);
			$paymentId;
			if($row=mysqli_fetch_array($result)){
				$paymentId=++$row[0];
			}else{
				$paymentId='P001'; 
            }
    //insert payment info
    $sql = "INSERT INTO payment(paymentId, memberId)
        VALUES ('$paymentId', '$member[id]')";
    mysqli_query($conn, $sql);

    //insert books purchased

    $book[] = array();
    $qty[] = array();
    for($i=1; $i<=$_POST['numBook']; $i++){
        $book[$i]= $_POST['book'.$i];
        $qty[$i]= $_POST['qty'.$i];
        $sql = "INSERT INTO bookpurchase(paymentId, bookId, purchaseQuantity)
            VALUES ('$paymentId', '$book[$i]', '$qty[$i]')";
        mysqli_query($conn, $sql);
        //update book inventory value
        $sql = "UPDATE book
            SET bookQuantity = bookQuantity - '$qty[$i]'
            WHERE bookId = '$book[$i]'";
        mysqli_query($conn, $sql);
    }
    unset($_SESSION['cart']);
    echo "<script>alert('Purchase Successful!');
        window.location.replace('index.php');        
    </script>";
}
?>
<form method="post" id="checkoutForm">
    <div id="checkoutTitle">
        <h1>Checkout</h1>
    </div>
    <table id="checkoutTable">
        <tr>
            <th>Book</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>     
    <?php
    $numBook = 0;
    $totalPrice = 0;
    $totalQuantity = 0;
    if(isset($_SESSION['cart'])):
        foreach ($_SESSION['cart'] as $bookId => $quantity):
            ++$numBook;
            $sql = "SELECT bookTitle, bookPrice FROM book WHERE bookId = '$bookId' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result)?>
            <tr class="cartItem">
                <td><?=$row[0];?></td>
                <td><?=$quantity;?></td>
                <td>RM<?=$row[1]*$quantity;?></td>
            </tr>
            <input type="hidden" name="book<?=$numBook?>" value="<?=$bookId?>">
            <input type="hidden" name="qty<?=$numBook?>" value="<?=$quantity?>">
            <?php
            $totalPrice += ($row[1]*$quantity);
            $totalQuantity += $quantity;
        endforeach;       
    endif;
    ?>
    <tr>
        <td>Total:</td>
        <td><?=$totalQuantity?></td>
        <td>RM<?=$totalPrice?></td>
    <input type="hidden" name="numBook" value="<?=$numBook?>">
    </table>
    <div id="checkoutFooter">
        <button class="btn"><a href="cart.php">Back To Cart</a></button>
        <input class="btn" type="submit" value="Purchase Items">
    </div>
</form>
