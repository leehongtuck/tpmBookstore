<header>
    <div id="headerUpper" class="flex">
        <div id="logoContainer">
            <a href="/tpmBookstore/dashboard.php"><img src="/tpmBookstore/img/logo.png" alt="logo"></a>
        </div>

        <div id="userContainer">
            <button class="btn"><i class="fas fa-user"></i><span class="iconLeft"><?= $manager['name'] ?></span>
            </button>
            <ul>
                <li><a href="/tpmBookstore/managerLogout.php"><i class="fas fa-sign-out-alt"></i><span class="iconLeft">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="headerLower">
        <nav>
            <div class="dropdown"><a href="">View System Log</a>
            <ul class="dropdownContent">
               <li><a href="managerLoginLog.php">Users Login Log</a></li>
                <li><a href="managerRewardRedeemLog.php">Users Claimed Rewards</a></li>
                <li><a href="managerTransactionLog.php">Users Transactions</a></li>
                <li><a href="managerFeedbackLog.php">User Feedbacks</a></li>
                <li><a href="managerFeedbackRating.php">User Feedback Ratings</a></li>
            </ul>
            </div>

            <div class="dropdown">Manage Inventory
                <ul class="dropdownContent">
                    <li><a href="vieweditBooklist.php">Manage Books</a></li>
                    <li><a href="vieweditRewardlist.php">Manage Rewards</a></li>
                    <li><a href="addBook.php">Add New Book</a></li>
                    <li><a href="addGenre.php">Add New Genre</a></li>
                    <li><a href="addReward.php">Add New Reward</a></li>
                </ul>
            </div>
            <div class="dropdown">
                Orders
                <ul class="dropdownContent">
                    <li><a href="bookRequest.php">Place Order</a></li>
                    <li><a href="manageOrder.php">Manage Orders</a></li>
                    <li><a href="viewArrivedOrders.php">Arrived Orders</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a href="managerRegister.php">Register New Manager</a>
            </div>
            <div>
                <a href="manageUser.php">Manage Users</a>
            </div>

        </nav>
    </div>
</header>
