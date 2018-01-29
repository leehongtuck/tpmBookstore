<header>
    <div id="headerUpper" class="flex">
        <div id="logoContainer">
            <a href="/tpmBookstore/dashboard.php"><img src="/tpmBookstore/img/logo.png" alt="logo"></a>
        </div>

        <div id="userContainer">
            <button class="btn"><i class="fas fa-user"></i><span class="iconLeft"><?=$manager['name']?></span></button>
            <ul>
                <li><a href="/tpmBookstore/managerLogout.php"><i class="fas fa-sign-out-alt"></i><span class="iconLeft">Logout</span></a></li>        
            </ul>    
        </div>
    </div>
    <div id="headerLower">
        <nav>
        <a href="">Test 1</a>
        <a href="">Test 2</a>
        <a href="">Test 3</a>
        <a href="managerRegister.php">Register New Manager</a>
        </nav>
    </div>
</header>