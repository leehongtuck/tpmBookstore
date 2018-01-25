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
            <a href="index.php"><img src="img/tpmlogo.png" alt="logo"></a>
          </div>
          <form id="searchContainer">
            <i class="fas fa-search"></i>
            <input type="text" onkeyup="ajaxSearch(this.value)">
            <div id="searchResults">
            </div>
          </form>
          <div id="userContainer">
            <?php if(isset($_SESSION['userId'])):?>
            <button class="btn"><i class="fas fa-user"></i><span class="iconLeft">Daniel</span></button>
              <ul>
                <li><i class="fas fa-address-card"></i><span class="iconLeft">Manage Profile</span></li>
                <li><i class="fas fa-history"></i><span class="iconLeft">Transaction History</span> </li>
                <li><i class="fas fa-comments"></i><span class="iconLeft">Feedback History</span></li>
                <li><i class="fas fa-sign-out-alt"></i><span class="iconLeft">Logout</span></li>
              </ul>
            <?php else:?>
              <button class="btn"><span class="iconRight">Login</span><i class="fas fa-sign-in-alt"></i></button>
             
            <?php endif;?>          
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
        <div id="cartContainer" onclick="location.href='cart.php'">
          <i class="fas fa-shopping-cart"></i><span>Cart</span></a>
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
  
    </script>


  

