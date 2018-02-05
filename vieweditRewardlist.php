 <?php
 $title = "Manage Rewards";
require_once "inc/managerHeader.php"
?>

		<?php
			$query = "SELECT * FROM reward ";
			$result = mysqli_query($conn, $query);
			$count=mysqli_num_rows($result);
			
			
			
		?>

 <div class="tableHeader">
     <h1>Manage Booklist</h1>
 </div>
		<table>
			<tr>
			<th>Name</th>
			<th>Point</th>
			<th>Quantity</th>
            <th>Description</th>
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
				echo "<input type='text' name='rewardpoint[".$row['rewardId']."]' value='".$row['rewardPoint']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='rewardq[".$row['rewardId']."]' value='".$row['rewardQuantity']."' />";
				echo "</td>";

                echo "<td>";
                echo "<textarea name='rewarddesc[".$row['rewardId']."]' cols='50'>".$row['rewardDescription']."</textarea>";
                echo "</td></tr>";


			
			}		
			}
		mysqli_close($conn); //to close the database connection
		?>
		</table>
				<div class="middle">
					<input type="submit" name="Submit" value="Update" />
				</div>
		</form>
		
	</body>
</html>
