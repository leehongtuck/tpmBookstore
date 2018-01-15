<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>My Profile</title>
	</head>

	<body>
		<div>
			<?php
				$query = "Select * FROM member where memberEmail='".$_SESSION['loginUser']."'";
				$result = mysqli_query($con, $query);  
				if(mysqli_num_rows($result) > 0)  
				{  
				while($row = mysqli_fetch_array($result))  
				{
			?> 
			<div class="profileDetail">
				<p>Name</p>
				<p><?php echo $row["memberName"];?></p>
				<input type="hidden">
			</div>
			<div class="profileDetail">
				<p><Email-Address</p>
				<p><?php echo $row["memberEmail"];?></p>
				<input type="hidden">
			</div>
			<div class="profileDetail">
				<p>Password</p>
				<button onclick="location.href='changePassword.php'" type="button">Change Password</button>
				<input type="hidden">
			</div>
			<div class="profileDetail">
				<p>Mobile Phone</p>
				<p><?php echo $row["memberPhone"];?></p>
				<input type="hidden">
			</div>
			<div class="profileDetail">
				<p>Credit Card</p>
				<p><?php echo $row["memberCreditCard"];?></p>
				<input type="hidden">
			</div>			
			<div class="profileDetail">
				<p>Reward Point</p>
				<p><?php echo $row["memberPoint"];?></p>
			</div>				
			<?php  
				}  
				}  
			?>  
		</div>
	</body>
</html>
