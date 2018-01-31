<!DOCTYPE html>
 <?php
include("inc/conn.php");
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			div#form {
			min-width:1000px;
			margin:auto;
			}

			table {
				margin:0 auto;
			}
			
			.input {
				margin: 50px 0;
				text-align:center;
				line-height:1.625;
			}

			input[type=text], input[type=number], input[type=submit], input[type=date] {
				padding:10px;
			}

			input[type=text], input[type=number], input[type=date],select {
				border: 1px solid #ccc;
				background-color: transparent;
				color: #000;
				width:50%;
				border-radius: 5px;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				margin:0 auto;
			}

			input[type=submit] {
				background: black;
				font-family: Roboto,sans-serif;
				font-weight: 700;
				color: #fff;
				-webkit-appearance: none;
				padding: 0 30px;
				font-size: 16px;
				border-radius: 5px;
				height: 40px;
				display: inline-block;
				cursor: pointer;
				border: none;
				font-size: 14px;
				letter-spacing: 0.1em;
				text-transform: uppercase;
				margin: 0 25px;
			}
</style>
	</head>

	<body>
		<div id="form" style="height: 560px;width:100%">
			<form method="post" enctype='multipart/form-data' action="insertReward.php">
				<section>
					<table>
						<tr>
							<div class="input">
									<td><label>Reward Image:</label></td>
									<td><input type='file' name='rewardImage' /></td>
							</div>
						</tr>	
						<tr>	
							<div class="input">
									<td><label>Reward Name:</label></td>
									<td><input name="rewardName" type="text" required="required" size="50"></td>
							</div>
						</tr>

						<tr>
							<div class="input">
									<td><label>Reward Description:</label></td>
									<td><input name="rewardDesc" type="text" required="required"></td>
							</div>
						</tr>
						<tr>
							<div class="input">
									<td><label>Required Point:</label></td>
									<td><input name="rewardPoint" type="number" required="required"></td>
							</div>
						</tr>	
						<tr>
							<div class="input">
									<td><label>Quantity:</label></td>
									<td><input name="rewardQuantity" type="number" required="required"></td>
							</div>
						</tr>
						<tr>
							<div class="input">
								<td></td>
								<td><input name="Submit" type="submit" value="Add New Reward"></td>
							</div>
						</tr>	
				</section>
			</form>
		</div>
		
	</body>
</html>
