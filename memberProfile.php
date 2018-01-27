<?php 
$title = "Manage Profile";
require_once "inc/memberHeader.php";

if($_SERVER['REQUEST_METHOD']== 'POST'){
	$sql = "UPDATE member SET memberName='$_POST[memName]',memberAddress='$_POST[memAddress]',memberPhone='$_POST[memPhone]',memberCreditCard='$_POST[memCreditCard]'
	 WHERE memberId='$member[id]'";
	if (mysqli_query($conn,$sql)){
		mysqli_close($conn);
		echo'<script>
			alert("Your profile has been successfully updated.");
			window.location.replace("index.php"); 					
			</script>';
	}
	else{
		die('Error: ' . mysqli_error($conn));
		mysqli_close($conn);
	}
}
	
?>
		<section>
			<div id="profileHeader">
				<h1>Manage Profile</h1>	
			</div>
			<form method="POST" id="profileContents">
				<div class="profileDetail">
					<label>Name</label>
					<input type="text" name="memName" value="<?=$member['name'];?>" required />
				</div>
				<div class="profileDetail">
					<label>Email Address</label>
					<input type="text" value="<?=$member["email"];?>" disabled="disabled" />
				</div>
				<div class="profileDetail">
					<label>Password</label>
					<button onclick="location.href='changePassword.php'" type="button" class="btn">Change Password</button>
				</div>
				<div class="profileDetail">
					<label>Address</label>
					<input type="text" name="memAddress" value="<?=$member["address"];?>" required />
				</div>
				<div class="profileDetail">
					<label>Mobile Phone</label>
					<input type="text" name="memPhone" value="<?=$member["phone"];?>" required />
				</div>
				<div class="profileDetail">
					<label>Credit Card</label>
					<input type="text" name="memCreditCard" value="<?=$member["creditCard"];?>" required/>
				</div>			
				<div class="profileDetail">
					<label>Reward Point</label>
					<input type="text" value="<?=$member["point"];?>" disabled="disabled"/>
				</div>
				<input type="submit" value="Update Details" class="btn" />
			</form>
		</section>
	</body>
</html>
