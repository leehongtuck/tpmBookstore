<?php
require_once "inc/session.php";
/*if($member != null) $title = "Logged in";
else $title = "not logged in";*/
?>
<!doctype html>
<html>
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?="Administrator | " . $title?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/tpmBookstore/css/style.css">
    <link rel="stylesheet" href="/tpmBookstore/css/manager.css">
   </head>
 
 <body class="background">
    <header>
        <div id="headerUpper" class="flex">
            <div id="logoContainer">
                <a href="/tpmBookstore/index.php"><img src="/tpmBookstore/img/logo.png" alt="logo"></a>
            </div>

            <div id="userContainer">
            <?php if(isset($manager)):?>
            <button class="btn"><i class="fas fa-user"></i><span class="iconLeft"><?=$member['name']?></span></button>
                <ul>
                <li><a href="/tpmBookstore/memberProfile.php"><i class="fas fa-address-card"></i><span class="iconLeft">Manage Profile</span></a></li>
                <li><i class="fas fa-history"></i><span class="iconLeft">Transaction History</span> </li>
                <li><i class="fas fa-comments"></i><span class="iconLeft">Feedback History</span></li>
                <li><a href="/tpmBookstore/rewards.php"><i class="fas fa-gift"></i><span class="iconLeft">Claim Rewards</span></a></li>
                <li><a href="/tpmBookstore/logout.php"><i class="fas fa-sign-out-alt"></i><span class="iconLeft">Logout</span></a></li>        
                </ul>
            <?php else:?>
                <button class="btn"><a href="/tpmBookstore/login.php"><span class="iconRight">Login</span><i class="fas fa-sign-in-alt"></i></button></a>
                
            <?php endif;?>          
            </div>
        </div>
        <div id="headerLower">
            <nav>
            </nav>
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
                if(this.responseText.length == 0) 
                    document.getElementById("searchResults").innerHTML="<p>No Results Found</p>";
                else
                    document.getElementById("searchResults").innerHTML=this.responseText;
            }
        }
        xhr.open("GET", "/tpmBookstore/processSearch.php/?q="+ search, true);
        xhr.send();
        }

    </script>

  

