<?php
require_once "inc/conn.php";
?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?="TPM BOOKSTORE | " . $title?></title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/member.css">
   </head>
   <body>
     <header>
       <div id="headerUpper" class="flex">
          <div id="logoContainer">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
          </div>
          <form id="searchContainer">
            <i class="fas fa-search"></i>
            <input type="text" onkeyup="ajaxSearch(this.value)">
            <div id="searchResults">
            </div>
          </form>
          <div id="userContainer">
            <button class="btn "><span>Login</span><i class="fas fa-sign-in-alt"></i></button>
          </div>
       </div>
       <div id="headerLower" class="flex">
        <nav>
            <?php
            $sql = "SELECT genreId, genre FROM genre";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
                echo "<a href=\"genre.php/?id=". $row[0]."\">". $row[1] ."</a>";
            }
            ?>
        </nav>
        <div id="cartContainer" onclick="openCart()">
          <i class="fas fa-shopping-cart"></i><span>Cart</span>
        </div>
        <div id="cart">
          <div id="cartHeader">
            <div id="cartTitle"><h2>Cart</h2></div>
            <div class="btnClose" onClick="closeCart()">&times;</div>
          </div>
          <div id="cartContent">
            <?php
            if(isset($_SESSION['cart'])):
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
            endif;
            ?>
            
            <button class="btn">Checkout</button>
          </div>
        </div>
       </div>
    </header>
             
    <script>
      function ajaxSearch(search){
        if(search==""){
          document.getElementById("searchResults").innerHTML="";
          return;
        }
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
          if (this.status == 200) {
            document.getElementById("searchResults").innerHTML=this.responseText;
           }
        }
        xhr.open("GET", "processSearch.php/?q="+ search, true);
        xhr.send();
      }
     
      function openCart(){
        document.getElementById('cart').style.right = '0';       
      }
      
      function closeCart(){
        document.getElementById('cart').style.right= '-400px'; 
      }
	  
	  function changeQuantity(change, quantity, bookId, price) {
      var qty = parseInt(quantity.innerHTML);
      var prc = parseInt(price.innerHTML.substr(2));
      if ((change==1 && qty < 10) ||  (change==-1 && qty > 1)){
        var result = qty + change;
        var newPrc = prc/qty * result;
        price.innerHTML = "RM" + newPrc;
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

  

