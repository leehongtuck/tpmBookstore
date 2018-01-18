<!DOCTYPE html>
<?php
include("inc/conn.php");
?>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>My Profile</title>
	</head>

	<body>
		<div>
			<?php
				$query = "Select * FROM member where memberEmail='".$_SESSION['loginUser']."'";
				$result = mysqli_query($conn, $query);  
				if(mysqli_num_rows($result) > 0)  
				{  
				while($row = mysqli_fetch_array($result))  
				{
			?>
			<form method="POST" action="updateProfile.php">
				<div class="profileDetail">
					<label>Name</label>
					<input type="text" name="memName" value="<?php echo $row["memberName"];?>" required />
				</div>
				<div class="profileDetail">
					<label><Email-Address</label>
					<input type="text" value="<?php echo $row["memberEmail"];?>" disabled="disabled" />
				</div>
				<div class="profileDetail">
					<label>Password</label>
					<button onclick="location.href='changePassword.php'" type="button">Change Password</button>
				</div>
				<div class="profileDetail">
					<label>Address</label>
					<input type="text" name="memAddress" value="<?php echo $row["memberAddress"];?>" required />
				</div>
				<div class="profileDetail">
					<label>Mobile Phone</label>
					<input type="text" name="memPhone" value="<?php echo $row["memberPhone"];?>" required />
				</div>
				<div class="profileDetail">
					<label>Credit Card</label>
					<input type="text" name="memCreditCard" value="<?php echo $row["memberCreditCard"];?>" required/>
				</div>			
				<div class="profileDetail">
					<label>Reward Point</label>
					<input type="text value="<?php echo $row["memberPoint"];?>" disabled="disabled"/>
				</div>
				<input type="submit" value="change" />
			</form>
			<?php  
				}  
				}  
			?>  
		</div>
	</body>
</html>
