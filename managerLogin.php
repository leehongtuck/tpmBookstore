<?php
$title="Administrator Login";
require_once "inc/session.php";
  
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  $myUsername=mysqli_real_escape_string($conn,$_POST['email']);
  $myPassword=mysqli_real_escape_string($conn,$_POST['password']);

  $sql = "SELECT managerId, managerPw FROM manager WHERE managerEmail = '$myUsername' ";
  $result = mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  $numRows = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row
  if($numRows == 1):
    if(password_verify ($myPassword, $row[1])):
      $_SESSION['managerId'] = $row[0];
      $_SESSION['managerPw'] = $myPassword;?>
      <script>
        alert("Login successful.");
        window.location.replace("dashboard.php");
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
<!DOCTYPE html>
<html>
    <head>
    <?php require_once "inc/managerHead.php"?>
    </head>

<body>
<section id="loginContainer">
  <div id="loginHeader">
    <h1>Administrator Login</h1>
  </div>
  <form method="post">
        <div class="inputGroup" >
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
</section>

</body>
</html>