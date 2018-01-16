<?php 
$title="Registration";
require_once "inc/memberHeader.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    //SETTING THE MEMBERID VARIABLE
    $sql="SELECT memberId FROM member ORDER BY memberId DESC LIMIT 1 ";
    $query=mysqli_query($conn, $sql);
    $memberId;
    if($result=mysqli_fetch_array($query)){
        $memberId=(int)substr($result[0], 1, 3)+1;
        $memberId='M'.str_pad("00", 3, $memberId);
    }else{
        $memberId='M001'; 
    }

    //INSERT RECORD INTO DATABASE
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="INSERT INTO member (memberId,memberEmail,memberName,memberPw,memberAddress,memberPhone,memberCreditCard)
    VALUES
    ('$memberId','$_POST[email]','$_POST[memName]', '$password', '$_POST[memAddress]', '$_POST[memPhone]', '$_POST[memCc]')";
    if (mysqli_query($conn,$sql)){
        echo "Registration successful";
        header ("Location:index.php");    
    }else  
        die('Error: ' . mysqli_error($conn)); 

    mysqli_close($conn); 
}
?>
	<section id="registerContainer">
		<div id="registerHeader">
			<h1>Registration</h1>
		</div>
		<form class="registerContainer" method="post">
			<div class="inputGroup">
				<input name="memName" type="text" required>
				<span class="inputHighlight"></span>
				<span class="inputBar"></span>
				<label for="name">Name</label>	
			</div>
			<div class="inputGroup">
				<input name="email" type="text" required>
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
			</div>
			<div class="input">
				<input class="btn" id="registerBtn" type="submit" value="Register">
			</div>
		</form>
	</section>

</body>

</html>
