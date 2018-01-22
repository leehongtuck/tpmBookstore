<?php
$title = "Cart";
require_once "inc/memberHeader.php";
?>
<div id="cart">
    <div id="cartHeader">
        <div id="cartTitle"><h2>Cart</h2></div>
    </div>
    
    <div id="cartContent">
        <?php
        foreach ($_SESSION['cart'] as $bookId => $quantity) {
        $sql = "SELECT bookTitle, bookPrice FROM book WHERE bookId = '$bookId' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)):?>
        <div class="cartItem flex">
            <div class="cartItemDesc">
                <a href="book.php/?id=<?=$bookId?>"><?=$row[0];?></a>
            </div>
            <div class="cartItemNum">
                <span class="cartItemMinus" onclick="changeQuantity(-1, 
                document.getElementById('<?=$bookId?>Quantity'), '<?=$bookId?>',
                document.getElementById('<?=$bookId?>Price') )">
                    <i class="fas fa-minus-circle"></i>
                </span> 
                <span  class="cartItemQuantity" id="<?=$bookId?>Quantity"><?=$quantity;?></span>
                <span class="cartItemPlus" onclick="changeQuantity(1, 
                document.getElementById('<?=$bookId?>Quantity'), '<?=$bookId?>',
                document.getElementById('<?=$bookId?>Price'))">
                    <i class="fas fa-plus-circle"></i>
                </span> 
            </div>
            <div class="cartItemPrice" id="<?=$bookId?>Price">RM<?=$row[1]*$quantity;?></div>
        </div>
        <?php
        endwhile;
        }
        ?>
        <button class="btn">Checkout</button>
    </div>
</div>
<script>
    function changeQuantity(change, quantity, bookId, price) {
      var qty = parseInt(quantity.innerHTML);
      var prc = parseInt(price.innerHTML.substr(2));
      if ((change==1 && qty < 10) ||  (change==-1 && qty > 1)){
        var result = qty + change;
        var newPrc = prc/qty * result;
        price.innerHTML = "RM" + newPrc;
        //parseInt(price.innerHTML)/(qty) * result;
        quantity.innerHTML = result;
        
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
          if (this.status == 200) {
            console.log(this.responseText);
          }
        }
        xhr.open("GET", "processCart.php/?qty="+ result + "&bookId=" + bookId, true);
        xhr.send();    
      }
	}
</script>
        