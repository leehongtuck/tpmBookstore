<?php
$title="Change Password";
require_once "inc/memberHeader.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
	$query = "SELECT * from member WHERE memberEmail='$member[email]'";
	$result = mysqli_query($conn, $query); 
	$row = mysqli_fetch_array($result);
	if(mysqli_num_rows($result) == 1){ 
		$oldPw = $_POST["currentPassword"];

		if(password_verify($oldPw, $row["memberPw"])):
			$newPw = mysqli_real_escape_string($conn, $_POST['newPassword']);
			$cfmNewPw = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
			if ($newPw == $cfmNewPw):
				$newPw = password_hash($newPw, PASSWORD_DEFAULT);
				$query = "UPDATE member SET memberPw='$newPw' WHERE memberId='$member[id]'";
				if(mysqli_query($conn, $query)):
					mysqli_close($conn);?>
					<script>
						alert("Password changed. Please log in with your new password.");
						window.location.replace("index.php");
					</script>
				<?php
				endif;
			else:?>
				<script>
					alert("The new passwords do not match. Please Try Again.");
				</script>
			<?php
			endif;
		else:?>
			<script>
				alert("Your current password is incorrect.");
			</script>
		<?php
		endif;
	}
	mysqli_close($conn);			
}
?>
		<section>
			<div id="pwHeader">
				<h1>Change Password</h1>
			</div>
			
			<form method="post" id="pwContents">
				<div class="inputGroup">
					<input name="currentPassword" type="password" required>
					<span class="inputHighlight"></span>
					<span class="inputBar"></span>
					<label for="oldPw">Old Password</label>
				</div>
				<div class="inputGroup">
					<input name="newPassword" type="password" required>
					<span class="inputHighlight"></span>
					<span class="inputBar"></span>
					<label for="newPw">New Password</label>
				</div>
				<div class="inputGroup">
					<input name="confirmPassword" type="password" required>
					<span class="inputHighlight"></span>
					<span class="inputBar"></span>
					<label for="retypePw">Retype New Password</label>
				</div>	
					<button class="btn" onclick="location.href='memberProfile.php'" type="button">Back</button>		
					<input class="btn" type="submit" value="Change Password">
					
			</form>
		</section>
	</body>
</html>