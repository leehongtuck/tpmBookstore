<header>
    <div id="headerUpper" class="flex">
        <div id="logoContainer">
        <a href="/tpmBookstore/index.php"><img src="/tpmBookstore/img/logo.png" alt="logo"></a>
        </div>
        <form id="searchContainer">
        <i class="fas fa-search"></i>
        <input type="text" onkeyup="ajaxSearch(this.value)">
        <div id="searchResults">
        </div>
        </form>
        <div id="userContainer">
        <?php if(isset($member)):?>
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
    <div id="headerLower" class="flex">
    <nav>
        <?php
        $sql = "SELECT genreId, genre FROM genre";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            echo "<a href=\"/tpmBookstore/genre.php/?id=". $row[0]."\">". $row[1] ."</a>";
        }
        ?>
    </nav>
    <div id="cartContainer" onclick="location.href='/tpmBookstore/cart.php'">
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
