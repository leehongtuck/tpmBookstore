<?php
   include("inc/memberHeader.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myUsername=mysqli_real_escape_string($conn,$_POST['email']);
      $myPassword=mysqli_real_escape_string($conn,$_POST['password']);
	  $password=password_hash($myPassword, PASSWORD_DEFAULT);
      
      $sql = "SELECT memberId FROM member WHERE memberEmail = '$myUsername' and memberPw = '$password'";
      $query = mysqli_query($con,$sql);
      $result = mysqli_fetch_array($query);

      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
          $userId = $result[0];
        $_SESSION['loginUser'] = $userId;
        echo '<script>alert("Login successful")</script>';
        echo'<script>window.location="index.html";</script>';
      }
	  else {
		echo '<script>alert("Your Email Address or Password is incorrect")</script>';
	  }
   }
?>
