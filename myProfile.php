<!DOCTYPE html>
<?php
include("inc/conn.php");
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$sql = "UPDATE member SET memberName='$_POST[memName]',memberAddress='$_POST[memAddress]',memberPhone='$_POST[memPhone]',memberCreditCard='$_POST[memCreditCard]' WHERE memberId=$userId;";
	if (mysqli_query($con,$sql)){
		echo'<script type="text/javascript">
			alert("Your profile has been successfully updated.");
			window.location.replace("myProfile.php"); 					
			</script>';
	}
	else{
		die('Error: ' . mysqli_error($conn));
	}
	mysqli_close($con);
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
				$result = mysqli_query($con, $query);  
				if(mysqli_num_rows($result) > 0)  
				{  
				while($row = mysqli_fetch_array($result))  
				{
			?>
			<form>
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
			</form>
			<?php  
				}  
				}  
			?>  
		</div>
	</body>
</html>
