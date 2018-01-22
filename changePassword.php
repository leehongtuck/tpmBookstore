<!DOCTYPE html>
<?php
$title="Change Password";
include('');
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$query = "SELECT * from member WHERE memberEmail='" . $_SESSION['userId'] . "'";
	$result = mysqli_query($conn, $query);  
	if(mysqli_num_rows($result) > 0)  
	{  
	  while($row = mysqli_fetch_array($result))  
		{
	
	$password1 = mysqli_real_escape_string($conn, $_POST['newPassword']);
	$password1h=md5($password1);
	$password2 = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
	$email = mysqli_real_escape_string($conn, $_SESSION['userId']);

	if (($password1 == $password2) && md5(($_POST["currentPassword"]) == $row["memberPw"]))
	{
		(mysqli_query($connn, "UPDATE member SET memberPw='$password1h' WHERE memberEmail='$email'"));
		  echo 'You Have Successfully Changed Your Password.';
		  header ("Location:myProfile.php"); 
		
	}
	else 	
	{
		echo 'Your Password Do Not Match.';
		}

	}
	}
	mysqli_close($connn);
}
?>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	</head>

	<body>
		<div>
			<h1 class="title">Change Password</h1>
			<form method="post">
				<div class="inputGroup">
					<input name="currentPassword" type="password" required>
					<span class="inputHighlight"></span>
					<span class="inputBar"></span>
					<label for="oldPw">Old Password</label>
				<div class="inputGroup">
					<input name="newPassword" type="password" required>
					<span class="inputHighlight"></span>
					<span class="inputBar"></span>
					<label for="newPw">New Password</label>
				<div class="inputGroup">
					<input name="confirmPassword" type="password" required>
					<span class="inputHighlight"></span>
					<span class="inputBar"></span>
					<label for="retypePw">Retype New Password</label>			
				<div class="input">
					<input class="btn" type="submit" value="Change Password">
					<button onclick="location.href='myProfile.php'" type="button">Back</button>
				</div>
			</form>
		</div>
	</body>
</html>