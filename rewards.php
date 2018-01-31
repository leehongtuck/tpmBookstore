<?php
$title = "Rewards";
require_once "inc/memberHeader.php";
if($member == null)
	header('location:index.php');
?>

<div id="rewardHeader">
	<h1>Claim Rewards</h1>
</div>
<div id="rewardContents" class="grid">
	<?php	
		$query = "SELECT * FROM reward"; 
		$result = mysqli_query($conn, $query);  
		while($row = mysqli_fetch_array($result)):  
	?>  
	<div class="rewardInfo">
		<div class="rewardImage">
			<?php
			echo '<img src="/tpmBookstore/img/'.$row["rewardId"].'.jpg" alt="reward"/>'."<br/><br/>";
			?>
		</div>
		<div class="rewardDetail">
			<h1><?php echo $row["rewardName"]; ?></h1>
			<p><?php echo $row["rewardDescription"]; ?></p>
			<p>Required Point:<?php echo $row["rewardPoint"]; ?></p>
			<form action="/tpmBookstore/claimReward.php" method="post">
				<label id="quantity">Quantity: </label><input type="number" name="quantity" min="1" <?php if ($row["rewardQuantity"]==0){ echo "disabled";} ?>><p>Available Quantity (<?php echo $row["rewardQuantity"]; ?> left)</p>
				<input type="hidden" name="hiddenId" value="<?php echo $row["rewardId"]; ?>" /> 
				<input type="hidden" name="hiddenPoint" value="<?php echo $row["rewardPoint"];?>" />
				<input name="claimReward" type="submit" class="btn" value="Claim" <?php if($member['point']<$row['rewardPoint'])echo "disabled";?>>
			</form>
		</div>
	</div>
	<?php
	endwhile;
	?>
</div>
</body>
</html>
