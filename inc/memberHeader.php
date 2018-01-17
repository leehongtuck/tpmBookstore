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
            <input type="text" onkeyup="performAjax(this.value)">
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
            $_SESSION['cart']=array(
              'b001' => '3',
              'b002' => '5'
            );
              foreach ($_SESSION['cart'] as $bookId => $quantity) {
                $sql = "SELECT bookTitle, bookPrice FROM book WHERE bookId = '$bookId' ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)):?>
                <div class="cartItem flex">
                  <div class="cartItemDesc">
                    <a href="#"><?=$row[0];?></a>
                  </div>
                  <div class="cartItemNum">
                    <span class="cartItemMinus">
                      <i class="fas fa-minus-circle"></i>
                    </span> 
                    <span class="cartItemQuantity">
                      <?=$quantity;?>
                    </span>
                    <span class="cartItemPlus">
                      <i class="fas fa-plus-circle"></i>
                    </span> 
                  </div>
                  <div class="cartItemPrice">
                    RM<?=$row[1];?>.00
                  </div>
                </div>
              <?php
              endwhile;
              }
            ?>
            
            <button class="btn">Checkout</button>
          </div>
        </div>
       </div>
    </header>
             
    <script>
      function performAjax(search){
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
    </script>

