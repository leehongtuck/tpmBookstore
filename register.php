<?php 
$title="Registration";
require_once "inc/memberHeader.php";
if($member != null)
	header('location:index.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!($_POST['password']===$_POST['cfmPassword'])):?>
		<script>
			alert("Passwords do not match!");
		</script>
	<?php
	else:
		//FINDING ANY EMAIL DUPLICATES
		$sql="SELECT memberId FROM member WHERE memberEmail='$_POST[email]'";
		$result=mysqli_query($conn,$sql);
		$numRows=mysqli_num_rows($result);
		if($numRows==1):?>
			<script>
				alert("This email has been used. Please enter another email.");
			</script>
		<?php
		else:
			//SETTING THE MEMBERID VARIABLE
			$sql="SELECT memberId FROM member ORDER BY memberId DESC LIMIT 1 ";
			$result=mysqli_query($conn, $sql);
			$memberId;
			if($row=mysqli_fetch_array($result))
				$memberId=++$row[0];
			else
				$memberId='M001'; 

			//INSERT RECORD INTO DATABASE
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$sql="INSERT INTO `member` (`memberId`, `memberEmail`, `memberName`, `memberPw`, `memberAddress`, `memberPhone`, `memberCreditCard`)
			VALUES
			('$memberId','$_POST[email]','$_POST[memName]', '$password', '$_POST[memAddress]', '$_POST[memPhone]', '$_POST[memCc]')";
			if (mysqli_query($conn,$sql)):
				mysqli_close($conn);?>
				<script>
					alert("Registration Successful!");
					window.location.replace("login.php");
				</script>
			<?php else:
				die('Error: ' . mysqli_error($conn)); 
				mysqli_close($conn); 
			endif;
		endif;
	endif;
}
?>
	<section id="registerContainer" >
		<div id="registerHeader" >
			<h1>Registration</h1>
		</div> 
		<div>
		<form method="post">
			<div class="inputGroup" >
				<input name="memName" type="text" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label for="name">Name</label>	
			</div>
			<div class="inputGroup">
				<input name="email" type="email" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label>Email</label>	
			</div>
			<div class="inputGroup">
				<input name="password" type="password" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label>Password</label>	
			</div>
			<div class="inputGroup">
				<input name="cfmPassword" type="password" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label>Confirm Password</label>	
			</div>
			<div class="inputGroup">
				<input name="memAddress" type="text" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label>Address</label>
			</div>
			<div class="inputGroup">
				<input name="memPhone" type="text" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label>Phone Number</label>
			</div>			
			<div class="inputGroup">
				<input name="memCc" type="text" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label>Credit Card Number</label>
				</div>
		
			<div>
				<input class="btn" id="registerBtn" type="submit" value="Register">
			</div> 
		
		</form> 
		</div>
	</section>

</body>

</html>
