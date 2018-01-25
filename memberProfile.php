<?php 
$title = "Manage Profile";
require_once "inc/memberHeader.php";
?>
		<div>
			<?php
				$query = "Select * FROM member where memberEmail='$_SESSION[memberId]'";
				$result = mysqli_query($conn, $query);  
				$row = mysqli_fetch_array($result);
			?>
			<form method="POST" action="updateProfile.php">
				<div class="profileDetail">
					<label>Name</label>
					<input type="text" name="memName" value="<?=$row["memberName"];?>" required />
				</div>
				<div class="profileDetail">
					<label><Email-Address</label>
					<input type="text" value="<?=$row["memberEmail"];?>" disabled="disabled" />
				</div>
				<div class="profileDetail">
					<label>Password</label>
					<button onclick="location.href='changePassword.php'" type="button">Change Password</button>
				</div>
				<div class="profileDetail">
					<label>Address</label>
					<input type="text" name="memAddress" value="<?=$row["memberAddress"];?>" required />
				</div>
				<div class="profileDetail">
					<label>Mobile Phone</label>
					<input type="text" name="memPhone" value="<?=$row["memberPhone"];?>" required />
				</div>
				<div class="profileDetail">
					<label>Credit Card</label>
					<input type="text" name="memCreditCard" value="<?=$row["memberCreditCard"];?>" required/>
				</div>			
				<div class="profileDetail">
					<label>Reward Point</label>
					<input type="text" value="<?=$row["memberPoint"];?>" disabled="disabled"/>
				</div>
				<input type="submit" value="change" />
			</form>
		</div>
	</body>
</html>
