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
            <input type="text" onkeyup="performAjax(this.value)">
            <div id="searchResults">
            </div>
          </form>
          <div id="userContainer">
            <button class="btn ">Login</button>
          </div>
       </div>
       <div id="headerLower" class="flex">
        <nav>
            <?php
            $sql = "SELECT genreId, genre FROM genre";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_array($query)){
                echo "<a href=\"genre.php/?". $result[0]."\">". $result[1] ."</a>";
            }
            ?>
        </nav>
        <div id="cartContainer" onclick="openCart()">
          <img src="img/cart.png" alt="cart">
        </div>
        <div id="cart">
          <div id="cartHeader">
            <div id="cartTitle"><h2>Cart</h2></div>
            <div class="btnClose" onClick="closeCart()">&times;</div>
          </div>
          <div id="cartContent">
              <?php
              $_SESSION['cart']['B001']= 3;
              foreach ($_SESSION['cart'] as $bookId => $quantity) {
                  $sql = "SELECT bookName, bookPrice FROM book WHERE bookId = $bookId ";
                  $query = mysqli_query($conn, $sql);
                  $result = mysqli_fetch_assoc($query);

                  echo "<a href=\"\">$result[0].$result[1]</a>";
              }
              ?>
            <a href="#">Item 1</a>
            <a href="#">Item 2</a>
            <a href="#">Item 3</a>
            <a href="#">Item 4</a>
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
        document.getElementById('cart').style.right= '-250px'; 
      }
    </script>

