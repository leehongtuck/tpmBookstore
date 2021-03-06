<?php
$title = "Login";
require_once "inc/memberHeader.php";
if($member != null)
    header('location:index.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myUsername = mysqli_real_escape_string($conn, $_POST['email']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT memberId, memberPw FROM member WHERE memberEmail = '$myUsername' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $numRows = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($numRows == 1):
        if(password_verify($myPassword, $row[1])):
            $_SESSION['memberId'] = $row[0];
            $_SESSION['memberPw'] = $myPassword;
            $sql = "INSERT INTO `memberlogin` (`memberId`) VALUES ('$row[0]')";
            mysqli_query($conn, $sql); ?>
            <script>
                alert("Login successful.");
                window.location.replace("index.php");
            </script>
        <?php
        else:?>
            <script>
                alert("Your Email Address or Password is incorrect");
            </script>
        <?php
        endif;
    else:?>
        <script>
            alert("Your Email Address or Password is incorrect");
        </script>
    <?php
    endif;
}
?>
<section id="loginContainer">
    <div id="loginHeader">
        <h1>Login</h1>
    </div>
    <form method="post">
        <div class="inputGroup">
            <input name="email" type="text" required>
            <span class="inputHighlight"></span>
            <span class="inputBar"></span>
            <label for="name">Email</label>
        </div>
        <div class="inputGroup">
            <input name="password" type="password" required>
            <span class="inputHighlight"></span>
            <span class="inputBar"></span>
            <label>Password</label>
        </div>
        <div>
            <input class="btn" id="loginBtn" type="submit" value="Login">
        </div>
    </form>
    <div id="register">
        <p><a href="/tpmBookstore/forgetPassword.php">Forget Password?</a></p>
        <p>Not a member yet? <a href="/tpmBookstore/register.php">Register here</a>.</p>
    </div>
</section>