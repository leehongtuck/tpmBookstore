<?php
$title = "Cart";
require_once "inc/memberHeader.php";
?>
<div id="cart">
    <div id="cartContent">
        <div id="cartTitle"><h2>Cart</h2></div>
    
    
    
        <?php
        if(isset($_SESSION['cart'])):
            foreach ($_SESSION['cart'] as $bookId => $quantity) {
            $sql = "SELECT bookTitle, bookPrice FROM book WHERE bookId = '$bookId' ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)):?>
            <div class="cartItem flex">
                <div class="cartItemDesc">
                    <a href="bookdetail.php/?id=<?=$bookId?>"><?=$row[0];?></a>
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
                <div class="cartItemRemove"><i class="far fa-times-circle" onclick="removeCart('<?=$bookId?>')"></i></div>
            </div>
            <?php
            endwhile;
            }
        endif;
        ?> 
        
        <div class="cartFooter">
        <button class="btn" onclick="checkout()">Checkout</button>
    </div>
    
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

    function removeCart(bookId){
        var bookId = bookId;
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
          if (this.status == 200) {
            console.log(this.responseText);
          }
        }
        xhr.open("GET", "removeCart.php/?id="+ bookId, true);
        xhr.send();  
        document.location.reload(true);  
    }

    function checkout(){
        var member ="<?php if($member==null) echo "null";?>";
        if(member=="null"){
            alert("Please log in before proceeding to checkout.");
            window.location.replace("/tpmBookstore/login.php");
        }else
            window.location.replace("/tpmBookstore/checkout.php");
        
            
        
    }
</script>

<?php
include_once("inc/memberFooter.php");
?>

        