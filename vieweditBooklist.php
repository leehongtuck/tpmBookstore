
 <?php
 $title = "Manage Booklist";
require_once("inc/managerHeader.php");
?>

		<?php
			$query = "SELECT book.*, genre.* FROM book INNER JOIN genre ON book.genreId = genre.genreId ";
			$result = mysqli_query($conn, $query);
			$count=mysqli_num_rows($result);
			
			
			
		?>
<div class="tableHeader">
    <h1>Manage Booklist</h1>
</div>
		<table>
			<tr>
			<th>Title</th>
			<th>Genre</th>
			<th>Price</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>Publish Date</th>
			<th>Quantity</th>
            <th>Description</th>
			</tr>
		<form method="POST" action="updateBooklist.php">
		<?php
			if(mysqli_num_rows($result) > 0)  {				
			while($row=mysqli_fetch_array($result))
			{
				
				echo "<tr>";
				echo "<td>";
				echo "<input type='text' name='booktitle[".$row['bookId']."]' value='".$row['bookTitle']."' />";
				echo "</td>";
				
				echo "<td>";
				echo "<select name='bookgenre[".$row['bookId']."]'>";
				echo "<option hidden disabled selected value='".$row['genre']."'>".$row['genre']."</option>";
				$sql="SELECT * FROM Genre";
				$results=mysqli_query($conn,$sql);
				while ($rows=mysqli_fetch_array($results))
				{
				echo "<option value='".$rows['genreId']."'>".$rows['genre']."</option>";
				}
				echo "</select>";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookprice[".$row['bookId']."]' value='".$row['bookPrice']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookauth[".$row['bookId']."]' value='".$row['bookAuthor']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookpub[".$row['bookId']."]' value='".$row['bookPublisher']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookpubd[".$row['bookId']."]' value='".$row['bookPublishDate']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookq[".$row['bookId']."]' value='".$row['bookQuantity']."' />";
				echo "</td>";

                echo "<td>";
                echo "<textarea name='bookdesc[".$row['bookId']."]' cols='50' rows='3'>".$row['bookDescription']."</textarea>";
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
