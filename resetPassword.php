<?php
$title="Reset Password";
require_once "inc/memberHeader.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password= $_POST["newPassword"];
  $confirmPassword= $_POST["confirmPassword"];
  $hash=$_POST["q"];
  
  $salt="498#2D83B631%3800EBD!801600D*7E3CC13";
  $resetkey=hash('sha512',$salt.$email);
  
  if ($resetkey == $hash){
	  if($password == $confirmPassword) {
		  $passwordh = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
		  $passwordh1 = mysqli_real_escape_string($conn,$passwordh);
		  $sql = "UPDATE member SET memberPw='$passwordh1' WHERE memberEmail='$email'";
		  if (mysqli_query($conn,$sql)){
			echo'<script type="text/javascript">
			alert("Your password has been reset.");
			window.location.replace("login.php"); 					
			</script>';
	}
	else{
		die('Error: ' . mysqli_error($conn));
	}
	  }
	  else {
		  echo "Your Password do no match.";
		}
  }
  else {
	  echo "Your password reset key is invalid";
  }
}
  ?>

<form method="post">
	<div class="inputGroup" >
		<input name="email" type="text" required>
		<span class="inputHighlight"></span>
		<span class="inputBar"></span>
		<label for="name">Email</label>	
	</div>
	
	<div class="inputGroup" >
		<input name="newPassword" type="password" required>
		<span class="inputHighlight"></span>
		<span class="inputBar"></span>
		<label for="name">New Password</label>	
	</div>
	
	<div class="inputGroup" >
		<input name="confirmPassword" type="password" required>
		<span class="inputHighlight"></span>
		<span class="inputBar"></span>
		<label for="name">Confirm Password</label>	
	</div>

	<div>
		<input type="hidden" name="q" value="<?php if(isset($_GET["q"])) { echo $_GET["q"];} ?>" />
		<input type="submit" value="Reset">
	</div>
</form>
