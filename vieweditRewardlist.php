<!DOCTYPE html>
 <?php
include("inc/conn.php");
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
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
				margin:25px;
			}
		</style>
	</head>

	<body>
		<?php
			$query = "SELECT * FROM reward ";
			$result = mysqli_query($conn, $query);
			$count=mysqli_num_rows($result);
			
			
			
		?>

		<table>
			<tr>
			<td>Name</td>
			<td>Description</td>
			<td>Point</td>
			<td>Quantity</td>
			</tr>
		<form method="POST" action="updateRewardlist.php">
		<?php
			if(mysqli_num_rows($result) > 0)  {				
			while($row=mysqli_fetch_array($result))
			{
				
				echo "<tr>";
				echo "<td>";
				echo "<input type='text' name='rewardname[".$row['rewardId']."]' value='".$row['rewardName']."' />";
				echo "</td>";
				
				echo "<td>";
				echo "<input type='text' name='rewarddesc[".$row['rewardId']."]' value='".$row['rewardDescription']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='rewardpoint[".$row['rewardId']."]' value='".$row['rewardPoint']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='rewardq[".$row['rewardId']."]' value='".$row['rewardQuantity']."' />";
				echo "</td></tr>";
				


			
			}		
			}
		mysqli_close($conn); //to close the database connection
		?>
		</table>
			<input type="submit" name="Submit" value="Update" />
		</form>
		
	</body>
</html>
