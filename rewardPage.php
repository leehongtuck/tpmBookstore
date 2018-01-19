<!DOCTYPE html>
 <?php
require_once "inc/conn.php";
 ?>
<html lang="en">
	<head>
	<meta content="en-us" http-equiv="Content-Language">
	<meta charset="utf-8">
	<title></title>
	<style>  		
    </style>
	</head>

	<body>
		<section>
			<?php	
				$query = "SELECT * FROM reward"; 
				$result = mysqli_query($conn, $query);  
				if(mysqli_num_rows($result) > 0)  
				{  
					while($row = mysqli_fetch_array($result))  
				{
			?>  
			<div>
				<?php
					$imageId=$row["rewardId"];
					$files = glob("img/*.*");
					echo '<img src="img/'.$imageId.'.jpg" />'."<br/><br/>";
				?>
			</div>
			<div>
				<h1><?php echo $row["rewardName"]; ?></h1>
				<p><?php echo $row["rewardDescription"]; ?></p>
				<p>Required Point:<?php echo $row["rewardPoint"]; ?></p>
				<form action="claimReward.php" method="post">
					<label id="quantity">Quantity:</label><input type="number" name="quantity" min="1" <?php if ($row["rewardQuantity"]==0){ echo "disabled";} ?>><p>available quantity(<?php echo $row["rewardQuantity"]; ?>left)</p>
					<input type="hidden" name="hiddenId" value="<?php echo $row["rewardId"]; ?>" /> 
					<input type="hidden" name="hiddenPoint" value="<?php echo $row["rewardPoint"];?>" />
					<input name="claimReward" type="submit" value="Claim">
				</form>
			</div>
			<div>
			<?php
				}
				}
			?>
	</body>

</html>