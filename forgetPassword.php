<?php
$title="Forget Password";
require_once "inc/memberHeader.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $myUsername = mysqli_real_escape_string($conn,$_POST["email"]);  
    }
	else{
        echo "email is not valid";
		exit;
    }
  $sql = "SELECT memberEmail FROM member WHERE memberEmail = '$myUsername' ";
  $result = mysqli_query($conn,$sql);
  $numRows = mysqli_num_rows($result);


  // If result matched $myusername, table row must be 1 row
  if($numRows == 1){
	
		// Create a unique salt. This will never leave PHP unencrypted. 
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13"; 
		// Create the unique user password reset key 
		$password = hash('sha512', $salt.$myUsername); 
		// Create a url which we will direct them to reset their password 
		$pwrurl = "localhost/tpmBookstore/resetPassword.php?q=".$password;

    // Mail them their key
	$r = mysqli_fetch_assoc($result);
	$to = $r['memberEmail'];
	$subject = "Your Recovered Password";
	$message = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website TPMBookstore\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: TPM Bookstore <tpmbookstore@gmail.com>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	if(mail($to, $subject, $message, $headers)){
		echo "Your Password has been sent to your email";
	}else{
		echo "Failed to Recover your password, try again";
	}
}
}
?>
<section id="loginContainer">
    <div id="loginHeader">
        <h1>Forget Password</h1>
    </div>
    <form method="post">
        <div class="inputGroup" >
            <input name="email" type="text" required>
            <span class="inputHighlight"></span>
            <span class="inputBar"></span>
            <label for="name">Email</label>
        </div>

        <div>
            <input class="btn" id="loginBtn" type="submit" value="Submit">
        </div>
    </form>
</section>